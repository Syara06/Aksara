<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Peminjaman - Perpustakaan</title>
    <link
        href="https://fonts.googleapis.com/css2?family=Sora:wght@400;500;600;700;800&family=Lora:ital,wght@0,400;0,600;1,400&display=swap"
        rel="stylesheet">
    <script src="https://unpkg.com/lucide@latest/dist/umd/lucide.js"></script>
    <style>
        *,
        *::before,
        *::after {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        :root {
            --ink: #0f1c14;
            --ink-soft: #2e3d34;
            --sage: #5a8a6a;
            --sage-light: #8cb89a;
            --mint: #c8f0d4;
            --lime-pop: #b5e853;
            --cream: #f6f2ea;
            --cream-dark: #ede8dc;
            --surface: #ffffff;
            --text: #1a2b20;
            --text-soft: #5a6b60;
            --border: #ddd8cc;
            --radius-xl: 20px;
            --radius-lg: 14px;
            --radius-sm: 9px;
            --sidebar-w: 260px;
        }

        body {
            font-family: 'Sora', sans-serif;
            background: var(--cream);
            color: var(--text);
            min-height: 100vh;
        }

        /* ── SIDEBAR ── */
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            width: var(--sidebar-w);
            height: 100vh;
            background: var(--ink);
            display: flex;
            flex-direction: column;
            z-index: 100;
            overflow: hidden;
        }

        .sidebar::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            height: 280px;
            background: radial-gradient(ellipse at 50% 110%, rgba(181, 232, 83, 0.12) 0%, transparent 65%);
            pointer-events: none;
        }

        .sidebar-top {
            padding: 26px 22px 20px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.07);
        }

        .sidebar-logo {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 20px;
        }

        .logo-dot {
            width: 10px;
            height: 10px;
            background: var(--lime-pop);
            border-radius: 50%;
            box-shadow: 0 0 8px rgba(181, 232, 83, 0.6);
        }

        .logo-text {
            font-family: 'Lora', serif;
            color: white;
            font-size: 15px;
            font-weight: 600;
        }

        .sidebar-user {
            display: flex;
            align-items: center;
            gap: 11px;
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.08);
            border-radius: var(--radius-lg);
            padding: 11px 13px;
        }

        .sidebar-avatar {
            width: 38px;
            height: 38px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--sage), var(--lime-pop));
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 15px;
            font-weight: 700;
            color: var(--ink);
            flex-shrink: 0;
        }

        .sidebar-user-name {
            font-size: 13px;
            font-weight: 600;
            color: white;
            line-height: 1.2;
        }

        .sidebar-user-nisn {
            font-size: 11px;
            color: rgba(255, 255, 255, 0.38);
            margin-top: 2px;
        }

        .nav-wrap {
            padding: 18px 14px;
            flex: 1;
        }

        .nav-section-label {
            font-size: 10px;
            font-weight: 700;
            letter-spacing: 0.14em;
            text-transform: uppercase;
            color: rgba(255, 255, 255, 0.22);
            padding: 0 8px;
            margin-bottom: 8px;
            margin-top: 16px;
        }

        .nav-section-label:first-child {
            margin-top: 0;
        }

        .nav-item {
            display: flex;
            align-items: center;
            gap: 11px;
            padding: 10px 10px;
            border-radius: var(--radius-sm);
            color: rgba(255, 255, 255, 0.5);
            text-decoration: none;
            font-size: 14px;
            font-weight: 500;
            transition: all 0.18s;
            margin-bottom: 2px;
            position: relative;
        }

        .nav-item:hover {
            background: rgba(255, 255, 255, 0.06);
            color: rgba(255, 255, 255, 0.9);
        }

        .nav-item.active {
            background: rgba(181, 232, 83, 0.14);
            color: var(--lime-pop);
        }

        .nav-item.active::before {
            content: '';
            position: absolute;
            left: 0;
            top: 25%;
            bottom: 25%;
            width: 3px;
            background: var(--lime-pop);
            border-radius: 0 2px 2px 0;
        }

        .sidebar-divider {
            height: 1px;
            background: rgba(255, 255, 255, 0.07);
            margin: 4px 14px;
        }

        .sidebar-footer {
            padding: 14px 14px 26px;
        }

        .logout-btn {
            display: flex;
            align-items: center;
            gap: 11px;
            width: 100%;
            padding: 10px 10px;
            border-radius: var(--radius-sm);
            background: none;
            border: none;
            cursor: pointer;
            color: rgba(255, 255, 255, 0.35);
            font-size: 14px;
            font-weight: 500;
            font-family: 'Sora', sans-serif;
            transition: all 0.18s;
            text-align: left;
        }

        .logout-btn:hover {
            background: rgba(239, 68, 68, 0.15);
            color: #fca5a5;
        }

        .main {
            margin-left: var(--sidebar-w);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        /* ── TOPBAR ── */
        .topbar {
            background: var(--surface);
            border-bottom: 1px solid var(--border);
            padding: 14px 32px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            position: sticky;
            top: 0;
            z-index: 50;
        }

        .topbar-breadcrumb {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .breadcrumb-link {
            font-size: 13px;
            color: var(--text-soft);
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 5px;
            font-weight: 500;
        }

        .breadcrumb-link:hover {
            color: var(--sage);
        }

        .breadcrumb-sep {
            color: var(--border);
        }

        .breadcrumb-current {
            font-size: 13px;
            font-weight: 600;
            color: var(--text);
        }

        .user-chip {
            display: flex;
            align-items: center;
            gap: 9px;
            background: var(--cream);
            border: 1px solid var(--border);
            padding: 5px 14px 5px 5px;
            border-radius: 40px;
        }

        .chip-avatar {
            width: 28px;
            height: 28px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--sage), var(--lime-pop));
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--ink);
            font-size: 11px;
            font-weight: 700;
        }

        .chip-name {
            font-size: 13px;
            font-weight: 600;
        }

        /* ── CONTENT ── */
        .content {
            padding: 28px 32px;
            flex: 1;
        }

        .page-header {
            display: flex;
            align-items: flex-end;
            justify-content: space-between;
            margin-bottom: 22px;
            flex-wrap: wrap;
            gap: 12px;
        }

        .page-header h1 {
            font-family: 'Lora', serif;
            font-size: 26px;
            font-weight: 600;
            color: var(--ink);
        }

        .page-header p {
            font-size: 13.5px;
            color: var(--text-soft);
            margin-top: 4px;
        }

        /* ── ALERT ── */
        .alert {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 12px 16px;
            border-radius: var(--radius-sm);
            margin-bottom: 20px;
            font-size: 14px;
            font-weight: 500;
        }

        .alert-success {
            background: var(--mint);
            border: 1px solid #6ee7b7;
            color: #065f46;
        }

        /* ── FILTER TABS ── */
        .filter-tabs {
            display: flex;
            gap: 6px;
            margin-bottom: 18px;
            flex-wrap: wrap;
        }

        .tab {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 7px 14px;
            border-radius: 20px;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
            border: 1.5px solid var(--border);
            background: var(--surface);
            color: var(--text-soft);
            transition: all 0.15s;
            text-decoration: none;
        }

        .tab:hover {
            border-color: var(--sage);
            color: var(--sage);
        }

        .tab.active {
            background: var(--ink);
            border-color: var(--ink);
            color: white;
        }

        .tab-count {
            background: rgba(255, 255, 255, 0.15);
            color: inherit;
            font-size: 11px;
            padding: 1px 7px;
            border-radius: 10px;
        }

        .tab:not(.active) .tab-count {
            background: var(--cream-dark);
        }

        /* ── TABLE CARD ── */
        .table-card {
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: var(--radius-lg);
            overflow: hidden;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        thead th {
            font-size: 11.5px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.06em;
            color: var(--text-soft);
            padding: 12px 18px;
            background: var(--cream);
            border-bottom: 1px solid var(--border);
            text-align: left;
            white-space: nowrap;
        }

        tbody td {
            padding: 14px 18px;
            font-size: 14px;
            border-bottom: 1px solid var(--border);
            color: var(--text);
            vertical-align: middle;
        }

        tbody tr:last-child td {
            border-bottom: none;
        }

        tbody tr {
            transition: background 0.12s;
        }

        tbody tr:hover td {
            background: #faf8f4;
        }

        /* ── BOOK CELL ── */
        .book-cell {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .book-mini-cover {
            width: 34px;
            height: 44px;
            border-radius: 5px;
            flex-shrink: 0;
            background: var(--cream-dark);
            border: 1px solid var(--border);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--text-soft);
            overflow: hidden;
        }

        .book-mini-cover img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .book-title-text {
            font-weight: 600;
            font-size: 14px;
            color: var(--ink);
            line-height: 1.3;
        }

        .book-author-text {
            font-size: 12px;
            color: var(--text-soft);
            margin-top: 1px;
        }

        /* ── DATE CELL ── */
        .date-text {
            font-size: 13.5px;
            font-weight: 500;
        }

        .date-sub {
            font-size: 11.5px;
            color: var(--text-soft);
            margin-top: 2px;
        }

        /* ── BADGE ── */
        .badge {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            padding: 4px 11px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            white-space: nowrap;
        }

        .badge-pengajuan {
            background: #fef9c3;
            color: #854d0e;
        }

        .badge-dipinjam {
            background: var(--mint);
            color: #166534;
        }

        .badge-dikembalikan {
            background: #e0f2fe;
            color: #075985;
        }

        .badge-ditolak {
            background: #fee2e2;
            color: #991b1b;
        }

        /* ── ALASAN TOLAK ── */
        .alasan-box {
            background: #fff1f2;
            border: 1px solid #fecaca;
            border-radius: var(--radius-sm);
            padding: 7px 10px;
            font-size: 12.5px;
            color: #991b1b;
            margin-top: 4px;
            line-height: 1.4;
        }

        /* ── EMPTY ── */
        .empty-state {
            padding: 56px;
            text-align: center;
            color: var(--text-soft);
        }

        .empty-circle {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            background: var(--cream-dark);
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 14px;
        }

        .empty-state p {
            font-size: 14px;
        }

        .empty-state a {
            color: var(--sage);
            font-weight: 600;
            text-decoration: none;
        }

        /* ── PAGINATION ── */
        .pagination-wrap {
            padding: 14px 18px;
            border-top: 1px solid var(--border);
            background: var(--cream);
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .pagination-info {
            font-size: 13px;
            color: var(--text-soft);
        }

        /* ── RESPONSIVE ── */
        @media (max-width: 900px) {
            :root {
                --sidebar-w: 64px;
            }

            .sidebar-top .sidebar-user,
            .logo-text,
            .nav-item span,
            .nav-section-label,
            .logout-btn span {
                display: none;
            }

            .sidebar-top {
                padding: 20px 10px;
            }

            .sidebar-logo {
                justify-content: center;
            }

            .nav-item {
                justify-content: center;
                padding: 11px;
            }

            .nav-item.active::before {
                display: none;
            }

            .logout-btn {
                justify-content: center;
                padding: 11px;
            }

            .nav-wrap {
                padding: 12px 8px;
            }

            .topbar,
            .content {
                padding-left: 18px;
                padding-right: 18px;
            }
        }
    </style>
</head>

<body>

    <aside class="sidebar">
        <div class="sidebar-top">
            <div class="sidebar-logo">
                <div class="logo-dot"></div>
                <span class="logo-text">Aksara</span>
            </div>
            <div class="sidebar-user">
                @if (Auth::user()->foto)
                    <div class="sidebar-avatar" style="padding:0; overflow:hidden;">
                        <img src="{{ Storage::url(Auth::user()->foto) }}"
                            style="width:100%; height:100%; object-fit:cover;">
                    </div>
                @else
                    <div class="sidebar-avatar">{{ strtoupper(substr(Auth::user()->name, 0, 1)) }}</div>
                @endif
                <div>
                    <div class="sidebar-user-name">{{ Auth::user()->name }}</div>
                    <div class="sidebar-user-nisn">NISN {{ Auth::user()->nisn }}</div>
                </div>
            </div>
        </div>

        <div class="nav-wrap">
            <div class="nav-section-label">Menu</div>

            <a href="{{ route('siswa.dashboard') }}" class="nav-item active">
                <i data-lucide="layout-dashboard" width="17" height="17"></i>
                <span>Dashboard</span>
            </a>
            <a href="{{ route('siswa.buku.index') }}" class="nav-item">
                <i data-lucide="book-plus" width="17" height="17"></i>
                <span>Pinjam Buku</span>
            </a>
            
            <a href="{{ route('riwayat.pinjam') }}" class="nav-item">
                <i data-lucide="history" width="17" height="17"></i>
                <span>Riwayat Pinjam</span>
            </a>

            <div class="sidebar-divider" style="margin-top:10px;margin-bottom:10px;"></div>

            <div class="nav-section-label">Akun</div>
            <a href="{{ route('profile.index') }}" class="nav-item">
                <i data-lucide="user-circle" width="17" height="17"></i>
                <span>Akun Saya</span>
            </a>
        </div>

        <div class="sidebar-footer">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="logout-btn">
                    <i data-lucide="log-out" width="17" height="17"></i>
                    <span>Keluar</span>
                </button>
            </form>
        </div>
    </aside>


    <div class="main">
        <header class="topbar">
            <div class="topbar-breadcrumb">
                <a href="{{ route('siswa.dashboard') }}" class="breadcrumb-link">
                    <i data-lucide="layout-dashboard" width="13" height="13"></i> Dashboard
                </a>
                <span class="breadcrumb-sep">/</span>
                <span class="breadcrumb-current">Riwayat Pinjam</span>
            </div>
            <div class="user-chip">
                <div class="chip-avatar">{{ strtoupper(substr(Auth::user()->name, 0, 1)) }}</div>
                <span class="chip-name">{{ Auth::user()->name }}</span>
            </div>
        </header>

        <main class="content">

            <div class="page-header">
                <div>
                    <h1>Riwayat Peminjaman</h1>
                    <p>Semua peminjaman buku yang pernah kamu lakukan</p>
                </div>
                <a href="{{ route('siswa.buku.index') }}"
                    style="display:inline-flex;align-items:center;gap:7px;background:var(--lime-pop);color:var(--ink);font-size:13.5px;font-weight:700;padding:9px 18px;border-radius:var(--radius-lg);text-decoration:none;">
                    <i data-lucide="book-plus" width="14" height="14"></i>
                    Pinjam Lagi
                </a>
            </div>

            @if (session('success'))
                <div class="alert alert-success">
                    <i data-lucide="check-circle" width="16" height="16"></i>
                    {{ session('success') }}
                </div>
            @endif

            {{-- Filter Tabs --}}
            <div class="filter-tabs">
                <a href="#" class="tab active">Semua</a>
                <a href="#" class="tab">
                    <i data-lucide="clock" width="12" height="12"></i> Pengajuan
                </a>
                <a href="#" class="tab">
                    <i data-lucide="book-open" width="12" height="12"></i> Dipinjam
                </a>
                <a href="#" class="tab">
                    <i data-lucide="check" width="12" height="12"></i> Dikembalikan
                </a>
                <a href="#" class="tab">
                    <i data-lucide="x" width="12" height="12"></i> Ditolak
                </a>
            </div>

            <div class="table-card">
                <table>
                    <tbody>
                        @forelse($loans as $loan)
                            <tr>
                                <td>
                                    <div class="book-cell">
                                        <div class="book-mini-cover">
                                            @if ($loan->book->cover)
                                                <img src="{{ Storage::url($loan->book->cover) }}" alt="">
                                            @else
                                                <i data-lucide="book" width="14" height="14"></i>
                                            @endif
                                        </div>
                                        <div>
                                            <div class="book-title-text">{{ $loan->book->judul }}</div>
                                            <div class="book-author-text">{{ $loan->book->pengarang }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="date-text">
                                        {{ \Carbon\Carbon::parse($loan->tanggal_pinjam)->format('d M Y') }}</div>
                                </td>
                                <td>
                                    @if ($loan->tanggal_kembali_rencana)
                                        @php $tgl = \Carbon\Carbon::parse($loan->tanggal_kembali_rencana); @endphp
                                        <div class="date-text">{{ $tgl->format('d M Y') }}</div>
                                        @if (in_array($loan->status, ['dipinjam']) && $tgl->isPast())
                                            <div class="date-sub" style="color:#dc2626">Terlambat
                                                {{ $tgl->diffForHumans() }}</div>
                                        @elseif(in_array($loan->status, ['dipinjam']))
                                            <div class="date-sub">{{ $tgl->diffForHumans() }}</div>
                                        @endif
                                    @else
                                        <span style="color:var(--border)">–</span>
                                    @endif
                                </td>
                                <td>
                                    @php
                                        $badgeMap = [
                                            'pengajuan' => [
                                                'class' => 'badge-pengajuan',
                                                'icon' => 'clock',
                                                'label' => 'Pengajuan',
                                            ],
                                            'dipinjam' => [
                                                'class' => 'badge-dipinjam',
                                                'icon' => 'book-open',
                                                'label' => 'Dipinjam',
                                            ],
                                            'dikembalikan' => [
                                                'class' => 'badge-dikembalikan',
                                                'icon' => 'check-circle',
                                                'label' => 'Dikembalikan',
                                            ],
                                            'ditolak' => [
                                                'class' => 'badge-ditolak',
                                                'icon' => 'circle-x',
                                                'label' => 'Ditolak',
                                            ],
                                        ];
                                        $b = $badgeMap[$loan->status] ?? [
                                            'class' => 'badge-pengajuan',
                                            'icon' => 'circle',
                                            'label' => ucfirst($loan->status),
                                        ];
                                    @endphp
                                    <span class="badge {{ $b['class'] }}">
                                        <i data-lucide="{{ $b['icon'] }}" width="11" height="11"></i>
                                        {{ $b['label'] }}
                                    </span>
                                    @if ($loan->status === 'ditolak' && $loan->alasan_tolak)
                                        <div class="alasan-box">{{ $loan->alasan_tolak }}</div>
                                    @endif
                                </td>
                                {{-- KOLOM AKSI --}}
                                <td>
                                    @if ($loan->status == 'dipinjam' && is_null($loan->return_status))
                                        <a href="{{ route('pengembalian.form', $loan->id) }}"
                                            class="btn-sm btn-warning"
                                            style="display:inline-flex; align-items:center; gap:5px; background:#f59e0b; color:white; padding:6px 12px; border-radius:6px; text-decoration:none; font-size:12px;">
                                            <i data-lucide="book-check" width="12" height="12"></i> Ajukan
                                            Pengembalian
                                        </a>
                                    @else
                                        <span style="color:var(--text-soft); font-size:12px;">-</span>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5">
                                    <div class="empty-state">
                                        <div class="empty-circle">
                                            <i data-lucide="scroll-text" width="24" height="24"
                                                style="color:var(--text-soft)"></i>
                                        </div>
                                        <p>Belum ada riwayat peminjaman.<br>
                                            <a href="{{ route('siswa.buku.index') }}">Mulai pinjam buku sekarang →</a>
                                        </p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                @if (isset($loans) && method_exists($loans, 'hasPages') && $loans->hasPages())
                    <div class="pagination-wrap">
                        <span class="pagination-info">Menampilkan {{ $loans->firstItem() }}–{{ $loans->lastItem() }}
                            dari {{ $loans->total() }}</span>
                        {{ $loans->links() }}
                    </div>
                @endif
            </div>
        </main>
    </div>

    <script>
        lucide.createIcons();
    </script>
</body>

</html>
