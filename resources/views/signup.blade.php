<!DOCTYPE html>
<html lang="en">
    <meta charset="utf-8">
    <title>JohnLaptop - Online Shop Website Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="{{ asset('img/favicon.ico') }}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">  

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <!-- jQuery -->
    

    <!-- Custom Styles -->  
    <style>
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .form-container {
            background: #f3f3f3;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 30px;
            max-width: 400px;
            width: 100%;
        }
        .form-wrapper {
            display: flex;
            justify-content: space-between;
            width: 80%; /* You can adjust this width as needed */
        }
        .form-container h1 {
            margin-bottom: 20px;
            font-size: 24px;
            font-weight: 700;
        }
        .form-container input {
            margin-bottom: 15px;
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .form-container button {
            width: 100%;
            padding: 10px;
            background: #333;
            border: none;
            color: white;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }
        .form-container button:hover {
            background: #555;
        }
        .form-container span {
            display: block;
            margin-bottom: 10px;
            font-size: 14px;
            color: #555;
        }
        .form-container a {
            color: #555;
            text-decoration: none;
            font-size: 14px;
        }
        .form-container a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div style="text-align: center;">
        <a href="{{ route('index') }}" class="text-decoration-none">
            <span class="h1 text-uppercase text-primary bg-dark px-2">Welcome to JOHNLAPTOP</span>
            <span class="h1 text-uppercase text-dark bg-primary px-2 ml-n1">Shop Signup</span>   
        </a>
    </div>
    
    <div class="container" id="container" style="display: flex; justify-content: center; align-items: center; height: 100vh;">
        <div class="form-wrapper" style="width: 100%; max-width: 400px; padding: 20px; border: 1px solid #ccc; border-radius: 8px; background-color: #f9f9f9;">
            <div class="form-container" style="text-align: center;">
                <form action="{{ route('signupcus') }}" method="POST">
                    @csrf
                    <h1>Create Account</h1>
                    <span>or use your email for registration</span>
                    @if (session('error'))
                        <div class="alert alert-danger" id="myAlert" data-type="error">
                            {{ session('error') }}
                        </div>
                    @endif
                    @if (session('success'))
                        <div class="alert alert-success" id="myAlert" data-type="success">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if ($errors->any())
                        <div class="alert alert-danger" id="myAlert" data-type="error">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div style="margin: 10px 0;">
                        <input type="text" name="name" id="name" placeholder="Enter your name" required style="width: 100%; padding: 10px; margin: 5px 0; border: 1px solid #ccc; border-radius: 4px;" />
                    </div>
                    <div style="margin: 10px 0;">
                        <input type="email" name="email" id="email" placeholder="Enter your email" required style="width: 100%; padding: 10px; margin: 5px 0; border: 1px solid #ccc; border-radius: 4px;" />
                    </div>
                    <div style="margin: 10px 0;">
                        <input type="tel" name="phone" id="phone" placeholder="Enter your phone" required style="width: 100%; padding: 10px; margin: 5px 0; border: 1px solid #ccc; border-radius: 4px;" />
                    </div>
                    <div style="margin: 10px 0;">
                        <label style="text-align:left; display:block; font-size:13px; color:#555;">Province</label>
                        <select name="ProId" id="province" required style="width: 100%; padding: 10px; margin: 5px 0; border: 1px solid #ccc; border-radius: 4px;">
                            <option value="" disabled selected>Select Province</option>
                            @foreach ($pro as $province)
                                <option value="{{ $province->id }}">{{ $province->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div style="margin: 10px 0;">
                        <label style="text-align:left; display:block; font-size:13px; color:#555;">District</label>
                        <select name="DisId" id="district" required style="width: 100%; padding: 10px; margin: 5px 0; border: 1px solid #ccc; border-radius: 4px;">
                            <option value="" disabled selected>Select District</option>
                        </select>
                    </div>
                    <div style="margin: 10px 0;">
                        <label style="text-align:left; display:block; font-size:13px; color:#555;">Ward</label>
                        <select name="WardId" id="ward" required style="width: 100%; padding: 10px; margin: 5px 0; border: 1px solid #ccc; border-radius: 4px;">
                            <option value="" disabled selected>Select Ward</option>
                        </select>
                    </div>
                    <div style="margin: 10px 0;">
                        <label style="text-align:left; display:block; font-size:13px; color:#555;">Street address</label>
                        <input type="text" id="address" name="address" placeholder="Enter your house number / street" required style="width: 100%; padding: 10px; margin: 5px 0; border: 1px solid #ccc; border-radius: 4px;" />
                    </div>
                    <div style="margin: 10px 0;">
                        <input type="password" name="password" id="password" placeholder="Enter your password" required style="width: 100%; padding: 10px; margin: 5px 0; border: 1px solid #ccc; border-radius: 4px;" />
                    </div>
                    <button type="submit" style="width: 100%; padding: 10px; border: none; border-radius: 4px; background-color: #007bff; color: white; font-size: 16px; cursor: pointer;">Sign Up</button>
                    <p style="text-align:center; margin-top:12px;">Already have an account? <a href="{{ route('logincus') }}">Sign in</a></p>
                </form>
            </div>
        </div>
    </div>
    
    
    
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="mail/jqBootstrapValidation.min.js"></script>
    <script src="mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>  
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- jQuery UI -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> 
    <script>
        $(document).ready(function() {
            // Khi chon tinh -> load quan/huyen
            $('#province').change(function() {
                var provinceId = $(this).val();
                if (provinceId) {
                    $.ajax({
                        url: "{{ route('getDistricts') }}",
                        type: 'POST',
                        data: { _token: "{{ csrf_token() }}", provinceId: provinceId },
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

            // Khi chon quan/huyen -> load xa/phuong
            $('#district').change(function() {
                var districtId = $(this).val();
                if (districtId) {
                    $.ajax({
                        url: "{{ route('getWards') }}",
                        type: 'POST',
                        data: { _token: "{{ csrf_token() }}", districtId: districtId },
                        success: function(data) {
                            $('#ward').empty();
                            $('#ward').append('<option value="" disabled selected>Select Ward</option>');
                            $.each(data, function(key, value) {
                                $('#ward').append('<option value="'+ value.id +'">'+ value.name +'</option>');
                            });
                        }
                    });
                }
            });
        });
    </script>
    
</body>