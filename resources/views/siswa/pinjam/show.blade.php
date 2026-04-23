<!DOCTYPE html>
<html>
<head>
    <title>Detail Buku</title>
    <style>
        body { font-family: Arial; background: #f0f7ff; padding: 20px; }
        .container { max-width: 800px; margin: auto; background: white; padding: 20px; border-radius: 15px; }
        .cover { float: left; margin-right: 20px; width: 200px; }
        .info { overflow: hidden; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ccc; padding: 8px; vertical-align: top; }
        th { background: #e6f0fa; width: 30%; }
        .btn-pinjam { background: #16a34a; color: white; padding: 10px 20px; text-decoration: none; border-radius: 8px; display: inline-block; margin-top: 20px; }
    </style>
</head>
<body>
<div class="container">
    <h1>{{ $book->judul }}</h1>
    @if($book->cover)
        <img src="{{ Storage::url($book->cover) }}" class="cover" alt="Cover">
    @endif
    <div class="info">
        <table>
            <tr><th>ISBN</th><td>{{ $book->isbn ?? '-' }}</td></tr>
            <tr><th>Pengarang</th><td>{{ $book->pengarang }}</td></tr>
            <tr><th>Penerbit</th><td>{{ $book->penerbit ?? '-' }}</td></tr>
            <tr><th>Tahun Terbit</th><td>{{ $book->tahun_terbit ?? '-' }}</td></tr>
            <tr><th>Kode Rak</th><td>{{ $book->kode_rak ?? '-' }}</td></tr>
            <tr><th>Kategori</th><td>{{ $book->kategori ?? '-' }}</td></tr>
            <tr><th>Stok Tersedia</th><td>{{ $book->total_stok }}</td></tr>
            <tr><th>Kondisi</th><td>{{ $book->kondisi }}</td></tr>
            <tr><th>Deskripsi</th><td>{{ $book->deskripsi ?? '-' }}</td></tr>
        </table>
        @if($book->kondisi == 'baik' && $book->total_stok > 0)
            <a href="{{ route('pinjam.form', $book->id) }}" class="btn-pinjam">📝 Pinjam Buku</a>
        @else
            <p style="color:red;">Buku sedang tidak tersedia untuk dipinjam.</p>
        @endif
    </div>
    <p><a href="{{ route('siswa.buku.index') }}">← Kembali ke Daftar Buku</a></p>
</div>
</body>
</html>