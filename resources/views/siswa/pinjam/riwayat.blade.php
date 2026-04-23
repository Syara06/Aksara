<!DOCTYPE html>
<html>
<head>
    <title>Riwayat Peminjaman Saya</title>
    <style>
        body { font-family: Arial; background: #f0f7ff; padding: 20px; }
        .container { max-width: 1000px; margin: auto; background: white; padding: 20px; border-radius: 15px; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #ccc; padding: 8px; text-align: left; }
        th { background: #0f3b5c; color: white; }
        .badge { padding: 3px 8px; border-radius: 12px; font-size: 12px; }
        .badge-pengajuan { background: #fef08a; color: #854d0e; }
        .badge-dipinjam { background: #bbf7d0; color: #166534; }
        .badge-ditolak { background: #fee2e2; color: #991b1b; }
        .badge-dikembalikan { background: #cffafe; color: #155e75; }
    </style>
</head>
<body>
<div class="container">
    <h1>📜 Riwayat Peminjaman Saya</h1>

    @if(session('success'))
        <div style="background:lightgreen; padding:10px; margin-bottom:15px;">{{ session('success') }}</div>
    @endif

    <table>
        <thead>
            <tr><th>Buku</th><th>Tanggal Pinjam</th><th>Rencana Kembali</th><th>Status</th><th>Alasan Tolak</th></tr>
        </thead>
        <tbody>
            @forelse($loans as $loan)
            <tr>
                <td>{{ $loan->book->judul }}</td>
                <td>{{ $loan->tanggal_pinjam }}</td>
                <td>{{ $loan->tanggal_kembali_rencana ?? '-' }}</td>
                <td>
                    @if($loan->status == 'pengajuan') 
                        <span class="badge badge-pengajuan">Pengajuan</span>
                    @elseif($loan->status == 'dipinjam')
                        <span class="badge badge-dipinjam">Dipinjam</span>
                    @elseif($loan->status == 'ditolak')
                        <span class="badge badge-ditolak">Ditolak</span>
                    @elseif($loan->status == 'dikembalikan')
                        <span class="badge badge-dikembalikan">Dikembalikan</span>
                    @endif
                </td>
                <td>{{ $loan->alasan_tolak ?? '-' }}</td>
            </tr>
            @empty
            <tr><td colspan="5">Belum ada riwayat peminjaman.</td></tr>
            @endforelse
        </tbody>
    </table>
    <p><a href="{{ route('siswa.dashboard') }}">← Kembali ke Dashboard</a></p>
</div>
</body>
</html>