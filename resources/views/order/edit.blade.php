@extends('master.index')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    @if (session('error'))
        <div class="alert alert-danger" id="myText">{{ session('error') }}</div>
    @endif
    @if (session('success'))
        <div class="alert alert-success" id="myText">{{ session('success') }}</div>
    @endif

    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Home /</span> Edit Invoice</h4>

    <div class="card">
        <h5 class="card-header">Invoice Details</h5>
        <div class="card-body">
            @if(isset($edit) && count($edit) > 0)
                @php $ord = $edit[0]; @endphp
                <table class="table table-bordered mb-4">
                    <tbody>
                        <tr><th>Order ID</th><td>{{ $ord->id }}</td></tr>
                        <tr><th>Customer</th><td>{{ $ord->cusname ?? $ord->UserName }}</td></tr>
                        <tr><th>Phone</th><td>{{ $ord->UserPhone }}</td></tr>
                        <tr><th>Email</th><td>{{ $ord->UserEmail }}</td></tr>
                        <tr><th>Total Amount</th><td>{{ $ord->TotalAmount }}</td></tr>
                        <tr><th>Tracking Number</th><td>{{ $ord->TrackingNumber }}</td></tr>
                        <tr>
                            <th>Status</th>
                            <td>
                                @switch($ord->Status)
                                    @case(0)<span class="badge bg-label-warning me-1">Pending Confirmation</span>@break
                                    @case(1)<span class="badge bg-label-primary me-1">Confirmed</span>@break
                                    @case(2)<span class="badge bg-label-info me-1">In Transit</span>@break
                                    @case(3)<span class="badge bg-label-success me-1">Completed</span>@break
                                    @case(4)<span class="badge bg-label-danger me-1">Cancelled</span>@break
                                    @default<span class="badge bg-label-secondary me-1">Unknown</span>
                                @endswitch
                            </td>
                        </tr>
                    </tbody>
                </table>

                @if($ord->Status != 3)
                <form action="{{ route('order.update', ['order' => $ord->id]) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <p class="text-muted">Click below to move this order to the next status.</p>
                    <button type="submit" class="btn btn-primary">Update Status</button>
                </form>
                @endif
            @else
                <p class="text-danger">Order not found.</p>
            @endif
        </div>
    </div>
</div>
<!-- / Content -->
@endsection
