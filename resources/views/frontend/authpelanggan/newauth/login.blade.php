<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            margin: 0;
            padding: 0;
            /* background: #f2f2f2; */
            background-image: url('{{ asset('backend/images/backgrounds/sidebar.jpg') }}');
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            font-family: sans-serif;
        }
        .register-container {
            background: white;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
            width: 100%;
            max-width: 400px;
        }
        .register-container h2 {
            margin-bottom: 20px;
            text-align: center;
        }
        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 12px;
            margin: 8px 0 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        button {
            width: 100%;
            padding: 12px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            font-weight: bold;
        }
        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="register-container">
        <h2>Login Apotek Ceria</h2>
        <p>Silahkan masuk menggunakan akun yang sudah kamu buat</p>
        <form action="{{ route('newlogin.submit') }}" method="POST">
            {{-- CSRF token for security --}}
            {{-- Laravel automatically generates a CSRF token for each session --}}
            {{-- This token is used to verify that the authenticated user is the one making the request --}}
            {{-- This is important for security to prevent CSRF attacks --}}
            @csrf
            {{-- <label>Nama yang sudah didaftarkan</label>
            <input type="text" name="name" class="form-control mb-2"> --}}

            <label>Email Address</label>
            <input type="text" name="email" class="form-control mb-2">

            <label>Password</label>
            <input type="password" name="password" class="form-control mb-2">
            {{-- <input type="password" name="password_confirmation" placeholder="Konfirmasi Password" required> --}}
            <button class="btn btn-primary">Submit login</button>
        </form>
        @if(session('error'))
            <div style="color: red; margin-top: 15px;">
                {{ session('error') }}
            </div>
        @endif
    </div>
</body>
</html>