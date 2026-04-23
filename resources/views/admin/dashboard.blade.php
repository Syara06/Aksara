<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Perpustakaan</title>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700&family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/lucide@latest/dist/umd/lucide.js"></script>
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        :root {
            --forest:      #1a3a2a;
            --forest-mid:  #234d38;
            --forest-soft: #2d6148;
            --green:       #3d9970;
            --green-light: #d1fae5;
            --lime:        #a3e635;
            --sand:        #f5f0e8;
            --sand-2:      #ede7d9;
            --bg:          #f7f4ef;
            --surface:     #ffffff;
            --text:        #1c2b22;
            --text-muted:  #6b7c72;
            --border:      #e0d9ce;
            --shadow-sm:   0 1px 4px rgba(26,58,42,0.07);
            --shadow:      0 4px 18px rgba(26,58,42,0.10);
            --shadow-lg:   0 10px 36px rgba(26,58,42,0.14);
            --radius:      14px;
            --radius-sm:   9px;
            --sidebar-w:   270px;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: var(--bg);
            color: var(--text);
            min-height: 100vh;
        }

        /* ─── SIDEBAR ─── */
        .sidebar {
            position: fixed;
            top: 0; left: 0;
            width: var(--sidebar-w);
            height: 100vh;
            background: var(--forest);
            display: flex;
            flex-direction: column;
            z-index: 100;
            overflow: hidden;
        }
        .sidebar::before {
            content: '';
            position: absolute;
            inset: 0;
            background-image:
                radial-gradient(circle at 80% 10%, rgba(163,230,53,0.06) 0%, transparent 55%),
                radial-gradient(circle at 20% 80%, rgba(61,153,112,0.08) 0%, transparent 50%);
            pointer-events: none;
        }

        .sidebar-brand {
            padding: 28px 24px 24px;
            border-bottom: 1px solid rgba(255,255,255,0.07);
            display: flex;
            align-items: center;
            gap: 13px;
        }
        .brand-icon {
            width: 44px; height: 44px;
            background: linear-gradient(135deg, var(--green), var(--lime));
            border-radius: 12px;
            display: flex; align-items: center; justify-content: center;
            flex-shrink: 0;
            box-shadow: 0 4px 14px rgba(61,153,112,0.4);
            color: var(--forest);
        }
        .brand-name {
            font-family: 'Playfair Display', serif;
            color: #fff;
            font-size: 17px;
            font-weight: 700;
            line-height: 1.2;
        }
        .brand-sub {
            font-size: 11.5px;
            color: rgba(255,255,255,0.38);
            font-weight: 400;
            margin-top: 1px;
        }

        .nav-section { padding: 18px 14px 6px; }
        .nav-label {
            font-size: 10.5px;
            font-weight: 700;
            letter-spacing: 0.12em;
            text-transform: uppercase;
            color: rgba(255,255,255,0.28);
            padding: 0 10px;
            margin-bottom: 7px;
        }

        .nav-item {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 11px 13px;
            border-radius: var(--radius-sm);
            color: rgba(255,255,255,0.58);
            text-decoration: none;
            font-size: 14.5px;
            font-weight: 500;
            transition: all 0.18s ease;
            margin-bottom: 2px;
            position: relative;
            cursor: pointer;
        }
        .nav-item svg { flex-shrink: 0; transition: color 0.18s; }
        .nav-item:hover {
            background: rgba(255,255,255,0.07);
            color: rgba(255,255,255,0.92);
        }
        .nav-item.active {
            background: rgba(163,230,53,0.14);
            color: var(--lime);
        }
        .nav-item.active svg { color: var(--lime); }
        .nav-item.active::before {
            content: '';
            position: absolute;
            left: 0; top: 22%; bottom: 22%;
            width: 3px;
            background: var(--lime);
            border-radius: 0 3px 3px 0;
        }

        .sidebar-divider {
            height: 1px;
            background: rgba(255,255,255,0.07);
            margin: 8px 14px;
        }

        .sidebar-footer {
            margin-top: auto;
            padding: 14px 14px 24px;
        }
        .btn-logout-nav {
            display: flex;
            align-items: center;
            gap: 12px;
            width: 100%;
            padding: 11px 13px;
            border-radius: var(--radius-sm);
            background: none;
            border: none;
            cursor: pointer;
            color: rgba(255,255,255,0.42);
            font-size: 14.5px;
            font-weight: 500;
            font-family: 'Plus Jakarta Sans', sans-serif;
            transition: all 0.18s;
            text-align: left;
        }
        .btn-logout-nav:hover {
            background: rgba(239,68,68,0.15);
            color: #fca5a5;
        }

        /* ─── MAIN ─── */
        .main {
            margin-left: var(--sidebar-w);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        /* ─── TOPBAR ─── */
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
        .page-title {
            font-family: 'Playfair Display', serif;
            font-size: 20px;
            font-weight: 700;
            color: var(--forest);
        }
        .page-sub { font-size: 12px; color: var(--text-muted); margin-top: 1px; }
        .topbar-right { display: flex; align-items: center; gap: 12px; }

        .role-badge { font-size: 12px; font-weight: 600; padding: 4px 12px; border-radius: 20px; }
        .role-admin { background: #fef9c3; color: #854d0e; }
        .role-siswa { background: var(--green-light); color: #065f46; }

        .user-chip {
            display: flex;
            align-items: center;
            gap: 9px;
            background: var(--sand);
            border: 1px solid var(--border);
            padding: 5px 14px 5px 5px;
            border-radius: 40px;
        }
        .user-avatar {
            width: 30px; height: 30px;
            background: linear-gradient(135deg, var(--forest-mid), var(--green));
            border-radius: 50%;
            display: flex; align-items: center; justify-content: center;
            color: white;
            font-size: 12px;
            font-weight: 700;
        }
        .user-name { font-size: 13.5px; font-weight: 600; color: var(--text); }

        .btn-logout-top {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: none;
            border: 1.5px solid #fca5a5;
            color: #dc2626;
            font-size: 13px;
            font-weight: 500;
            padding: 7px 14px;
            border-radius: var(--radius-sm);
            cursor: pointer;
            font-family: 'Plus Jakarta Sans', sans-serif;
            transition: all 0.15s;
        }
        .btn-logout-top:hover { background: #dc2626; color: white; border-color: #dc2626; }

        /* ─── CONTENT ─── */
        .content { padding: 28px 32px; flex: 1; }

        /* ─── WELCOME BANNER ─── */
        .welcome-banner {
            background: linear-gradient(130deg, var(--forest) 0%, var(--forest-soft) 100%);
            border-radius: var(--radius);
            padding: 28px 32px;
            margin-bottom: 24px;
            position: relative;
            overflow: hidden;
        }
        .welcome-banner::after {
            content: '';
            position: absolute;
            right: -30px; bottom: -40px;
            width: 220px; height: 220px;
            background: radial-gradient(circle, rgba(163,230,53,0.12) 0%, transparent 70%);
        }
        .welcome-banner h2 {
            font-family: 'Playfair Display', serif;
            color: white;
            font-size: 23px;
            font-weight: 700;
            margin-bottom: 6px;
        }
        .welcome-banner p { color: rgba(255,255,255,0.62); font-size: 13.5px; }
        .welcome-pills { display: flex; gap: 7px; margin-top: 14px; flex-wrap: wrap; }
        .pill {
            background: rgba(255,255,255,0.09);
            border: 1px solid rgba(255,255,255,0.12);
            color: rgba(255,255,255,0.75);
            font-size: 12px;
            padding: 4px 12px;
            border-radius: 20px;
            display: flex; align-items: center; gap: 5px;
        }

        /* ─── STATS ─── */
        .stats-row {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(170px, 1fr));
            gap: 16px;
            margin-bottom: 24px;
        }
        .stat-card {
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: var(--radius);
            padding: 18px 20px;
            box-shadow: var(--shadow-sm);
            display: flex;
            align-items: flex-start;
            gap: 14px;
        }
        .stat-icon {
            width: 44px; height: 44px;
            border-radius: 11px;
            display: flex; align-items: center; justify-content: center;
            flex-shrink: 0;
        }
        .ic-green  { background: #d1fae5; color: #059669; }
        .ic-amber  { background: #fef3c7; color: #d97706; }
        .ic-blue   { background: #dbeafe; color: #2563eb; }
        .ic-rose   { background: #ffe4e6; color: #e11d48; }
        .ic-forest { background: #dcfce7; color: var(--forest); }
        .stat-label { font-size: 12px; color: var(--text-muted); margin-bottom: 3px; }
        .stat-value {
            font-family: 'Playfair Display', serif;
            font-size: 26px;
            font-weight: 700;
            color: var(--forest);
        }

        /* ─── CARD ─── */
        .card {
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: var(--radius);
            box-shadow: var(--shadow-sm);
            margin-bottom: 20px;
            overflow: hidden;
        }
        .card-header {
            padding: 16px 22px;
            border-bottom: 1px solid var(--border);
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .card-title-wrap { display: flex; align-items: center; gap: 9px; }
        .card-title {
            font-family: 'Playfair Display', serif;
            font-size: 16px;
            font-weight: 700;
            color: var(--forest);
        }

        /* ─── TABLE ─── */
        table { width: 100%; border-collapse: collapse; }
        thead th {
            font-size: 11.5px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.06em;
            color: var(--text-muted);
            padding: 11px 16px;
            background: var(--sand);
            border-bottom: 1px solid var(--border);
            text-align: left;
        }
        tbody td {
            padding: 13px 16px;
            font-size: 14px;
            border-bottom: 1px solid var(--border);
            color: var(--text);
        }
        tbody tr:last-child td { border-bottom: none; }
        tbody tr:hover td { background: #faf8f4; }

        .empty-state {
            padding: 44px;
            text-align: center;
            color: var(--text-muted);
        }
        .empty-icon {
            width: 54px; height: 54px;
            background: var(--sand);
            border-radius: 50%;
            display: flex; align-items: center; justify-content: center;
            margin: 0 auto 12px;
            color: var(--text-muted);
        }
        .empty-state p { font-size: 14px; }

        /* ─── BADGE ─── */
        .badge {
            display: inline-flex; align-items: center; gap: 4px;
            padding: 3px 10px; border-radius: 20px;
            font-size: 12px; font-weight: 600;
        }
        .badge-green { background: #d1fae5; color: #065f46; }
        .badge-amber { background: #fef3c7; color: #92400e; }
        .badge-red   { background: #fee2e2; color: #991b1b; }

        /* ─── BUTTONS ─── */
        .btn {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            padding: 8px 16px;
            border-radius: var(--radius-sm);
            font-size: 13.5px;
            font-weight: 600;
            font-family: 'Plus Jakarta Sans', sans-serif;
            text-decoration: none;
            cursor: pointer;
            border: none;
            transition: all 0.15s;
        }
        .btn-primary { background: var(--forest); color: white; }
        .btn-primary:hover { background: var(--forest-mid); }
        .btn-green { background: var(--green); color: white; }
        .btn-green:hover { background: #2e7d56; }
        .btn-sm { padding: 6px 12px; font-size: 12.5px; }

        /* ─── ADMIN ACTIONS ─── */
        .admin-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(190px, 1fr));
            gap: 14px;
        }
        .admin-action {
            background: var(--sand);
            border: 1.5px solid var(--border);
            border-radius: var(--radius);
            padding: 20px 18px;
            text-decoration: none;
            color: var(--text);
            transition: all 0.18s;
            display: flex;
            flex-direction: column;
            gap: 10px;
        }
        .admin-action:hover {
            border-color: var(--green);
            background: var(--green-light);
            transform: translateY(-2px);
            box-shadow: var(--shadow);
        }
        .aa-icon {
            width: 40px; height: 40px;
            border-radius: 10px;
            background: var(--surface);
            border: 1px solid var(--border);
            display: flex; align-items: center; justify-content: center;
            color: var(--forest-mid);
            transition: all 0.18s;
        }
        .admin-action:hover .aa-icon {
            background: var(--forest);
            border-color: var(--forest);
            color: var(--lime);
        }
        .aa-label { font-weight: 700; font-size: 14px; color: var(--forest); }
        .aa-desc  { font-size: 12px; color: var(--text-muted); line-height: 1.4; }

        /* ─── RESPONSIVE ─── */
        @media (max-width: 900px) {
            :root { --sidebar-w: 68px; }
            .brand-name, .brand-sub, .nav-label, .nav-text { display: none; }
            .sidebar-brand { justify-content: center; padding: 22px 12px 20px; }
            .nav-item { justify-content: center; padding: 11px; }
            .nav-item.active::before { display: none; }
            .btn-logout-nav .nav-text { display: none; }
            .btn-logout-nav { justify-content: center; padding: 11px; }
        }
    </style>
</head>
<body>

{{-- ─── SIDEBAR ─── --}}
<aside class="sidebar">
    <div class="sidebar-brand">
        <div class="brand-icon">
            <i data-lucide="book-open" width="22" height="22"></i>
        </div>
        <div>
            <div class="brand-name">Perpustakaan</div>
            <div class="brand-sub">Sistem Manajemen</div>
        </div>
    </div>

    <div class="nav-section">
        <div class="nav-label">Menu Utama</div>

        <a href="{{ route('admin.dashboard') }}" class="nav-item active">
            <i data-lucide="layout-dashboard" width="18" height="18"></i>
            <span class="nav-text">Dashboard</span>
        </a>
        <a href="{{ route('admin.books.index') }}" class="nav-item">
            <i data-lucide="book-marked" width="18" height="18"></i>
            <span class="nav-text">Kelola Buku</span>
        </a>
        <a href="{{ route('admin.loans.pengajuan') }}" class="nav-item">
            <i data-lucide="book-plus" width="18" height="18"></i>
            <span class="nav-text">Pengajuan Peminjaman</span>
        </a>
        <a href="#" class="nav-item">
            <i data-lucide="book-check" width="18" height="18"></i>
            <span class="nav-text">Pengajuan Pengembalian</span>
        </a>
        <a href="{{ route('admin.users.index') }}" class="nav-item">
            <i data-lucide="users" width="18" height="18"></i>
            <span class="nav-text">Anggota</span>
        </a>
    </div>

    <div class="sidebar-divider"></div>

    <div class="nav-section" style="padding-top:6px;">
        <a href="#" class="nav-item">
            <i data-lucide="user-circle" width="18" height="18"></i>
            <span class="nav-text">Akun Saya</span>
        </a>
    </div>

    <div class="sidebar-footer">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="btn-logout-nav">
                <i data-lucide="log-out" width="18" height="18"></i>
                <span class="nav-text">Keluar</span>
            </button>
        </form>
    </div>
</aside>

{{-- ─── MAIN ─── --}}
<div class="main">

    <header class="topbar">
        <div>
            <div class="page-title">Dashboard</div>
            <div class="page-sub">Selamat datang kembali 👋</div>
        </div>
        <div class="topbar-right">
            @if(Auth::user()->role == 'admin')
                <span class="role-badge role-admin">Admin</span>
            @else
                <span class="role-badge role-siswa">Siswa</span>
            @endif
            <div class="user-chip">
                <div class="user-avatar">{{ strtoupper(substr(Auth::user()->name, 0, 1)) }}</div>
                <span class="user-name">{{ Auth::user()->name }}</span>
            </div>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="btn-logout-top">
                    <i data-lucide="log-out" width="14" height="14"></i>
                    Keluar
                </button>
            </form>
        </div>
    </header>

    <main class="content">

        {{-- Welcome --}}
        <div class="welcome-banner">
            <h2>Halo, {{ Auth::user()->name }}!</h2>
            <p>Semoga hari ini produktif. Yuk mulai dengan melihat koleksi buku tersedia.</p>
            <div class="welcome-pills">
                <span class="pill">
                    <i data-lucide="mail" width="11" height="11"></i>
                    {{ Auth::user()->email }}
                </span>
                @if(Auth::user()->nomor_telepon)
                <span class="pill">
                    <i data-lucide="phone" width="11" height="11"></i>
                    {{ Auth::user()->nomor_telepon }}
                </span>
                @endif
            </div>
        </div>

        @if(Auth::user()->role == 'admin')

        {{-- Admin Stats --}}
        <div class="stats-row">
            <div class="stat-card">
                <div class="stat-icon ic-forest">
                    <i data-lucide="library" width="20" height="20"></i>
                </div>
                <div>
                    <div class="stat-label">Total Buku</div>
                     <p class="stat-number">{{ $totalBuku }}</p>
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-icon ic-blue">
                    <i data-lucide="book-open" width="20" height="20"></i>
                </div>
                <div>
                    <div class="stat-label">Sedang Dipinjam</div>
                    <p class="stat-number">{{ $sedangDipinjam }}</p>
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-icon ic-amber">
                    <i data-lucide="clock" width="20" height="20"></i>
                </div>
                <div>
                    <div class="stat-label">Terlambat</div>
                    <p class="stat-number">{{ $terlambat }}</p>
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-icon ic-rose">
                    <i data-lucide="users" width="20" height="20"></i>
                </div>
                <div>
                    <div class="stat-label">Total Anggota</div>
                    <p class="stat-number">{{ $totalAnggota }}</p>
                </div>
            </div>
        </div>

        {{-- Admin Quick Actions --}}
        <div class="card">
            <div class="card-header">
                <div class="card-title-wrap">
                    <i data-lucide="zap" width="17" height="17" style="color:var(--green)"></i>
                    <span class="card-title">Aksi Cepat</span>
                </div>
            </div>
            <div style="padding:20px 22px;">
                <div class="admin-grid">
                    <a href="admin.books.index" class="admin-action">
                        <div class="aa-icon"><i data-lucide="book-marked" width="18" height="18"></i></div>
                        <div class="aa-label">Kelola Buku</div>
                        <div class="aa-desc">Tambah, edit, atau hapus koleksi buku</div>
                    </a>
                    <a href="admin.loans.pengajuan" class="admin-action">
                        <div class="aa-icon"><i data-lucide="book-plus" width="18" height="18"></i></div>
                        <div class="aa-label">Pengajuan Peminjaman</div>
                        <div class="aa-desc">Proses permintaan pinjam dari anggota</div>
                    </a>
                    <a href="#" class="admin-action">
                        <div class="aa-icon"><i data-lucide="book-check" width="18" height="18"></i></div>
                        <div class="aa-label">Pengajuan Pengembalian</div>
                        <div class="aa-desc">Konfirmasi pengembalian buku</div>
                    </a>
                    <a href="admin.users.index" class="admin-action">
                        <div class="aa-icon"><i data-lucide="users" width="18" height="18"></i></div>
                        <div class="aa-label">Anggota</div>
                        <div class="aa-desc">Kelola data anggota perpustakaan</div>
                    </a>
                </div>
            </div>
        </div>

        @else

        {{-- Student Stats --}}
        <div class="stats-row">
            <div class="stat-card">
                <div class="stat-icon ic-green">
                    <i data-lucide="book-open" width="20" height="20"></i>
                </div>
                <div>
                    <div class="stat-label">Sedang Dipinjam</div>
                    <div class="stat-value">0</div>
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-icon ic-blue">
                    <i data-lucide="history" width="20" height="20"></i>
                </div>
                <div>
                    <div class="stat-label">Total Riwayat</div>
                    <div class="stat-value">0</div>
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-icon ic-amber">
                    <i data-lucide="alarm-clock" width="20" height="20"></i>
                </div>
                <div>
                    <div class="stat-label">Jatuh Tempo</div>
                    <div class="stat-value">0</div>
                </div>
            </div>
        </div>

        {{-- Active Loans --}}
        <div class="card">
            <div class="card-header">
                <div class="card-title-wrap">
                    <i data-lucide="book-open" width="17" height="17" style="color:var(--green)"></i>
                    <span class="card-title">Peminjaman Aktif</span>
                </div>
                <a href="#" class="btn btn-green btn-sm">
                    <i data-lucide="plus" width="14" height="14"></i>
                    Pinjam Buku
                </a>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>Judul Buku</th>
                        <th>Pengarang</th>
                        <th>Tgl Pinjam</th>
                        <th>Jatuh Tempo</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- @forelse($peminjaman as $item)
                    <tr>
                        <td><strong>{{ $item->buku->judul }}</strong></td>
                        <td>{{ $item->buku->pengarang }}</td>
                        <td>{{ $item->tanggal_pinjam->format('d M Y') }}</td>
                        <td>{{ $item->tanggal_kembali->format('d M Y') }}</td>
                        <td><span class="badge badge-green">Aktif</span></td>
                        <td>
                            <a href="#" class="btn btn-primary btn-sm">
                                <i data-lucide="corner-down-left" width="12" height="12"></i>
                                Kembalikan
                            </a>
                        </td>
                    </tr>
                    @empty --}}
                    <tr>
                        <td colspan="6">
                            <div class="empty-state">
                                <div class="empty-icon">
                                    <i data-lucide="inbox" width="24" height="24"></i>
                                </div>
                                <p>Belum ada peminjaman aktif saat ini.</p>
                            </div>
                        </td>
                    </tr>
                    {{-- @endforelse --}}
                </tbody>
            </table>
        </div>

        @endif

    </main>
</div>

<script>lucide.createIcons();</script>
</body>
</html>