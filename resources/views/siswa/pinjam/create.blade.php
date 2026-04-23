<!DOCTYPE html>
<html>
<head>
    <title>Ajukan Peminjaman</title>
    <style>
        body { font-family: Arial; background: #f0f7ff; padding: 20px; }
        .container { max-width: 600px; margin: auto; background: white; padding: 20px; border-radius: 15px; }
        label { font-weight: bold; display: block; margin-top: 10px; }
        input { width: 100%; padding: 8px; margin-top: 5px; border-radius: 8px; border: 1px solid #ccc; }
        button { background: #0f3b5c; color: white; padding: 10px 20px; border: none; border-radius: 8px; margin-top: 20px; cursor: pointer; }
    </style>
</head>
<body>
<div class="container">
    <h2>Ajukan Peminjaman</h2>
    <p><strong>Buku:</strong> {{ $book->judul }} (Stok: {{ $book->total_stok }})</p>
    <form method="POST" action="{{ route('pinjam.ajukan') }}">
        @csrf
        <input type="hidden" name="book_id" value="{{ $book->id }}">
        <label>Tanggal Pinjam</label>
        <input type="date" name="tanggal_pinjam" required>
        <label>Tanggal Rencana Kembali</label>
        <input type="date" name="tanggal_kembali_rencana" required>
        <button type="submit">📮 Ajukan Peminjaman</button>
    </form>
    <p><a href="{{ route('siswa.buku.index') }}">← Kembali ke Daftar Buku</a></p>
</div>
</body>
</html>