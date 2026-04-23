<table border="1" cellpadding="8">
    <thead>
        <tr>
            <th>Nama Peminjam</th>
            <th>NISN</th>
            <th>Buku</th>
            <th>Tanggal Pinjam</th>
            <th>Rencana Kembali</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse($pengajuan as $loan)
        <tr>
            <td>{{ $loan->user->name }}</td>
            <td>{{ $loan->user->nisn }}</td>
            <td>{{ $loan->book->judul }}</td>
            <td>{{ $loan->tanggal_pinjam }}</td>
            <td>{{ $loan->tanggal_kembali_rencana }}</td>
            <td>
                <form method="POST" action="{{ route('admin.loans.setujui', $loan->id) }}" style="display:inline-block;">
                    @csrf
                    <button type="submit">✅ Setujui</button>
                </form>
                <form method="POST" action="{{ route('admin.loans.tolak', $loan->id) }}" style="display:inline-block;">
                    @csrf
                    <input type="text" name="alasan_tolak" placeholder="Alasan penolakan" required size="20">
                    <button type="submit">❌ Tolak</button>
                </form>
            </td>
        </tr>
        @empty
        <tr><td colspan="6">Tidak ada pengajuan peminjaman.</td></tr>
        @endforelse
    </tbody>
</table>