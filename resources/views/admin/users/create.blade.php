<!DOCTYPE html>
<html>
<head><title>Tambah Anggota</title></head>
<body style="background:#f0f7ff; padding:20px;">
<div style="max-width:600px; margin:auto; background:white; padding:20px; border-radius:15px;">
    <h1>Tambah User Baru</h1>
    <form method="POST" action="{{ route('admin.users.store') }}">
        @csrf
        <label>Nama Lengkap *</label><br>
        <input type="text" name="name" required style="width:100%"><br>
        <label>Nomor Telepon *</label><br>
        <input type="text" name="nomor_telepon" required style="width:100%"><br>
        <label>Email *</label><br>
        <input type="email" name="email" required style="width:100%"><br>
        <label>Password *</label><br>
        <input type="password" name="password" required style="width:100%"><br>
        <label>Konfirmasi Password *</label><br>
        <input type="password" name="password_confirmation" required style="width:100%"><br>
        <label>Role *</label><br>
        <select name="role" required>
            <option value="peminjam">Peminjam (Siswa)</option>
            <option value="admin">Admin</option>
        </select><br><br>
        <button type="submit">Simpan</button>
        <a href="{{ route('admin.users.index') }}">Batal</a>
    </form>
</div>
</body>
</html>