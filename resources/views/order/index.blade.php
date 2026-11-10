@extends('master.index')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    @if (session('error'))
        <div class="alert alert-danger" id="myText">
            {{ session('error') }}
        </div>
    @endif
    @if (session('success'))
        <div class="alert alert-success" id="myText">
            {{ session('success') }}
        </div>
    @endif
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Home /</span> Invoices</h4>
    <!-- Basic Bootstrap Table -->
    <div class="card">
        <h5 class="card-header">Invoices</h5>
        <div class="table-responsive text-nowrap">
            <table class="table">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Customer Name</th>
                    <th>Product Name</th>
                    <th>Date</th>
                    <th>Shipping Unit</th>
                    <th>Payment Method</th>
                    <th>TotalAmount</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @php
                        $mergedInvoices = [];
                        $productNames = [];
                    @endphp

                    @foreach($order as $ord)
                        @if(isset($mergedInvoices[$ord->id]))
                            @php
                                $productNames[$ord->id][] = $ord->prdname;
                            @endphp
                        @else
                            @php
                                $mergedInvoices[$ord->id] = $ord;
                                $productNames[$ord->id] = [$ord->prdname];
                            @endphp
                        @endif
                    @endforeach
                @foreach($mergedInvoices as $ord)
                    <tr>
                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{$ord->id}}</strong></td>
                        <td>{{$ord->UserName}}</td>
                        <td> @foreach($productNames[$ord->id] as $productName)
                            {{$productName}} @if(!$loop->last), @endif
                            @endforeach
                    </td>
                        <td>{{ \Carbon\Carbon::parse($ord->created_at)->format('d/m/Y') }}</td>
                        <td>{{$ord->shipname}}</td>
                        <td>{{$ord->payname}}</td>
                        <td>${{$ord->TotalAmount}}</td>
                        <td>
                            @switch($ord->Status)
                                @case(0)
                                    <span class="badge bg-label-warning me-1">Pending Confirmation</span>
                                    @break
                                @case(1)
                                    <span class="badge bg-label-primary me-1">Confirmed</span>
                                    @break
                                @case(2)
                                    <span class="badge bg-label-info me-1">In Transit</span>
                                    @break
                                @case(3)
                                    <span class="badge bg-label-success me-1">Completed</span>
                                    @break
                                @case(4)
                                    <span class="badge bg-label-danger me-1">Cancelled</span>
                                    @break
                                @default
                                    <span class="badge bg-label-secondary me-1">Unknown</span>
                            @endswitch
                        </td>
                        
                        <td>
                            <div class="dropdown">
                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                    <i class="bx bx-dots-vertical-rounded"></i>
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item orderModal"  data-bs-toggle="modal" data-order-id="{{ $ord->id }}">
                                        <i class="bx bx-show me-1"></i> View
                                    </a>
                                    @if($ord->Status != 3)
                                    <form action="{{ route('order.update', ['order' => $ord->id])}}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <button class="dropdown-item" type="submit">
                                            <i class="bx bx-edit-alt me-1"></i> Update Status
                                        </button>
                                    </form>
                                    @endif
                                </div>
                            </div>
                            <div class="modal fade" id="orderModal" tabindex="1" aria-labelledby="orderModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="orderModalLabel">Order Details</h5>
                                        </div>
                                        <div class="modal-body">
                                            <!-- Order details will be loaded here via AJAX -->
                                            <div id="orderDetailsContent"></div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="closeModalButton">Close</button>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <!--/ Basic Bootstrap Table -->

    <nav aria-label="Page navigation">
        <ul class="pagination">
            <li class="page-item first">
                <a class="page-link" href="{{ $order->url(1)}}">
                    <i class="tf-icon bx bx-chevrons-left"></i>
                </a>
            </li>
            <li class="page-item prev">
                <a class="page-link" href="{{ $order->previousPageUrl()}}">
                    <i class="tf-icon bx bx-chevron-left"></i>
                </a>
            </li>
            @for ($i = 1; $i <= $order->lastPage(); $i++)
                <li class="page-item {{ ($order->currentPage() == $i) ? 'active' : '' }}">
                    <a class="page-link" href="{{ $order->url($i) }}">{{ $i }}</a>
                </li>
            @endfor
            <li class="page-item next">
                <a class="page-link" href="{{ $order->nextPageUrl() }}">
                    <i class="tf-icon bx bx-chevron-right"></i>
                </a>
            </li>
            <li class="page-item last">
                <a class="page-link" href="{{ $order->url($order->lastPage()) }}">
                    <i class="tf-icon bx bx-chevrons-right"></i>
                </a>
            </li>
        </ul>
    </nav>

    <hr class="my-5"/>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="mail/jqBootstrapValidation.min.js"></script>
    <script src="mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
    <script>
        $(document).ready(function() {
            $('.orderModal').on('click', function(event) {
                var button = $(event.currentTarget);
                var orderId = button.data('order-id');
        
                $.ajax({
                    url: '{{route('ordd')}}', 
                    type: 'GET',
                    dataType: 'json',
                    data:{
                        id:orderId
                    },
                    success: function(data) {
                        var htmlContent = '<div class="table-responsive">';
                        htmlContent += '<table class="table table-bordered">';
                        htmlContent += '<thead><tr><th>Image</th><th>Product Name</th><th>Quantity</th><th>Price</th><th>Total</th></tr></thead>';
                        htmlContent += '<tbody>';
        
                        data.forEach(function(item) {
                            var imageUrl = '{{ asset('img') }}/' + item.img
                            htmlContent += '<tr>';
                            htmlContent += '<td><img src="' + imageUrl + '" width="90" height="120" alt="Product Image"></td>';
                            htmlContent += '<td>' + item.prdname + '</td>';
                            htmlContent += '<td>' + item.quantity + '</td>';
                            htmlContent += '<td>$' + item.proprice + '</td>';
                            htmlContent += '<td>$' + (item.quantity * item.proprice) + '</td>';
                            htmlContent += '</tr>';
                        });
        
                        htmlContent += '</tbody></table></div>';
                        $('#orderDetailsContent').html(htmlContent);
                        $('#orderModal').modal('show'); // Show the modal after content is loaded
                    },
                    error: function(xhr, status, error) {
                        console.error('Error:', error);
                        $('#orderDetailsContent').html('<p class="text-danger">Failed to load order details.</p>');
                    }
                });
                $('#closeModalButton').on('click', function() {
                    location.reload(); // Clear the content of order details
            });
            });
        });
        </script>
</div>
<!-- / Content -->
@endsection
