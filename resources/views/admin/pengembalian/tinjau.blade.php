<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tinjau Pengembalian - Aksara</title>
    <link
        href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700&family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap"
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
            transition: all 0.18s ease;
            margin-bottom: 2px;
            position: relative;
            cursor: pointer;
        }

        .nav-item svg {
            flex-shrink: 0;
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

        .role-badge {
            font-size: 12px;
            font-weight: 600;
            padding: 4px 12px;
            border-radius: 20px;
        }

        .role-admin {
            background: #fef9c3;
            color: #854d0e;
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

        /* ─── BREADCRUMB ─── */
        .breadcrumb {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 13px;
            color: var(--text-muted);
            margin-bottom: 22px;
        }

        .breadcrumb a {
            color: var(--text-muted);
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 5px;
            transition: color 0.15s;
        }

        .breadcrumb a:hover {
            color: var(--green);
        }

        .breadcrumb-sep {
            color: var(--border);
            display: flex;
            align-items: center;
        }

        .breadcrumb-current {
            color: var(--forest);
            font-weight: 600;
        }

        /* ─── TWO-COL LAYOUT ─── */
        .grid-layout {
            display: grid;
            grid-template-columns: 1fr 380px;
            gap: 20px;
            align-items: start;
        }

        /* ─── CARD ─── */
        .card {
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: var(--radius);
            box-shadow: var(--shadow-sm);
            overflow: hidden;
            margin-bottom: 20px;
        }

        .card:last-child {
            margin-bottom: 0;
        }

        .card-header {
            padding: 16px 22px;
            border-bottom: 1px solid var(--border);
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .card-title {
            font-family: 'Playfair Display', serif;
            font-size: 16px;
            font-weight: 700;
            color: var(--forest);
        }

        .card-body {
            padding: 22px;
        }

        /* ─── INFO ROWS ─── */
        .info-row {
            display: flex;
            align-items: baseline;
            gap: 12px;
            padding: 10px 0;
            border-bottom: 1px solid var(--border);
        }

        .info-row:first-child {
            padding-top: 0;
        }

        .info-row:last-child {
            border-bottom: none;
            padding-bottom: 0;
        }

        .info-label {
            font-size: 12px;
            color: var(--text-muted);
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            min-width: 160px;
            flex-shrink: 0;
        }

        .info-value {
            font-size: 14px;
            color: var(--text);
            font-weight: 500;
        }

        .info-value.bold {
            font-weight: 700;
            color: var(--forest);
        }

        .info-value.danger {
            color: #dc2626;
            font-weight: 700;
        }

        /* ─── DENDA BADGE ─── */
        .denda-box {
            background: #fff7ed;
            border: 1px solid #fed7aa;
            border-radius: var(--radius-sm);
            padding: 14px 18px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-top: 4px;
        }

        .denda-label {
            font-size: 13px;
            color: #9a3412;
            font-weight: 500;
        }

        .denda-amount {
            font-family: 'Playfair Display', serif;
            font-size: 22px;
            font-weight: 700;
            color: #c2410c;
        }

        /* ─── ALASAN BOX ─── */
        .alasan-box {
            background: var(--sand);
            border: 1px solid var(--border);
            border-radius: var(--radius-sm);
            padding: 14px 16px;
            font-size: 13.5px;
            color: var(--text-muted);
            line-height: 1.65;
            font-style: italic;
        }

        /* ─── FORM FIELDS ─── */
        .field {
            margin-bottom: 18px;
        }

        .field:last-child {
            margin-bottom: 0;
        }

        .field label {
            display: block;
            font-size: 11.5px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.07em;
            color: var(--text-muted);
            margin-bottom: 7px;
        }

        .field label .required {
            color: #ef4444;
            margin-left: 2px;
        }

        select,
        input[type="number"],
        textarea {
            width: 100%;
            padding: 10px 14px;
            border: 1.5px solid var(--border);
            border-radius: var(--radius-sm);
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-size: 14px;
            color: var(--text);
            background: white;
            transition: border-color 0.18s, box-shadow 0.18s;
            appearance: none;
        }

        select {
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='14' height='14' viewBox='0 0 24 24' fill='none' stroke='%236b7c72' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpolyline points='6 9 12 15 18 9'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 12px center;
            padding-right: 36px;
        }

        select:focus,
        input[type="number"]:focus,
        textarea:focus {
            outline: none;
            border-color: var(--green);
            box-shadow: 0 0 0 3px rgba(61, 153, 112, 0.12);
        }

        textarea {
            resize: vertical;
            min-height: 90px;
            line-height: 1.6;
        }

        textarea::placeholder,
        input::placeholder {
            color: #b0bdb5;
        }

        /* ─── KONDISI OPTIONS ─── */
        .kondisi-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 8px;
        }

        .kondisi-opt {
            position: relative;
        }

        .kondisi-opt input[type="radio"] {
            position: absolute;
            opacity: 0;
            width: 0;
            height: 0;
        }

        .kondisi-opt label {
            display: flex;
            align-items: center;
            gap: 9px;
            padding: 10px 14px;
            border: 1.5px solid var(--border);
            border-radius: var(--radius-sm);
            cursor: pointer;
            font-size: 13px;
            font-weight: 500;
            color: var(--text-muted);
            transition: all 0.15s;
            text-transform: none;
            letter-spacing: 0;
            background: white;
            margin-bottom: 0;
        }

        .kondisi-opt input:checked+label {
            border-color: var(--green);
            background: var(--green-light);
            color: var(--forest);
        }

        .kondisi-opt label:hover {
            border-color: var(--green);
            color: var(--forest);
        }

        .kondisi-dot {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            flex-shrink: 0;
        }

        .dot-green {
            background: #16a34a;
        }

        .dot-yellow {
            background: #d97706;
        }

        .dot-red {
            background: #dc2626;
        }

        .dot-gray {
            background: #6b7280;
        }

        /* ─── BUTTONS ─── */
        .btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 11px 20px;
            border-radius: var(--radius-sm);
            font-size: 14px;
            font-weight: 600;
            font-family: 'Plus Jakarta Sans', sans-serif;
            text-decoration: none;
            cursor: pointer;
            border: none;
            transition: all 0.15s;
            width: 100%;
            justify-content: center;
        }

        .btn-approve {
            background: var(--forest);
            color: white;
            box-shadow: 0 2px 8px rgba(26, 58, 42, 0.2);
        }

        .btn-approve:hover {
            background: var(--forest-soft);
            transform: translateY(-1px);
            box-shadow: 0 4px 14px rgba(26, 58, 42, 0.28);
        }

        .btn-reject {
            background: white;
            color: #dc2626;
            border: 1.5px solid #fca5a5;
        }

        .btn-reject:hover {
            background: #dc2626;
            color: white;
            border-color: #dc2626;
        }

        .btn-divider {
            display: flex;
            align-items: center;
            gap: 10px;
            margin: 14px 0;
            color: var(--text-muted);
            font-size: 12px;
        }

        .btn-divider::before,
        .btn-divider::after {
            content: '';
            flex: 1;
            height: 1px;
            background: var(--border);
        }

        /* ─── RESPONSIVE ─── */
        @media (max-width: 1100px) {
            .grid-layout {
                grid-template-columns: 1fr;
            }
        }

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

            .content {
                padding: 20px 16px;
            }

            .topbar {
                padding: 14px 20px;
            }
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
                <div class="page-title">Tinjau Pengembalian</div>
                <div class="page-sub">Verifikasi dan setujui pengajuan pengembalian buku</div>
            </div>
            <div class="topbar-right">
                <span class="role-badge role-admin">Admin</span>
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

            {{-- Breadcrumb --}}
            <div class="breadcrumb">
                <a href="{{ route('admin.pengembalian.index') }}">
                    <i data-lucide="book-check" width="13" height="13"></i>
                    Pengajuan Pengembalian
                </a>
                <span class="breadcrumb-sep"><i data-lucide="chevron-right" width="13" height="13"></i></span>
                <span class="breadcrumb-current">Tinjau #{{ $loan->id }}</span>
            </div>

            <div class="grid-layout">

                {{-- ─── KIRI: Detail ─── --}}
                <div>

                    {{-- Info Peminjam --}}
                    <div class="card">
                        <div class="card-header">
                            <i data-lucide="user" width="16" height="16" style="color:var(--green)"></i>
                            <span class="card-title">Data Peminjam</span>
                        </div>
                        <div class="card-body">
                            <div class="info-row">
                                <span class="info-label">Nama</span>
                                <span class="info-value bold">{{ $loan->user->name }}</span>
                            </div>
                            <div class="info-row">
                                <span class="info-label">NISN</span>
                                <span class="info-value">{{ $loan->user->nisn }}</span>
                            </div>
                        </div>
                    </div>

                    {{-- Info Buku --}}
                    <div class="card">
                        <div class="card-header">
                            <i data-lucide="book-open" width="16" height="16" style="color:var(--green)"></i>
                            <span class="card-title">Detail Peminjaman</span>
                        </div>
                        <div class="card-body">
                            <div class="info-row">
                                <span class="info-label">Judul Buku</span>
                                <span class="info-value bold">{{ $loan->book->judul }}</span>
                            </div>
                            <div class="info-row">
                                <span class="info-label">Tanggal Pinjam</span>
                                <span class="info-value">{{ $loan->tanggal_pinjam }}</span>
                            </div>
                            <div class="info-row">
                                <span class="info-label">Rencana Kembali</span>
                                <span class="info-value">{{ $loan->tanggal_kembali_rencana }}</span>
                            </div>
                            <div class="info-row">
                                <span class="info-label">Denda Keterlambatan</span>
                                <span class="info-value">
                                    @if ($loan->denda_terlambat > 0)
                                        <span class="danger">Rp
                                            {{ number_format($loan->denda_terlambat, 0, ',', '.') }}</span>
                                    @else
                                        <span style="color:#16a34a;font-weight:600;">Tidak ada</span>
                                    @endif
                                </span>
                            </div>
                        </div>
                    </div>

                    {{-- Alasan Keterlambatan --}}
                    @if ($loan->alasan_keterlambatan)
                        <div class="card">
                            <div class="card-header">
                                <i data-lucide="message-square" width="16" height="16"
                                    style="color:var(--green)"></i>
                                <span class="card-title">Alasan Keterlambatan</span>
                            </div>
                            <div class="card-body">
                                <div class="alasan-box">
                                    "{{ $loan->alasan_keterlambatan }}"
                                </div>
                            </div>
                        </div>
                    @endif

                    {{-- Denda Total (jika ada) --}}
                    @if ($loan->denda_terlambat > 0)
                        <div class="card">
                            <div class="card-header">
                                <i data-lucide="receipt" width="16" height="16" style="color:#ea580c"></i>
                                <span class="card-title">Estimasi Denda</span>
                            </div>
                            <div class="card-body">
                                <div class="denda-box">
                                    <div class="denda-label">Total denda otomatis</div>
                                    <div class="denda-amount">Rp
                                        {{ number_format($loan->denda_terlambat, 0, ',', '.') }}</div>
                                </div>
                                <p style="font-size:12px;color:var(--text-muted);margin-top:10px;line-height:1.6;">
                                    Denda akhir dapat disesuaikan setelah admin menambahkan denda kerusakan buku (jika
                                    ada).
                                </p>
                            </div>
                        </div>
                    @endif

                </div>

                {{-- ─── KANAN: Aksi ─── --}}
                <div>

                    {{-- Form Setujui --}}
                    <div class="card">
                        <div class="card-header">
                            <i data-lucide="check-circle-2" width="16" height="16"
                                style="color:var(--green)"></i>
                            <span class="card-title">Setujui Pengembalian</span>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('admin.pengembalian.setujui', $loan->id) }}">
                                @csrf

                                <div class="field">
                                    <label>Kondisi Buku <span class="required">*</span></label>
                                    <div class="kondisi-grid">
                                        <div class="kondisi-opt">
                                            <input type="radio" name="kondisi_kembali" id="k_baik"
                                                value="baik" checked>
                                            <label for="k_baik">
                                                <span class="kondisi-dot dot-green"></span>
                                                Baik
                                            </label>
                                        </div>
                                        <div class="kondisi-opt">
                                            <input type="radio" name="kondisi_kembali" id="k_ringan"
                                                value="rusak_ringan">
                                            <label for="k_ringan">
                                                <span class="kondisi-dot dot-yellow"></span>
                                                Rusak Ringan
                                            </label>
                                        </div>
                                        <div class="kondisi-opt">
                                            <input type="radio" name="kondisi_kembali" id="k_berat"
                                                value="rusak_berat">
                                            <label for="k_berat">
                                                <span class="kondisi-dot dot-red"></span>
                                                Rusak Berat
                                            </label>
                                        </div>
                                        <div class="kondisi-opt">
                                            <input type="radio" name="kondisi_kembali" id="k_hilang"
                                                value="hilang">
                                            <label for="k_hilang">
                                                <span class="kondisi-dot dot-gray"></span>
                                                Hilang
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="field">
                                    <label>Denda Kerusakan (Rp)</label>
                                    <input type="number" name="denda_kerusakan" value="0" min="0"
                                        placeholder="0">
                                </div>

                                <div class="field">
                                    <label>Catatan Admin <span
                                            style="font-weight:400;text-transform:none;letter-spacing:0;font-size:11px;">(opsional)</span></label>
                                    <textarea name="catatan_admin" rows="3" placeholder="Misal: ada halaman sobek, denda kerusakan Rp..."></textarea>
                                </div>

                                <button type="submit" class="btn btn-approve">
                                    <i data-lucide="check" width="16" height="16"></i>
                                    Setujui Pengembalian
                                </button>
                            </form>

                            <div class="btn-divider">atau</div>

                            {{-- Form Tolak --}}
                            <form method="POST" action="{{ route('admin.pengembalian.tolak', $loan->id) }}">
                                @csrf
                                <div class="field">
                                    <label>Alasan Penolakan <span class="required">*</span></label>
                                    <textarea name="alasan_tolak" rows="3" placeholder="Jelaskan alasan pengajuan ditolak..." required></textarea>
                                </div>
                                <button type="submit" class="btn btn-reject">
                                    <i data-lucide="x" width="16" height="16"></i>
                                    Tolak Pengajuan
                                </button>
                            </form>

                        </div>
                    </div>

                    {{-- Kembali --}}
                    <a href="{{ route('admin.pengembalian.index') }}"
                        style="display:inline-flex;align-items:center;gap:7px;font-size:13px;color:var(--text-muted);text-decoration:none;font-weight:500;margin-top:14px;transition:color 0.15s;"
                        onmouseover="this.style.color='var(--green)'"
                        onmouseout="this.style.color='var(--text-muted)'">
                        <i data-lucide="arrow-left" width="14" height="14"></i>
                        Kembali ke daftar
                    </a>

                </div>
            </div>

        </main>
    </div>

    <script>
        lucide.createIcons();
    </script>
</body>

</html>
