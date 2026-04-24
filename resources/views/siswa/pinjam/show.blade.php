<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Buku - Aksara</title>
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

        /* ── MAIN ── */
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
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            max-width: 200px;
        }

        .topbar-right {
            display: flex;
            align-items: center;
            gap: 10px;
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

        /* ── DETAIL LAYOUT ── */
        .detail-grid {
            display: grid;
            grid-template-columns: 240px 1fr;
            gap: 24px;
            align-items: start;
        }

        /* ── COVER COLUMN ── */
        .cover-col {
            display: flex;
            flex-direction: column;
            gap: 16px;
        }

        .book-cover-card {
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: var(--radius-xl);
            overflow: hidden;
            box-shadow: 0 8px 28px rgba(15, 28, 20, 0.10);
        }

        .cover-img-wrap {
            aspect-ratio: 2/3;
            background: var(--cream-dark);
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }

        .cover-img-wrap img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .cover-no-image {
            width: 100%;
            height: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: 10px;
            color: var(--text-soft);
        }

        .cover-no-image span {
            font-size: 12px;
        }

        .cover-meta {
            padding: 14px 16px;
            border-top: 1px solid var(--border);
        }

        .cover-meta-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            font-size: 12px;
            color: var(--text-soft);
            margin-bottom: 6px;
        }

        .cover-meta-row:last-child {
            margin-bottom: 0;
        }

        .cover-meta-val {
            font-weight: 600;
            color: var(--text);
        }

        /* Stok card */
        .stok-card {
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: var(--radius-lg);
            padding: 16px 18px;
        }

        .stok-card-label {
            font-size: 11.5px;
            color: var(--text-soft);
            margin-bottom: 6px;
            text-transform: uppercase;
            letter-spacing: 0.06em;
            font-weight: 600;
        }

        .stok-card-num {
            font-family: 'Lora', serif;
            font-size: 36px;
            font-weight: 600;
            line-height: 1;
            margin-bottom: 4px;
        }

        .stok-ok {
            color: #16a34a;
        }

        .stok-low {
            color: #d97706;
        }

        .stok-empty {
            color: #dc2626;
        }

        .stok-card-sub {
            font-size: 12px;
            color: var(--text-soft);
        }

        /* ── INFO COLUMN ── */
        .info-col {
            display: flex;
            flex-direction: column;
            gap: 18px;
        }

        /* Book title section */
        .book-title-section {
            background: var(--ink);
            border-radius: var(--radius-xl);
            padding: 28px 30px;
            position: relative;
            overflow: hidden;
        }

        .book-title-section::before {
            content: '';
            position: absolute;
            top: -50px;
            right: -50px;
            width: 200px;
            height: 200px;
            background: radial-gradient(circle, rgba(181, 232, 83, 0.14) 0%, transparent 65%);
        }

        .book-title-section::after {
            content: '';
            position: absolute;
            bottom: -30px;
            left: 20%;
            width: 160px;
            height: 160px;
            background: radial-gradient(circle, rgba(90, 138, 106, 0.12) 0%, transparent 70%);
        }

        .title-tag {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: rgba(181, 232, 83, 0.15);
            border: 1px solid rgba(181, 232, 83, 0.25);
            color: var(--lime-pop);
            font-size: 11px;
            font-weight: 600;
            padding: 3px 11px;
            border-radius: 20px;
            margin-bottom: 12px;
            position: relative;
            z-index: 1;
        }

        .book-main-title {
            font-family: 'Lora', serif;
            color: white;
            font-size: 24px;
            font-weight: 600;
            line-height: 1.35;
            margin-bottom: 6px;
            position: relative;
            z-index: 1;
        }

        .book-main-author {
            font-size: 14px;
            color: rgba(255, 255, 255, 0.55);
            position: relative;
            z-index: 1;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        /* Info cards */
        .card {
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: var(--radius-lg);
            overflow: hidden;
        }

        .card-head {
            padding: 14px 20px;
            border-bottom: 1px solid var(--border);
            background: var(--cream);
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .card-head-title {
            font-family: 'Lora', serif;
            font-size: 14px;
            font-weight: 600;
            color: var(--ink);
        }

        .card-body {
            padding: 20px;
        }

        /* Info rows */
        .info-rows {
            display: flex;
            flex-direction: column;
            gap: 0;
        }

        .info-row {
            display: flex;
            align-items: flex-start;
            gap: 0;
            padding: 11px 0;
            border-bottom: 1px solid var(--border);
        }

        .info-row:last-child {
            border-bottom: none;
            padding-bottom: 0;
        }

        .info-row:first-child {
            padding-top: 0;
        }

        .info-key {
            width: 140px;
            flex-shrink: 0;
            font-size: 12.5px;
            font-weight: 600;
            color: var(--text-soft);
            display: flex;
            align-items: center;
            gap: 7px;
            padding-top: 1px;
        }

        .info-val {
            flex: 1;
            font-size: 14px;
            color: var(--text);
            font-weight: 500;
            line-height: 1.5;
        }

        /* Badge */
        .badge {
            display: inline-flex;
            align-items: center;
            gap: 4px;
            padding: 3px 10px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
        }

        .badge-green {
            background: var(--mint);
            color: #166534;
        }

        .badge-amber {
            background: #fef3c7;
            color: #92400e;
        }

        .badge-red {
            background: #fee2e2;
            color: #991b1b;
        }

        .badge-blue {
            background: #dbeafe;
            color: #1d4ed8;
        }

        /* ISBN mono */
        .isbn-mono {
            font-family: monospace;
            background: var(--cream-dark);
            padding: 2px 8px;
            border-radius: 5px;
            font-size: 13px;
            color: var(--text-soft);
        }

        /* Deskripsi */
        .deskripsi-text {
            font-size: 14px;
            color: var(--text-soft);
            line-height: 1.75;
        }

        /* CTA section */
        .cta-section {
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        .btn-pinjam {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 9px;
            background: var(--lime-pop);
            color: var(--ink);
            font-size: 15px;
            font-weight: 700;
            padding: 14px 28px;
            border-radius: var(--radius-lg);
            text-decoration: none;
            font-family: 'Sora', sans-serif;
            transition: all 0.18s;
            box-shadow: 0 4px 16px rgba(181, 232, 83, 0.35);
        }

        .btn-pinjam:hover {
            background: #a8db46;
            transform: translateY(-2px);
            box-shadow: 0 8px 24px rgba(181, 232, 83, 0.45);
        }

        .unavailable-box {
            display: flex;
            align-items: center;
            gap: 12px;
            background: #fff1f2;
            border: 1.5px solid #fecaca;
            border-radius: var(--radius-lg);
            padding: 14px 18px;
            color: #991b1b;
            font-size: 14px;
            font-weight: 500;
        }

        .btn-back {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            background: none;
            border: 1.5px solid var(--border);
            color: var(--text-soft);
            font-size: 13.5px;
            font-weight: 600;
            padding: 10px 18px;
            border-radius: var(--radius-lg);
            text-decoration: none;
            font-family: 'Sora', sans-serif;
            transition: all 0.15s;
        }

        .btn-back:hover {
            border-color: var(--sage);
            color: var(--sage);
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

            .detail-grid {
                grid-template-columns: 1fr;
            }

            .cover-col {
                flex-direction: row;
                flex-wrap: wrap;
                gap: 14px;
            }

            .book-cover-card {
                max-width: 200px;
            }

            .stok-card {
                flex: 1;
            }
        }
    </style>
</head>

<body>

    {{-- ── SIDEBAR ── --}}
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


    {{-- ── MAIN ── --}}
    <div class="main">

        <header class="topbar">
            <div class="topbar-breadcrumb">
                <a href="{{ route('siswa.dashboard') }}" class="breadcrumb-link">
                    <i data-lucide="layout-dashboard" width="13" height="13"></i>
                    Dashboard
                </a>
                <span class="breadcrumb-sep">/</span>
                <a href="{{ route('siswa.buku.index') }}" class="breadcrumb-link">Katalog</a>
                <span class="breadcrumb-sep">/</span>
                <span class="breadcrumb-current">{{ $book->judul }}</span>
            </div>
            <div class="topbar-right">
                <div class="user-chip">
                    <div class="chip-avatar">{{ strtoupper(substr(Auth::user()->name, 0, 1)) }}</div>
                    <span class="chip-name">{{ Auth::user()->name }}</span>
                </div>
            </div>
        </header>

        <main class="content">
            <div class="detail-grid">

                {{-- ── KOLOM KIRI: Cover + Stok ── --}}
                <div class="cover-col">

                    <div class="book-cover-card">
                        <div class="cover-img-wrap">
                            @if ($book->cover)
                                <img src="{{ Storage::url($book->cover) }}" alt="{{ $book->judul }}">
                            @else
                                <div class="cover-no-image">
                                    <i data-lucide="book" width="40" height="40"></i>
                                    <span>Tidak ada cover</span>
                                </div>
                            @endif
                        </div>
                        <div class="cover-meta">
                            @if ($book->tahun_terbit)
                                <div class="cover-meta-row">
                                    <span>Tahun</span>
                                    <span class="cover-meta-val">{{ $book->tahun_terbit }}</span>
                                </div>
                            @endif
                            @if ($book->kode_rak)
                                <div class="cover-meta-row">
                                    <span>Kode Rak</span>
                                    <span class="cover-meta-val">{{ $book->kode_rak }}</span>
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="stok-card">
                        <div class="stok-card-label">Stok Tersedia</div>
                        @php
                            $stokClass =
                                $book->total_stok > 3 ? 'stok-ok' : ($book->total_stok > 0 ? 'stok-low' : 'stok-empty');
                            $stokLabel =
                                $book->total_stok > 3
                                    ? 'Banyak tersedia'
                                    : ($book->total_stok > 0
                                        ? 'Hampir habis'
                                        : 'Stok habis');
                        @endphp
                        <div class="stok-card-num {{ $stokClass }}">{{ $book->total_stok }}</div>
                        <div class="stok-card-sub">{{ $stokLabel }}</div>
                    </div>

                </div>

                {{-- ── KOLOM KANAN: Info ── --}}
                <div class="info-col">

                    {{-- Title Hero --}}
                    <div class="book-title-section">
                        @if ($book->kategori)
                            <div class="title-tag">
                                <i data-lucide="tag" width="11" height="11"></i>
                                {{ $book->kategori }}
                            </div>
                        @endif
                        <div class="book-main-title">{{ $book->judul }}</div>
                        <div class="book-main-author">
                            <i data-lucide="user" width="13" height="13"></i>
                            {{ $book->pengarang }}
                            @if ($book->penerbit)
                                &nbsp;·&nbsp; {{ $book->penerbit }}
                            @endif
                        </div>
                    </div>

                    {{-- Info Detail --}}
                    <div class="card">
                        <div class="card-head">
                            <i data-lucide="info" width="15" height="15" style="color:var(--sage)"></i>
                            <span class="card-head-title">Informasi Buku</span>
                        </div>
                        <div class="card-body">
                            <div class="info-rows">
                                <div class="info-row">
                                    <div class="info-key">
                                        <i data-lucide="barcode" width="14" height="14"></i> ISBN
                                    </div>
                                    <div class="info-val">
                                        @if ($book->isbn)
                                            <span class="isbn-mono">{{ $book->isbn }}</span>
                                        @else
                                            –
                                        @endif
                                    </div>
                                </div>
                                <div class="info-row">
                                    <div class="info-key">
                                        <i data-lucide="building-2" width="14" height="14"></i> Penerbit
                                    </div>
                                    <div class="info-val">{{ $book->penerbit ?? '–' }}</div>
                                </div>
                                <div class="info-row">
                                    <div class="info-key">
                                        <i data-lucide="calendar" width="14" height="14"></i> Tahun Terbit
                                    </div>
                                    <div class="info-val">{{ $book->tahun_terbit ?? '–' }}</div>
                                </div>
                                <div class="info-row">
                                    <div class="info-key">
                                        <i data-lucide="map-pin" width="14" height="14"></i> Kode Rak
                                    </div>
                                    <div class="info-val">{{ $book->kode_rak ?? '–' }}</div>
                                </div>
                                <div class="info-row">
                                    <div class="info-key">
                                        <i data-lucide="shield-check" width="14" height="14"></i> Kondisi
                                    </div>
                                    <div class="info-val">
                                        @php
                                            $kondisi = strtolower($book->kondisi ?? '');
                                            $badgeKondisi = match ($kondisi) {
                                                'baik' => 'badge-green',
                                                'cukup baik' => 'badge-amber',
                                                'rusak' => 'badge-red',
                                                default => 'badge-blue',
                                            };
                                        @endphp
                                        <span
                                            class="badge {{ $badgeKondisi }}">{{ ucfirst($book->kondisi ?? '–') }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Deskripsi --}}
                    @if ($book->deskripsi)
                        <div class="card">
                            <div class="card-head">
                                <i data-lucide="align-left" width="15" height="15"
                                    style="color:var(--sage)"></i>
                                <span class="card-head-title">Deskripsi</span>
                            </div>
                            <div class="card-body">
                                <p class="deskripsi-text">{{ $book->deskripsi }}</p>
                            </div>
                        </div>
                    @endif

                    {{-- CTA --}}
                    <div class="cta-section">
                        @if ($book->kondisi == 'baik' && $book->total_stok > 0)
                            <a href="{{ route('pinjam.form', $book->id) }}" class="btn-pinjam">
                                <i data-lucide="book-plus" width="18" height="18"></i>
                                Pinjam Buku Ini
                            </a>
                        @else
                            <div class="unavailable-box">
                                <i data-lucide="circle-x" width="20" height="20" style="flex-shrink:0"></i>
                                <span>Buku ini sedang tidak tersedia untuk dipinjam.</span>
                            </div>
                        @endif
                        <a href="{{ route('siswa.buku.index') }}" class="btn-back">
                            <i data-lucide="arrow-left" width="14" height="14"></i>
                            Kembali ke Katalog
                        </a>
                    </div>

                </div>
            </div>
        </main>
    </div>

    <script>
        lucide.createIcons();
    </script>
</body>

</html>
