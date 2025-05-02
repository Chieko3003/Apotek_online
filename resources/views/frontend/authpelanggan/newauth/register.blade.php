<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="backend/css/style.css">
    <style>
        body {
            margin: 0;
            padding: 0;
            /* background: url('../images/backgrounds/obatbg.jpg') no-repeat center center fixed; */
            background-image: url('{{ asset('backend/images/backgrounds/obatbg.jpg') }}');
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
        <h2>Register Apotek Ceria</h2>
        @if ($errors->any())
    <div style="color: red; margin-bottom: 15px;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

            <form method="POST" action="{{ route('newregister.submit') }}">
            {{-- CSRF token for security --}}
            {{-- Laravel automatically generates a CSRF token for each session --}}
            {{-- This token is used to verify that the authenticated user is the one making the request --}}
            {{-- This is important for security to prevent CSRF attacks --}}
            @csrf
            <label>Nama Lengkap</label>
            <input type="text" name="nama_pelanggan" class="form-control mb-2">

            <label>Email Address</label>
            <input type="text" name="email" class="form-control mb-2">

            <label>Password</label>
            <input type="password" name="kata_kunci" class="form-control mb-2">

            <label>No telp</label>
            <input type="text" name="no_telp" class="form-control mb-2">

            <label>alamat</label>
            <input type="text" name="alamat1" class="form-control mb-2">

            <label>kota</label>
            <input type="text" name="kota1" class="form-control mb-2">

            <label>provinsi</label>
            <input type="text" name="propinsi1" class="form-control mb-2">

            <label>kodepos</label>
            <input type="text" name="kodepos1" class="form-control mb-2">
            {{-- <input type="password" name="password_confirmation" placeholder="Konfirmasi Password" required> --}}
            <button class="btn btn-primary">Submit Registrasi</button>
        </form>
    </div>
</body>
</html>