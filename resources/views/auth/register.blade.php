<!DOCTYPE html>
<html>

<head>
    <title>Register - Perpustakaan</title>
    <style>
        body {
            font-family: Arial;
            background: #f0f7ff;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .card {
            background: white;
            padding: 30px;
            border-radius: 15px;
            width: 400px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        input {
            width: 100%;
            padding: 8px;
            margin: 8px 0 15px;
            border-radius: 8px;
            border: 1px solid #ccc;
        }

        button {
            background: #0f3b5c;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 8px;
            width: 100%;
            cursor: pointer;
        }

        .error {
            color: red;
            font-size: 12px;
        }
    </style>
</head>

<body>
    <div class="card">
        <h2>Daftar Peminjam Perpustakaan</h2>
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <label>Nama Lengkap</label>
            <input type="text" name="name" value="{{ old('name') }}" required>
            @error('name')
                <div class="error">{{ $message }}</div>
            @enderror

            <label>NISN</label>
            <input type="text" name="nisn" value="{{ old('nisn') }}" required>
            @error('nisn')
                <div class="error">{{ $message }}</div>
            @enderror

            <label>Nomor Telepon</label>
            <input type="text" name="nomor_telepon" value="{{ old('nomor_telepon') }}" required>
            @error('nomor_telepon')
                <div class="error">{{ $message }}</div>
            @enderror

            <label>Email</label>
            <input type="email" name="email" value="{{ old('email') }}" required>
            @error('email')
                <div class="error">{{ $message }}</div>
            @enderror

            <label>Password</label>
            <input type="password" name="password" required>
            @error('password')
                <div class="error">{{ $message }}</div>
            @enderror

            <label>Confirm Password</label>
            <input type="password" name="password_confirmation" required>

            <button type="submit">Daftar</button>
        </form>
        <p style="margin-top:15px;">Sudah memiliki akun? <a href="{{ route('login') }}">Masuk</a></p>
    </div>
</body>

</html>
