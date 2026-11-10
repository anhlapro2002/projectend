<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>MultiShop - Online Shop Website Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">  

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <!-- Topbar Start -->
    <div class="container-fluid">
        <div class="row bg-secondary py-1 px-xl-5">
            <div class="col-lg-6 d-none d-lg-block">
            </div>
            <div class="col-lg-6 text-center text-lg-right">
                    @if(session('customer'))
                    <div class="d-inline-flex align-items-center">
                     <div class="btn-group">
                         <button type="button" class="btn btn-sm btn-light dropdown-toggle" data-toggle="dropdown">{{session('customer')->name}}</button>
                         <div class="dropdown-menu dropdown-menu-right">
                             <button class="dropdown-item" type="button"></button>
                             <a class="dropdown-item" type="button" href="{{route('contact')}}">Order History</a>
                             <a class="dropdown-item" type="button" href="{{route('logout')}}">logout</a>
                         </div>
                     </div>
                 </div>
                     @else
                         <div class="d-inline-flex align-items-center">
                             <div class="btn-group">
                                 <button type="button" class="btn btn-sm btn-light dropdown-toggle" data-toggle="dropdown">My Account</button>
                                 <div class="dropdown-menu dropdown-menu-right">
                                     <a class="dropdown-item" type="button" href="{{route('logincus')}}">Sign in</a>
                                     <a class="dropdown-item" type="button" href="{{route('signup')}}">Sign up</a>
                                 </div>
                             </div>
                         </div>
                     @endif
                <div class="d-inline-flex align-items-center d-block d-lg-none">
                    <a href="{{ route('cart') }}" class="btn px-0 ml-2">
                        <i class="fas fa-shopping-cart text-dark"></i>
                        <span class="badge text-dark border border-dark rounded-circle" style="padding-bottom: 2px;">0</span>
                    </a>
                </div>
            </div>
        </div>
        <div class="row align-items-center bg-light py-3 px-xl-5 d-none d-lg-flex">
            <div class="col-lg-4">
                <a href="" class="text-decoration-none">
                    <span class="h1 text-uppercase text-primary bg-dark px-2">JOHNLAPTOP</span>
                    <span class="h1 text-uppercase text-dark bg-primary px-2 ml-n1">Shop</span>
                </a>
            </div>
            <div class="col-lg-4 col-6 text-left">
                <form action="{{route('Shop')}}">
                    <div class="input-group">
                        <input type="text" class="form-control"  name="search" placeholder="Search for products">
                        <div class="input-group-append">
                            <span class="input-group-text bg-transparent text-primary">
                                <i class="fa fa-search"></i>
                            </span>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <div class="container-fluid bg-dark mb-30">
        <div class="row px-xl-5">
            <div class="col-lg-3 d-none d-lg-block">
                <a class="btn d-flex align-items-center justify-content-between bg-primary w-100" data-toggle="collapse" href="#navbar-vertical" style="height: 65px; padding: 0 30px;">
                    <h6 class="text-dark m-0"><i class="fa fa-bars mr-2"></i>Categories</h6>
                    <i class="fa fa-angle-down text-dark"></i>
                </a>
                <nav class="collapse position-absolute navbar navbar-vertical navbar-light align-items-start p-0 bg-light" id="navbar-vertical" style="width: calc(100% - 30px); z-index: 999;">
                    <div class="navbar-nav w-100">
                        @foreach($categories as $category)
                            <a href="{{ route('Shop') }}?category={{ $category->id }}" class="nav-item nav-link">{{ $category->name }}</a>
                        @endforeach
                    </div> 
                </nav>
            </div>
            <div class="col-lg-9">
                <nav class="navbar navbar-expand-lg bg-dark navbar-dark py-3 py-lg-0 px-0">
                    <a href="" class="text-decoration-none d-block d-lg-none">
                        <span class="h1 text-uppercase text-dark bg-light px-2">Multi</span>
                        <span class="h1 text-uppercase text-light bg-primary px-2 ml-n1">Shop</span>
                    </a>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav mr-auto py-0">
                            <a href="{{route('index')}}" class="nav-item nav-link">Home</a>
                            <a href="" class="nav-item nav-link">Shop</a>
                        </div>
                        <div class="navbar-nav ml-auto py-0 d-none d-lg-block">
                            <a href="{{ route('cart') }}" class="btn px-0 ml-3">
                                <i class="fas fa-shopping-cart text-primary"></i>
                                <span class="badge text-secondary border border-secondary rounded-circle" style="padding-bottom: 2px;">0</span>
                            </a>
                        </div>  
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <!-- Navbar End -->


    <!-- Breadcrumb Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-12">
                <nav class="breadcrumb bg-light mb-30">
                    <span class="breadcrumb-item text-dark" >Home</span>
                    <span class="breadcrumb-item text-dark" >Shop</span>
                    <span class="breadcrumb-item active">Checkout</span>
                </nav>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->


    <!-- Checkout Start -->
    <div class="container-fluid">
        <form id="placeOrderForm" method="POST" action="{{ route('order.add') }}">
            <div class="row px-xl-5">
                <div class="col-lg-8">
                    <h5 class="section-title position-relative text-uppercase mb-3">
                        <span class="bg-secondary pr-3">Billing Address</span>
                    </h5>
                    <!-- Hiển thị thông tin khách hàng -->
                    @if(session('customer'))
                    <div class="bg-light p-30 mb-5">
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label>Name</label>
                                <input class="form-control" type="text" value="{{ session('customer')->name }}" >
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Mobile</label>
                                <input class="form-control" type="text" value="{{ session('customer')->phone }}" >
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Address</label>
                                <input class="form-control" type="text" value="{{ session('customer')->address }}">
                            </div>
                            @foreach($ward1 as $a)
                            <div class="col-md-6 form-group">
                                <label>Province</label>
                                <select class="form-control" name="ProId" id="province" required>
                                    <option value="" disabled selected>Select Province</option>
                                    @foreach ($pro as $province)
                                        <option value="{{ $province->id }}" @if($province->id == $a->prid) selected @endif>{{ $province->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6 form-group">
                                <label>District</label>
                                <select class="form-control" name="DisId" id="district" required>
                                    <option value="" disabled selected></option>
                                    @foreach ($dis as $di)
                                    <option value="{{$di->id}}" @if($di->id == $a->disid) selected @endif>{{$di->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Wards</label>
                                <select class="form-control" name="WardId" id="ward" required>
                                    <option value="" disabled selected>Select Wards</option>
                                    @foreach ($wards as $ward)
                                    <option value="{{ $ward->id }}" @if($ward->id == $a->id) selected @endif>{{ $ward->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @endif
                </div>
                <div class="col-lg-4">
                    <h5 class="section-title position-relative text-uppercase mb-3">
                        <span class="bg-secondary pr-3">Order Total</span>
                    </h5>
                    <div class="bg-light p-30 mb-5">
                        <div class="border-bottom">
                            <h6 class="mb-3">Products</h6>
                            @foreach($cart as $id => $item)
                            <div class="d-flex justify-content-between">
                                <p>{{ $item['name'] }}</p>
                                <p>${{ number_format($item['price'], 2) }}</p>
                            </div>
                            <div class="d-flex justify-content-between">
                                <p>Quantity</p>
                                <p>{{ $item['quantity'] }}</p>
                            </div>
                            @endforeach
                        </div>
                        <div class="border-bottom pt-3 pb-2">
                            <div class="d-flex justify-content-between mb-3">
                                <h6>Subtotal</h6>
                                <h6>${{ number_format(array_sum(array_map(function($item) { return $item['price'] * $item['quantity']; }, $cart)), 2) }}</h6>
                            </div>
                        </div>
                        <div class="pt-2">
                            <div class="d-flex justify-content-between mt-2">
                                <h5>Total</h5>
                                <h5>${{ number_format(array_sum(array_map(function($item) { return $item['price'] * $item['quantity']; }, $cart)), 2) }}</h5>
                            </div>
                        </div>
                    </div>
                    <div class="mb-5">
                        <h5 class="section-title position-relative text-uppercase mb-3">
                            <span class="bg-secondary pr-3">Payment</span>
                        </h5>
                        @csrf
                        <div class="form-group">
                            <label for="payment" class="form-label">Select Payment Method</label>
                            <select class="form-control" name="payment" id="payment" required>
                                @foreach($paymentmethods as $pay)
                                    <option value="{{ $pay->id }}">{{ $pay->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-block btn-primary font-weight-bold py-3">Place Order</button>
                        
                    </div>
                </div>
            </div>
        </form>
    </div>
    
    <!-- Checkout End -->


    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-secondary mt-5 pt-5">
        <div class="row px-xl-5 pt-5">
            <div class="col-lg-4 col-md-12 mb-5 pr-3 pr-xl-5">
                <h5 class="text-secondary text-uppercase mb-4">Get In Touch</h5>
                <p class="mb-4"></p>
                <p class="mb-2"><i class="fa fa-map-marker-alt text-primary mr-3"></i>515 Nguyễn trãi, Thanh Xuân, Hà nội</p>
                <p class="mb-2"><i class="fa fa-envelope text-primary mr-3"></i>info@example.com</p>
                <p class="mb-0"><i class="fa fa-phone-alt text-primary mr-3"></i>+ 0966943904</p>
            </div>
            <div class="col-lg-8 col-md-12">
                <div class="row">
                    <div class="col-md-4 mb-5">
                        <h5 class="text-secondary text-uppercase mb-4"></h5>
                        {{-- <div class="d-flex flex-column justify-content-start">
                            <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Home</a>
                            <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Our Shop</a>
                            <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Shop Detail</a>
                            <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Shopping Cart</a>
                            <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Checkout</a>
                            <a class="text-secondary" href="#"><i class="fa fa-angle-right mr-2"></i>Contact Us</a>
                        </div> --}}
                    </div>
                    <div class="col-md-4 mb-5">
                        <h5 class="text-secondary text-uppercase mb-4"></h5>
                        {{-- <div class="d-flex flex-column justify-content-start">
                            <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Home</a>
                            <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Our Shop</a>
                            <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Shop Detail</a>
                            <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Shopping Cart</a>
                            <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Checkout</a>
                            <a class="text-secondary" href="#"><i class="fa fa-angle-right mr-2"></i>Contact Us</a>
                        </div> --}}
                    </div>
                    <div class="col-md-4 mb-5">
                        <h5 class="text-secondary text-uppercase mb-4"></h5>
                        <p></p>
                        <form action="">
                            {{-- <div class="input-group">
                                <input type="text" class="form-control" placeholder="Your Email Address">
                                <div class="input-group-append">
                                    <button class="btn btn-primary">Sign Up</button>
                                </div>
                            </div> --}}
                        </form>
                        <h6 class="text-secondary text-uppercase mt-4 mb-3"></h6>
                        {{-- <div class="d-flex">
                            <a class="btn btn-primary btn-square mr-2" href="#"><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-primary btn-square mr-2" href="#"><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-primary btn-square mr-2" href="#"><i class="fab fa-linkedin-in"></i></a>
                            <a class="btn btn-primary btn-square" href="#"><i class="fab fa-instagram"></i></a>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
        <div class="row border-top mx-xl-5 py-4" style="border-color: rgba(256, 256, 256, .1) !important;">
            <div class="col-md-6 px-xl-0">
                <p class="mb-md-0 text-center text-md-left text-secondary">
                    &copy; <a class="text-primary" href="#"></a>. All Rights Reserved. Designed
                    by
                    <a class="text-primary" href="">Long</a>
                </p>
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
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
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('placeOrderForm').addEventListener('submit', function(event) {
                event.preventDefault();
                
                let form = event.target;
                let formData = new FormData(form);
    
                let paymentMethod = document.getElementById('payment').value;
                
                if (paymentMethod == 2) {
                    let transferDescription = 'Order-' + Math.random().toString(36).substring(2, 15);
                    Swal.fire({
                        title: 'Bank Transfer Information',
                        html: `
                            <p><strong>Account Name:</strong> DO DUC LONG</p>
                            <p><strong>Account Number:</strong> 0966943914</p>
                            <p><strong>Bank Name:</strong> Tp Bank</p>
                            <p><strong>Transfer Description:</strong> ${transferDescription}</p>
                        `,
                        icon: 'info',
                        showCancelButton: true,
                        confirmButtonText: 'OK',
                        cancelButtonText: 'Cancel'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            fetch('{{ route("order.add") }}', {
                                method: 'POST',
                                headers: {
                                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                    'Accept': 'application/json'
                                },
                                body: formData
                            })
                            .then(response => response.json())
                            .then(data => {
                                if (data.success) {
                                    Swal.fire({
                                        title: 'Order Placed Successfully!',
                                        text: 'Thank you for your order.',
                                        icon: 'success',
                                        confirmButtonText: 'OK'
                                    }).then((result) => {
                                        if (result.isConfirmed) {
                                            window.location.href = "{{ route('index') }}";
                                        }
                                    });
                                } else {
                                    Swal.fire({
                                        title: 'Error!',
                                        text: data.message || 'There was an issue placing your order. Please try again.',
                                        icon: 'error',
                                        confirmButtonText: 'OK'
                                    });
                                }
                            })
                            .catch(error => {
                                Swal.fire({
                                    title: 'Error!',
                                    text: 'There was an issue placing your order. Please try again.',
                                    icon: 'error',
                                    confirmButtonText: 'OK'
                                });
                            });
                        }
                    });
                } else {
                    fetch('{{ route("order.add") }}', {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            'Accept': 'application/json'
                        },
                        body: formData
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            Swal.fire({
                                title: 'Order Placed Successfully!',
                                text: 'Thank you for your order.',
                                icon: 'success',
                                confirmButtonText: 'OK'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    window.location.href = "{{ route('index') }}";
                                }
                            });
                        } else {
                            Swal.fire({
                                title: 'Error!',
                                text: data.message || 'There was an issue placing your order. Please try again.',
                                icon: 'error',
                                confirmButtonText: 'OK'
                            });
                        }
                    })
                    .catch(error => {
                        Swal.fire({
                            title: 'Error!',
                            text: 'There was an issue placing your order. Please try again.',
                            icon: 'error',
                            confirmButtonText: 'OK'
                        });
                    });
                }
            });
    
            
        });
    </script>
           
</body>

</html>