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

    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Customer /</span> Edit Customer</h4>

    <!-- Form to Edit Employee -->
    <div class="card">
        <h5 class="card-header">Customer</h5>
        <div class="card-body">
        @foreach ($edit as $cus)
            <form action="{{ route('editcus.update', ['customer' => $cus->id]) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $cus->name }}" placeholder="Enter employee's name" required>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ $cus->email }}" placeholder="Enter employee's email" required>
                </div>

                <div class="mb-3">
                    <label for="phone" class="form-label">Phone</label>
                    <input type="text" class="form-control" id="phone" name="phone" value="{{ $cus->phone }}" placeholder="Enter employee's phone number" required>
                </div>

                <div class="mb-3">
                    <label for="address" class="form-label">Address</label>
                    <input type="text" class="form-control" id="address" name="address" value="{{ $cus->address }}" placeholder="Enter address" required>
                </div>   

                <div class="mb-3">
                    <label>Province</label>
                    <select class="form-control" name="ProId" id="province" required>
                        <option value="" disabled selected>Select Province</option>
                        @foreach ($pro as $province)
                            <option value="{{ $province->id }}">{{ $province->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label>District</label>
                    <select class="form-control" name="DisId" id="district" required>
                        <option value="" disabled selected>Select District</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label>Wards</label>
                    <select class="form-control" name="WardId" id="ward" required>
                        <option value="" disabled selected>Select Wards</option>
                    </select>
                </div>


                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter new password (optional)">
                </div>
                <input type="hidden" class="form-control" id="role" name="role" value='2'>
                <button type="submit" class="btn btn-primary">Update Customer</button>
            </form>
            @endforeach
        </div>
    </div>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="mail/jqBootstrapValidation.min.js"></script>
    <script src="mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
    <script>
        $(document).ready(function() {
            $('#province').change(function() {
            var provinceId = $(this).val();
            if (provinceId) {
                $.ajax({
                    url: "{{ route('getDistricts') }}",
                    type: 'POST',
                    data: {
                        _token: "{{ csrf_token() }}",
                        provinceId: provinceId
                    },
                    success: function(data) {
                        $('#district').empty();
                        $('#district').append('<option value="" disabled selected>Select District</option>');
                        $.each(data, function(key, value) {
                            $('#district').append('<option value="'+ value.id +'">'+ value.name +'</option>');
                        });
                    }
                });
            }
        });

        $('#district').change(function() {
            var districtId = $(this).val();
            if (districtId) {
                $.ajax({
                    url: "{{ route('getWards') }}",
                    type: 'POST',
                    data: {
                        _token: "{{ csrf_token() }}",
                        districtId: districtId
                    },
                    success: function(data) {
                        $('#ward').empty();
                        $('#ward').append('<option value="" disabled selected>Select Wards</option>');
                        $.each(data, function(key, value) {
                            $('#ward').append('<option value="'+ value.id +'">'+ value.name +'</option>');
                        });
                    }
                });
            }
        });
    });
    </script>
</div>
@endsection

