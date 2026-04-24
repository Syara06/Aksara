<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengajuan Pengembalian - Aksara</title>
    <link
        href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,600;0,700;1,400;1,600&family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap"
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
            --forest: #1a3a2a;
            --forest-mid: #234d38;
            --forest-soft: #2d6148;
            --green: #3d9970;
            --green-2: #2e7d56;
            --green-light: #d1fae5;
            --lime: #a3e635;
            --sand: #f5f0e8;
            --sand-2: #ede7d9;
            --bg: #f7f4ef;
            --surface: #ffffff;
            --text: #1c2b22;
            --text-muted: #6b7c72;
            --border: #e0d9ce;
            --shadow-sm: 0 1px 4px rgba(26, 58, 42, 0.07);
            --shadow: 0 4px 18px rgba(26, 58, 42, 0.10);
            --radius: 14px;
            --radius-sm: 9px;
            --sidebar-w: 270px;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: var(--bg);
            color: var(--text);
            min-height: 100vh;
        }

        /* grain overlay */
        body::before {
            content: '';
            position: fixed;
            inset: 0;
            z-index: 0;
            opacity: 0.022;
            background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='noise'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23noise)'/%3E%3C/svg%3E");
            background-size: 200px;
            pointer-events: none;
        }

        /* ─── SIDEBAR ─── */
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
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
                radial-gradient(circle at 80% 10%, rgba(163, 230, 53, 0.06) 0%, transparent 55%),
                radial-gradient(circle at 20% 80%, rgba(61, 153, 112, 0.08) 0%, transparent 50%);
            pointer-events: none;
        }

        .sidebar-brand {
            padding: 28px 24px 24px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.07);
            display: flex;
            align-items: center;
            gap: 13px;
        }

        .brand-icon {
            width: 44px;
            height: 44px;
            background: linear-gradient(135deg, var(--green), var(--lime));
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            box-shadow: 0 4px 14px rgba(61, 153, 112, 0.4);
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
            color: rgba(255, 255, 255, 0.38);
            font-weight: 400;
            margin-top: 1px;
        }

        .nav-section {
            padding: 18px 14px 6px;
        }

        .nav-label {
            font-size: 10.5px;
            font-weight: 700;
            letter-spacing: 0.12em;
            text-transform: uppercase;
            color: rgba(255, 255, 255, 0.28);
            padding: 0 10px;
            margin-bottom: 7px;
        }

        .nav-item {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 11px 13px;
            border-radius: var(--radius-sm);
            color: rgba(255, 255, 255, 0.58);
            text-decoration: none;
            font-size: 14.5px;
            font-weight: 500;
            transition: all 0.18s;
            margin-bottom: 2px;
            position: relative;
        }

        .nav-item:hover {
            background: rgba(255, 255, 255, 0.07);
            color: rgba(255, 255, 255, 0.92);
        }

        .nav-item.active {
            background: rgba(163, 230, 53, 0.14);
            color: var(--lime);
        }

        .nav-item.active::before {
            content: '';
            position: absolute;
            left: 0;
            top: 22%;
            bottom: 22%;
            width: 3px;
            background: var(--lime);
            border-radius: 0 3px 3px 0;
        }

        .sidebar-divider {
            height: 1px;
            background: rgba(255, 255, 255, 0.07);
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
            color: rgba(255, 255, 255, 0.42);
            font-size: 14.5px;
            font-weight: 500;
            font-family: 'Plus Jakarta Sans', sans-serif;
            transition: all 0.18s;
            text-align: left;
        }

        .btn-logout-nav:hover {
            background: rgba(239, 68, 68, 0.15);
            color: #fca5a5;
        }

        /* ─── MAIN ─── */
        .main {
            margin-left: var(--sidebar-w);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            position: relative;
            z-index: 1;
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

        .page-sub {
            font-size: 12px;
            color: var(--text-muted);
            margin-top: 1px;
        }

        .topbar-right {
            display: flex;
            align-items: center;
            gap: 12px;
        }

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
            width: 30px;
            height: 30px;
            background: linear-gradient(135deg, var(--forest-mid), var(--green));
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 12px;
            font-weight: 700;
        }

        .user-name {
            font-size: 13.5px;
            font-weight: 600;
            color: var(--text);
        }

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

        .btn-logout-top:hover {
            background: #dc2626;
            color: white;
            border-color: #dc2626;
        }

        /* ─── CONTENT ─── */
        .content {
            padding: 28px 32px;
            flex: 1;
        }

        /* ─── PAGE HEADER ─── */
        .page-header {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            margin-bottom: 24px;
            gap: 16px;
        }

        .page-header h1 {
            font-family: 'Playfair Display', serif;
            font-size: 28px;
            font-weight: 700;
            color: var(--forest);
        }

        .page-header p {
            font-size: 13.5px;
            color: var(--text-muted);
            margin-top: 4px;
        }

        /* ─── ALERT ─── */
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
            background: var(--green-light);
            border: 1px solid #6ee7b7;
            color: #065f46;
        }

        .alert-error {
            background: #fee2e2;
            border: 1px solid #fca5a5;
            color: #991b1b;
        }

        /* ─── STATS ROW ─── */
        .stats-row {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(160px, 1fr));
            gap: 14px;
            margin-bottom: 24px;
        }

        .stat-card {
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: var(--radius);
            padding: 16px 18px;
            box-shadow: var(--shadow-sm);
            display: flex;
            align-items: flex-start;
            gap: 12px;
        }

        .stat-icon {
            width: 40px;
            height: 40px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .ic-green {
            background: #d1fae5;
            color: #059669;
        }

        .ic-amber {
            background: #fef3c7;
            color: #d97706;
        }

        .ic-blue {
            background: #dbeafe;
            color: #2563eb;
        }

        .ic-rose {
            background: #ffe4e6;
            color: #e11d48;
        }

        .stat-label {
            font-size: 11.5px;
            color: var(--text-muted);
            margin-bottom: 2px;
            font-weight: 500;
        }

        .stat-value {
            font-family: 'Playfair Display', serif;
            font-size: 24px;
            font-weight: 700;
            color: var(--forest);
            line-height: 1;
        }

        /* ─── TOOLBAR ─── */
        .toolbar {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 16px;
            flex-wrap: wrap;
        }

        .search-wrap {
            position: relative;
            flex: 1;
            min-width: 200px;
        }

        .search-wrap svg {
            position: absolute;
            left: 12px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--text-muted);
            pointer-events: none;
        }

        .search-input {
            width: 100%;
            padding: 9px 12px 9px 38px;
            border: 1px solid var(--border);
            border-radius: var(--radius-sm);
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-size: 14px;
            background: var(--surface);
            color: var(--text);
            transition: border-color 0.15s, box-shadow 0.15s;
        }

        .search-input:focus {
            outline: none;
            border-color: var(--green);
            box-shadow: 0 0 0 3px rgba(61, 153, 112, 0.10);
        }

        .filter-select {
            padding: 9px 14px;
            border: 1px solid var(--border);
            border-radius: var(--radius-sm);
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-size: 14px;
            background: var(--surface);
            color: var(--text);
            cursor: pointer;
            transition: border-color 0.15s;
        }

        .filter-select:focus {
            outline: none;
            border-color: var(--green);
        }

        /* ─── TABLE CARD ─── */
        .table-card {
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: var(--radius);
            box-shadow: var(--shadow-sm);
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
            color: var(--text-muted);
            padding: 12px 16px;
            background: var(--sand);
            border-bottom: 1px solid var(--border);
            text-align: left;
            white-space: nowrap;
        }

        tbody td {
            padding: 13px 16px;
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
            background: #faf8f5;
        }

        /* ─── USER CELL ─── */
        .user-cell {
            display: flex;
            align-items: center;
            gap: 11px;
        }

        .avatar-sm {
            width: 34px;
            height: 34px;
            border-radius: 50%;
            flex-shrink: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 12px;
            font-weight: 700;
            color: white;
            background: linear-gradient(135deg, var(--forest-mid), var(--green));
        }

        .user-name-text {
            font-weight: 600;
            font-size: 13.5px;
            color: var(--forest);
        }

        .user-email {
            font-size: 11.5px;
            color: var(--text-muted);
            margin-top: 1px;
        }

        /* ─── BOOK CELL ─── */
        .book-cell {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .book-cover {
            width: 32px;
            height: 44px;
            border-radius: 4px;
            flex-shrink: 0;
            background: linear-gradient(145deg, var(--forest), var(--forest-soft));
            display: flex;
            align-items: center;
            justify-content: center;
            color: rgba(163, 230, 53, 0.6);
        }

        .book-title {
            font-weight: 600;
            font-size: 13.5px;
            color: var(--forest);
            line-height: 1.3;
        }

        .book-author {
            font-size: 11.5px;
            color: var(--text-muted);
            margin-top: 2px;
        }

        /* ─── DATE CELL ─── */
        .date-text {
            font-size: 13px;
            color: var(--text);
        }

        .date-sub {
            font-size: 11px;
            color: var(--text-muted);
            margin-top: 2px;
        }

        /* ─── BADGE ─── */
        .badge {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            padding: 4px 10px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            white-space: nowrap;
        }

        .badge-pending {
            background: #fef9c3;
            color: #854d0e;
        }

        .badge-approved {
            background: var(--green-light);
            color: #065f46;
        }

        .badge-rejected {
            background: #fee2e2;
            color: #991b1b;
        }

        .badge-returned {
            background: #e0f2fe;
            color: #0369a1;
        }

        /* ─── AKSI ─── */
        .aksi-cell {
            display: flex;
            align-items: center;
            gap: 6px;
            flex-wrap: wrap;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 6px 13px;
            border-radius: var(--radius-sm);
            font-size: 13px;
            font-weight: 600;
            font-family: 'Plus Jakarta Sans', sans-serif;
            text-decoration: none;
            cursor: pointer;
            border: none;
            transition: all 0.15s;
            white-space: nowrap;
        }

        .btn-approve {
            background: var(--green-light);
            color: #065f46;
            border: 1px solid #6ee7b7;
        }

        .btn-approve:hover {
            background: var(--green);
            color: white;
            border-color: var(--green);
        }

        .btn-reject {
            background: #fff1f2;
            color: #dc2626;
            border: 1px solid #fecaca;
        }

        .btn-reject:hover {
            background: #dc2626;
            color: white;
            border-color: #dc2626;
        }

        .btn-detail {
            background: var(--sand);
            color: var(--forest);
            border: 1px solid var(--border);
        }

        .btn-detail:hover {
            background: var(--sand-2);
            border-color: var(--green);
            color: var(--forest);
        }

        .btn-sm {
            padding: 5px 11px;
            font-size: 12px;
        }

        .btn-green {
            background: var(--green);
            color: white;
            box-shadow: 0 2px 8px rgba(61, 153, 112, 0.28);
        }

        .btn-green:hover {
            background: var(--green-2);
        }

        /* ─── DENDA TAG ─── */
        .denda-tag {
            display: inline-flex;
            align-items: center;
            gap: 4px;
            background: #fff7ed;
            border: 1px solid #fed7aa;
            color: #c2410c;
            font-size: 11.5px;
            font-weight: 600;
            padding: 3px 8px;
            border-radius: 6px;
        }

        /* ─── EMPTY ─── */
        .empty-state {
            padding: 56px;
            text-align: center;
            color: var(--text-muted);
        }

        .empty-icon {
            width: 60px;
            height: 60px;
            background: var(--sand);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 14px;
            color: var(--text-muted);
        }

        .empty-state h3 {
            font-family: 'Playfair Display', serif;
            font-size: 17px;
            color: var(--forest);
            margin-bottom: 6px;
        }

        .empty-state p {
            font-size: 13.5px;
        }

        /* ─── PAGINATION ─── */
        .pagination-wrap {
            padding: 14px 18px;
            border-top: 1px solid var(--border);
            background: var(--sand);
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 10px;
        }

        .pagination-info {
            font-size: 13px;
            color: var(--text-muted);
        }

        /* ─── RESPONSIVE ─── */
        @media (max-width: 900px) {
            :root {
                --sidebar-w: 68px;
            }

            .brand-name,
            .brand-sub,
            .nav-label,
            .nav-text {
                display: none;
            }

            .sidebar-brand {
                justify-content: center;
                padding: 22px 12px 20px;
            }

            .nav-item {
                justify-content: center;
                padding: 11px;
            }

            .nav-item.active::before {
                display: none;
            }

            .btn-logout-nav {
                justify-content: center;
                padding: 11px;
            }

            .topbar,
            .content {
                padding-left: 18px;
                padding-right: 18px;
            }
        }

        @media (max-width: 640px) {
            .stats-row {
                grid-template-columns: repeat(2, 1fr);
            }

            .page-header {
                flex-direction: column;
            }
        }
    </style>
</head>

<body>

    {{-- ─── SIDEBAR ─── --}}
    <aside class="sidebar">
        <div class="sidebar-brand">
            <div class="brand-icon">
                <i data-lucide="book-open" width="20" height="20"></i>
            </div>
            <div>
                <div class="brand-name">Aksara</div>
                <div class="brand-sub">Perpustakaan Digital</div>
            </div>
        </div>

        <div class="nav-section">
            <div class="nav-label">Menu Utama</div>
            <a href="{{ route('admin.dashboard') }}" class="nav-item">
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
            <a href="{{ route('admin.pengembalian.index') }}" class="nav-item active">
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
            <a href="{{ route('profile.index') }}" class="nav-item">
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
                <div class="page-title">Pengajuan Pengembalian</div>
                <div class="page-sub">Konfirmasi pengembalian buku dari anggota</div>
            </div>
            <div class="topbar-right">
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

            {{-- Page Header --}}
            <div class="page-header">
                <div>
                    <h1>Daftar Pengajuan Pengembalian</h1>
                    <p>Tinjau dan proses setiap pengajuan pengembalian buku dari anggota.</p>
                </div>
            </div>

            {{-- Stats --}}
            <div class="stats-row">
                <div class="stat-card">
                    <div class="stat-icon ic-amber">
                        <i data-lucide="clock" width="18" height="18"></i>
                    </div>
                    <div>
                        <div class="stat-label">Menunggu Konfirmasi</div>
                        <div class="stat-value">{{ $pengembalian->where('return_status', 'pending')->count() }}</div>
                    </div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon ic-green">
                        <i data-lucide="check-circle" width="18" height="18"></i>
                    </div>
                    <div>
                        <div class="stat-label">Dikonfirmasi</div>
                        <div class="stat-value">{{ $pengembalian->where('return_status', 'approved')->count() }}</div>
                    </div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon ic-rose">
                        <i data-lucide="alert-circle" width="18" height="18"></i>
                    </div>
                    <div>
                        <div class="stat-label">Ada Denda</div>
                        <div class="stat-value">{{ $pengembalian->where('total_denda', '>', 0)->count() }}</div>
                    </div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon ic-blue">
                        <i data-lucide="book-open" width="18" height="18"></i>
                    </div>
                    <div>
                        <div class="stat-label">Total Pengajuan</div>
                        <div class="stat-value">{{ $pengembalian->total() }}</div>
                    </div>
                </div>
            </div>

            {{-- Alerts --}}
            @if (session('success'))
                <div class="alert alert-success">
                    <i data-lucide="check-circle" width="16" height="16"></i>
                    {{ session('success') }}
                </div>
            @endif
            @if (session('error'))
                <div class="alert alert-error">
                    <i data-lucide="circle-x" width="16" height="16"></i>
                    {{ session('error') }}
                </div>
            @endif

            {{-- Toolbar --}}
            <div class="toolbar">
                <div class="search-wrap">
                    <i data-lucide="search" width="15" height="15"></i>
                    <input type="text" class="search-input" placeholder="Cari nama anggota atau judul buku...">
                </div>
                <select class="filter-select">
                    <option value="">Semua Status</option>
                    <option value="pending">Menunggu</option>
                    <option value="approved">Dikonfirmasi</option>
                    <option value="rejected">Ditolak</option>
                </select>
            </div>

            {{-- Table --}}
            <div class="table-card">
                <table>
                    <thead>
                        <tr>
                            <th>Anggota</th>
                            <th>Buku</th>
                            <th>Tgl Pinjam</th>
                            <th>Tgl Kembali</th>
                            <th>Denda</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($pengembalian as $item)
                            <tr>
                                {{-- Anggota --}}
                                <td>
                                    <div class="user-cell">
                                        <div class="avatar-sm">
                                            {{ strtoupper(substr($item->peminjaman->user->name ?? '?', 0, 1)) }}
                                        </div>
                                        <div>
                                            <div class="user-name-text">{{ $item->peminjaman->user->name ?? '-' }}
                                            </div>
                                            <div class="user-email">{{ $item->peminjaman->user->email ?? '-' }}</div>
                                        </div>
                                    </div>
                                </td>

                                {{-- Buku --}}
                                <td>
                                    <div class="book-cell">
                                        <div class="book-cover">
                                            <i data-lucide="book" width="14" height="14"></i>
                                        </div>
                                        <div>
                                            <div class="book-title">{{ $item->peminjaman->buku->judul ?? '-' }}</div>
                                            <div class="book-author">{{ $item->peminjaman->buku->pengarang ?? '-' }}
                                            </div>
                                        </div>
                                    </div>
                                </td>

                                {{-- Tgl Pinjam --}}
                                <td>
                                    <div class="date-text">
                                        {{ $item->peminjaman?->tanggal_pinjam?->format('d M Y') ?? '-' }}</div>
                                </td>

                                {{-- Tgl Kembali --}}
                                <td>
                                    <div class="date-text">
                                        {{ $item->tanggal_kembali?->format('d M Y') ?? '-' }}</div>
                                    @if (
                                        $item->peminjaman?->tanggal_jatuh_tempo &&
                                            $item->tanggal_kembali &&
                                            $item->tanggal_kembali->gt($item->peminjaman->tanggal_jatuh_tempo))
                                        <div class="date-sub" style="color:#dc2626;">Terlambat</div>
                                    @endif
                                </td>

                                {{-- Denda --}}
                                <td>
                                    @if ($item->denda > 0)
                                        <span class="denda-tag">
                                            <i data-lucide="alert-triangle" width="11" height="11"></i>
                                            Rp {{ number_format($item->denda, 0, ',', '.') }}
                                        </span>
                                    @else
                                        <span style="color:var(--border); font-size:13px;">–</span>
                                    @endif
                                </td>

                                {{-- Status --}}
                                <td>
                                    @php
                                        $statusMap = [
                                            'pending' => [
                                                'class' => 'badge-pending',
                                                'icon' => 'clock',
                                                'label' => 'Menunggu',
                                            ],
                                            'approved' => [
                                                'class' => 'badge-approved',
                                                'icon' => 'check-circle',
                                                'label' => 'Dikonfirmasi',
                                            ],
                                            'rejected' => [
                                                'class' => 'badge-rejected',
                                                'icon' => 'x-circle',
                                                'label' => 'Ditolak',
                                            ],
                                            'returned' => [
                                                'class' => 'badge-returned',
                                                'icon' => 'corner-down-left',
                                                'label' => 'Dikembalikan',
                                            ],
                                        ];
                                        $s = $statusMap[$item->status] ?? [
                                            'class' => 'badge-pending',
                                            'icon' => 'minus',
                                            'label' => ucfirst($item->status),
                                        ];
                                    @endphp
                                    <span class="badge {{ $s['class'] }}">
                                        <i data-lucide="{{ $s['icon'] }}" width="11" height="11"></i>
                                        {{ $s['label'] }}
                                    </span>
                                </td>

                                {{-- Aksi --}}
                                <td>
                                    <div class="aksi-cell">
                                        @if ($item->status === 'pending')
                                            <form action="{{ route('admin.pengembalian.approve', $item) }}"
                                                method="POST">
                                                @csrf @method('PATCH')
                                                <button type="submit" class="btn btn-approve btn-sm"
                                                    onclick="return confirm('Konfirmasi pengembalian buku ini?')">
                                                    <i data-lucide="check" width="12" height="12"></i>
                                                    Konfirmasi
                                                </button>
                                            </form>
                                            <form action="{{ route('admin.pengembalian.reject', $item) }}"
                                                method="POST">
                                                @csrf @method('PATCH')
                                                <button type="submit" class="btn btn-reject btn-sm"
                                                    onclick="return confirm('Tolak pengajuan pengembalian ini?')">
                                                    <i data-lucide="x" width="12" height="12"></i>
                                                    Tolak
                                                </button>
                                            </form>
                                        @else
                                            <a href="{{ route('admin.pengembalian.tinjau', $item) }}"
                                                class="btn btn-detail btn-sm">
                                                <i data-lucide="eye" width="12" height="12"></i>
                                                Detail
                                            </a>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7">
                                    <div class="empty-state">
                                        <div class="empty-icon">
                                            <i data-lucide="book-check" width="26" height="26"></i>
                                        </div>
                                        <h3>Belum ada pengajuan</h3>
                                        <p>Saat ini belum ada pengajuan pengembalian buku dari anggota.</p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                @if ($pengembalian->hasPages())
                    <div class="pagination-wrap">
                        <span class="pagination-info">
                            Menampilkan {{ $pengembalian->firstItem() }}–{{ $pengembalian->lastItem() }} dari
                            {{ $pengembalian->total() }} pengajuan
                        </span>
                        {{ $pengembalian->links() }}
                    </div>
                @endif
            </div>

        </main>
    </div>

    <script>
        lucide.createIcons();
    </script>

    <script>
        // Client-side search filter
        const searchInput = document.querySelector('.search-input');
        const filterSelect = document.querySelector('.filter-select');
        const rows = document.querySelectorAll('tbody tr');

        function filterTable() {
            const query = searchInput.value.toLowerCase();
            const status = filterSelect.value.toLowerCase();

            rows.forEach(row => {
                if (row.querySelector('.empty-state')) return;
                const text = row.textContent.toLowerCase();
                const badge = row.querySelector('.badge');
                const rowStatus = badge ? badge.textContent.trim().toLowerCase() : '';

                const matchSearch = !query || text.includes(query);
                const matchStatus = !status || rowStatus.includes(status === 'pending' ? 'menunggu' : status ===
                    'approved' ? 'dikonfirmasi' : status === 'rejected' ? 'ditolak' : status);

                row.style.display = (matchSearch && matchStatus) ? '' : 'none';
            });
        }

        searchInput.addEventListener('input', filterTable);
        filterSelect.addEventListener('change', filterTable);
    </script>
</body>

</html>
