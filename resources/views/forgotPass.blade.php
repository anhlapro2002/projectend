<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Reset Password - JohnLaptop</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <style>
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        .form-container {
            background: #f3f3f3;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 30px;
            max-width: 420px;
            width: 100%;
        }
        .form-container h1 { margin-bottom: 20px; font-size: 24px; font-weight: 700; }
        .form-container input { margin-bottom: 15px; width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px; }
        .form-container button { width: 100%; padding: 10px; background: #333; border: none; color: white; border-radius: 5px; cursor: pointer; font-size: 16px; }
        .form-container button:hover { background: #555; }
    </style>
</head>

<body>
    <div style="text-align: center;">
        <a href="{{ route('index') }}" class="text-decoration-none">
            <span class="h1 text-uppercase text-primary bg-dark px-2">Welcome to JOHNLAPTOP</span>
            <span class="h1 text-uppercase text-dark bg-primary px-2 ml-n1">Shop</span>
        </a>
    </div>

    <div class="container">
        <div class="form-container">
            @if (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <h1>Reset Password</h1>
            <form action="{{ route('newPass') }}" method="POST">
                @csrf
                @method('PUT')
                <input type="email" name="email" placeholder="Enter your email" required>
                <input type="password" name="password" placeholder="New password" required>
                <input type="password" name="password_confirmation" placeholder="Confirm new password" required>
                <button type="submit">Reset Password</button>
            </form>
            <p class="mt-3"><a href="{{ route('login') }}">Back to login</a></p>
        </div>
    </div>
</body>

</html>
