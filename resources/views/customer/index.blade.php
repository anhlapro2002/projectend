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
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Tables /</span> Customer </h4>
        <a class="btn btn-outline-primary" href="{{route('addcus')}}">Add new customer</a>
        <!-- Basic Bootstrap Table -->
        <div class="card">
            <h5 class="card-header">Customer</h5>
            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Phone</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                    @csrf
                    @foreach($customer as $cus)<tr>
                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{$cus->id}}</strong></td>
                        <td>{{$cus->name}}</td>
                        <td>
                            {{$cus->email}}
                        </td>
                        <td>
                            {{$cus->address}}, {{$cus->wardname}}, {{$cus->disname}}, {{$cus->proname}}
                        </td>
                        <td>
                            {{$cus->phone}}
                        </td>
                        <td>
                            <div class="dropdown">
                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                    <i class="bx bx-dots-vertical-rounded"></i>
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="{{ route('editcus', ['id' => $cus->id]) }}"
                                    ><i class="bx bx-edit-alt me-1" ></i> Edit</a>
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
                    <a class="page-link" href="{{ $customer->url(1)}}">
                        <i class="tf-icon bx bx-chevrons-left"></i>
                    </a>
                </li>
                <li class="page-item prev">
                    <a class="page-link" href="{{ $customer->previousPageUrl()}}">
                        <i class="tf-icon bx bx-chevron-left"></i>
                    </a>
                </li>
                @for ($i = 1; $i <= $customer->lastPage(); $i++)
                    <li class="page-item {{ ($customer->currentPage() == $i) ? 'active' : '' }}">
                        <a class="page-link" href="{{ $customer->url($i) }}">{{ $i }}</a>
                    </li>
                @endfor
                <li class="page-item next">
                    <a class="page-link" href="{{ $customer->nextPageUrl() }}">
                        <i class="tf-icon bx bx-chevron-right"></i>
                    </a>
                </li>
                <li class="page-item last">
                    <a class="page-link" href="{{ $customer->url($customer->lastPage()) }}">
                        <i class="tf-icon bx bx-chevrons-right"></i>
                    </a>
                </li>
            </ul>
        </nav>
        <hr class="my-5" />
    </div>
    <!-- / Content -->
@endsection
