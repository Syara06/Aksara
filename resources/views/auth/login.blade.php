<!DOCTYPE html>
<html>
<head>
    <title>Login - Perpustakaan</title>
    <style>
        body { font-family: Arial; background: #f0f7ff; display: flex; justify-content: center; align-items: center; height: 100vh; }
        .card { background: white; padding: 30px; border-radius: 15px; width: 350px; box-shadow: 0 5px 15px rgba(0,0,0,0.1); }
        input { width: 100%; padding: 8px; margin: 8px 0 15px; border-radius: 8px; border: 1px solid #ccc; }
        button { background: #0f3b5c; color: white; padding: 10px; border: none; border-radius: 8px; width: 100%; cursor: pointer; }
        .error { color: red; font-size: 12px; }
    </style>
</head>
<body>
<div class="card">
    <h2>Login Perpustakaan</h2>
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <label>Email</label>
        <input type="email" name="email" value="{{ old('email') }}" required>
        @error('email') <div class="error">{{ $message }}</div> @enderror

        <label>Password</label>
        <input type="password" name="password" required>
        @error('password') <div class="error">{{ $message }}</div> @enderror

        <button type="submit">Masuk</button>
    </form>
    <p style="margin-top:15px;">Belum memiliki akun? <a href="{{ route('register') }}">Daftar disini</a></p>
</div>
</body>
</html>