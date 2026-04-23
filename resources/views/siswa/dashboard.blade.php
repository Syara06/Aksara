<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Siswa - Perpustakaan</title>
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
            --warm-white: #faf8f4;
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
            letter-spacing: 0.01em;
        }

        /* User profile in sidebar */
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

        /* Nav */
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

        .nav-badge {
            margin-left: auto;
            background: var(--lime-pop);
            color: var(--ink);
            font-size: 10px;
            font-weight: 700;
            padding: 2px 7px;
            border-radius: 20px;
            line-height: 1.4;
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

        .topbar-greeting {
            font-size: 14px;
            color: var(--text-soft);
        }

        .topbar-greeting strong {
            color: var(--text);
            font-weight: 700;
        }

        .topbar-right {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .topbar-date {
            font-size: 12px;
            color: var(--text-soft);
            background: var(--cream);
            border: 1px solid var(--border);
            padding: 5px 12px;
            border-radius: 20px;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        /* ── CONTENT ── */
        .content {
            padding: 28px 32px;
            flex: 1;
        }

        /* ── HERO CARD ── */
        .hero {
            background: var(--ink);
            border-radius: var(--radius-xl);
            padding: 32px 36px;
            margin-bottom: 24px;
            position: relative;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
        }

        .hero::before {
            content: '';
            position: absolute;
            top: -60px;
            right: -60px;
            width: 260px;
            height: 260px;
            background: radial-gradient(circle, rgba(181, 232, 83, 0.18) 0%, transparent 65%);
        }

        .hero::after {
            content: '';
            position: absolute;
            bottom: -40px;
            left: 30%;
            width: 200px;
            height: 200px;
            background: radial-gradient(circle, rgba(90, 138, 106, 0.15) 0%, transparent 70%);
        }

        .hero-left {
            position: relative;
            z-index: 1;
        }

        .hero-tag {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: rgba(181, 232, 83, 0.15);
            border: 1px solid rgba(181, 232, 83, 0.25);
            color: var(--lime-pop);
            font-size: 11.5px;
            font-weight: 600;
            padding: 4px 12px;
            border-radius: 20px;
            margin-bottom: 14px;
        }

        .hero-tag-dot {
            width: 6px;
            height: 6px;
            background: var(--lime-pop);
            border-radius: 50%;
        }

        .hero h1 {
            font-family: 'Lora', serif;
            color: white;
            font-size: 28px;
            font-weight: 600;
            line-height: 1.3;
            margin-bottom: 8px;
        }

        .hero h1 span {
            color: var(--lime-pop);
            font-style: italic;
        }

        .hero p {
            color: rgba(255, 255, 255, 0.5);
            font-size: 13.5px;
            line-height: 1.6;
        }

        .hero-right {
            position: relative;
            z-index: 1;
            flex-shrink: 0;
        }

        .hero-book-stack {
            display: flex;
            flex-direction: column;
            gap: 8px;
            align-items: flex-end;
        }

        .book-spine {
            height: 36px;
            border-radius: 6px;
            display: flex;
            align-items: center;
            padding: 0 14px;
            font-size: 11px;
            font-weight: 600;
            color: var(--ink);
            letter-spacing: 0.03em;
        }

        .bs-1 {
            width: 130px;
            background: var(--lime-pop);
        }

        .bs-2 {
            width: 110px;
            background: var(--mint);
        }

        .bs-3 {
            width: 90px;
            background: var(--sage-light);
            color: white;
        }

        /* ── STATS ── */
        .stats-row {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 14px;
            margin-bottom: 24px;
        }

        .stat-card {
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: var(--radius-lg);
            padding: 18px 20px;
            display: flex;
            align-items: center;
            gap: 14px;
            transition: transform 0.18s, box-shadow 0.18s;
        }

        .stat-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(15, 28, 20, 0.08);
        }

        .stat-icon {
            width: 44px;
            height: 44px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .si-green {
            background: var(--mint);
            color: var(--sage);
        }

        .si-amber {
            background: #fef3c7;
            color: #d97706;
        }

        .si-blue {
            background: #dbeafe;
            color: #2563eb;
        }

        .stat-num {
            font-family: 'Lora', serif;
            font-size: 28px;
            font-weight: 600;
            color: var(--ink);
            line-height: 1;
        }

        .stat-label {
            font-size: 12px;
            color: var(--text-soft);
            margin-top: 3px;
        }

        /* ── QUICK ACTIONS ── */
        .section-title {
            font-family: 'Lora', serif;
            font-size: 18px;
            font-weight: 600;
            color: var(--ink);
            margin-bottom: 14px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .section-title::after {
            content: '';
            flex: 1;
            height: 1px;
            background: var(--border);
        }

        .actions-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 14px;
            margin-bottom: 28px;
        }

        .action-card {
            background: var(--surface);
            border: 1.5px solid var(--border);
            border-radius: var(--radius-lg);
            padding: 22px 22px 20px;
            text-decoration: none;
            color: var(--text);
            display: flex;
            flex-direction: column;
            gap: 12px;
            transition: all 0.2s;
            position: relative;
            overflow: hidden;
        }

        .action-card::before {
            content: '';
            position: absolute;
            inset: 0;
            opacity: 0;
            transition: opacity 0.2s;
        }

        .action-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 28px rgba(15, 28, 20, 0.10);
        }

        .action-card.ac-pinjam:hover {
            border-color: var(--lime-pop);
        }

        .action-card.ac-pinjam:hover::before {
            background: linear-gradient(135deg, rgba(181, 232, 83, 0.06), transparent);
            opacity: 1;
        }

        .action-card.ac-kembali:hover {
            border-color: var(--sage);
        }

        .action-card.ac-kembali:hover::before {
            background: linear-gradient(135deg, rgba(90, 138, 106, 0.07), transparent);
            opacity: 1;
        }

        .action-card.ac-riwayat:hover {
            border-color: #93c5fd;
        }

        .action-card.ac-riwayat:hover::before {
            background: linear-gradient(135deg, rgba(147, 197, 253, 0.07), transparent);
            opacity: 1;
        }

        .action-card.ac-akun:hover {
            border-color: #c4b5fd;
        }

        .action-card.ac-akun:hover::before {
            background: linear-gradient(135deg, rgba(196, 181, 253, 0.07), transparent);
            opacity: 1;
        }

        .action-icon {
            width: 44px;
            height: 44px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .ai-lime {
            background: var(--cream-dark);
            color: var(--ink-soft);
        }

        .ai-sage {
            background: var(--cream-dark);
            color: var(--ink-soft);
        }

        .ai-blue {
            background: #eff6ff;
            color: #3b82f6;
        }

        .ai-purple {
            background: #f5f3ff;
            color: #7c3aed;
        }

        .action-card:hover .ai-lime {
            background: var(--lime-pop);
            color: var(--ink);
        }

        .action-card:hover .ai-sage {
            background: var(--sage);
            color: white;
        }

        .action-card:hover .ai-blue {
            background: #3b82f6;
            color: white;
        }

        .action-card:hover .ai-purple {
            background: #7c3aed;
            color: white;
        }

        .action-label {
            font-size: 15px;
            font-weight: 700;
            color: var(--ink);
        }

        .action-desc {
            font-size: 12.5px;
            color: var(--text-soft);
            line-height: 1.5;
        }

        .action-arrow {
            margin-top: auto;
            display: flex;
            align-items: center;
            gap: 5px;
            font-size: 12px;
            font-weight: 600;
            color: var(--text-soft);
            transition: gap 0.18s, color 0.18s;
        }

        .action-card:hover .action-arrow {
            gap: 9px;
            color: var(--ink);
        }

        /* ── ACTIVE LOANS ── */
        .card {
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: var(--radius-lg);
            overflow: hidden;
        }

        .card-head {
            padding: 16px 22px;
            border-bottom: 1px solid var(--border);
            display: flex;
            align-items: center;
            justify-content: space-between;
            background: var(--cream);
        }

        .card-head-title {
            font-family: 'Lora', serif;
            font-size: 15px;
            font-weight: 600;
            color: var(--ink);
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .loan-list {}

        .loan-item {
            display: flex;
            align-items: center;
            gap: 14px;
            padding: 14px 22px;
            border-bottom: 1px solid var(--border);
            transition: background 0.12s;
        }

        .loan-item:last-child {
            border-bottom: none;
        }

        .loan-item:hover {
            background: var(--cream);
        }

        .loan-cover {
            width: 38px;
            height: 50px;
            border-radius: 5px;
            flex-shrink: 0;
            background: var(--cream-dark);
            border: 1px solid var(--border);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--text-soft);
            font-size: 16px;
        }

        .loan-info {
            flex: 1;
            min-width: 0;
        }

        .loan-title {
            font-size: 14px;
            font-weight: 600;
            color: var(--ink);
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .loan-author {
            font-size: 12px;
            color: var(--text-soft);
            margin-top: 2px;
        }

        .loan-meta {
            font-size: 11.5px;
            color: var(--text-soft);
            margin-top: 5px;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .badge {
            display: inline-flex;
            align-items: center;
            gap: 4px;
            padding: 3px 9px;
            border-radius: 20px;
            font-size: 11.5px;
            font-weight: 600;
            flex-shrink: 0;
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

        .btn-sm {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 6px 12px;
            border-radius: var(--radius-sm);
            font-size: 12.5px;
            font-weight: 600;
            font-family: 'Sora', sans-serif;
            text-decoration: none;
            cursor: pointer;
            border: none;
            transition: all 0.15s;
            flex-shrink: 0;
        }

        .btn-outline {
            background: none;
            border: 1.5px solid var(--border);
            color: var(--text-soft);
        }

        .btn-outline:hover {
            border-color: var(--sage);
            color: var(--sage);
        }

        .empty-state {
            padding: 40px;
            text-align: center;
            color: var(--text-soft);
        }

        .empty-circle {
            width: 56px;
            height: 56px;
            border-radius: 50%;
            background: var(--cream-dark);
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 12px;
            color: var(--text-soft);
        }

        .empty-state p {
            font-size: 13.5px;
        }

        .empty-state a {
            color: var(--sage);
            font-weight: 600;
            text-decoration: none;
        }

        .empty-state a:hover {
            text-decoration: underline;
        }

        /* ── RESPONSIVE ── */
        @media (max-width: 900px) {
            :root {
                --sidebar-w: 64px;
            }

            .sidebar-top .sidebar-user,
            .sidebar-top .logo-text,
            .nav-item span,
            .nav-section-label,
            .nav-badge,
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

            .sidebar-footer {
                padding: 10px 8px 20px;
            }

            .topbar,
            .content {
                padding-left: 18px;
                padding-right: 18px;
            }

            .stats-row {
                grid-template-columns: 1fr 1fr;
            }
        }

        @media (max-width: 640px) {
            .actions-grid {
                grid-template-columns: 1fr;
            }

            .hero {
                flex-direction: column;
            }

            .hero-right {
                display: none;
            }

            .stats-row {
                grid-template-columns: 1fr;
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
                <span class="logo-text">Perpustakaan</span>
            </div>
            <div class="sidebar-user">
                <div class="sidebar-avatar">{{ strtoupper(substr(Auth::user()->name, 0, 1)) }}</div>
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
            <a href="#" class="nav-item">
                <i data-lucide="book-check" width="17" height="17"></i>
                <span>Pengajuan Pengembalian</span>
            </a>
            <a href="{{ route('riwayat.pinjam') }}" class="nav-item">
                <i data-lucide="history" width="17" height="17"></i>
                <span>Riwayat Pinjam</span>
            </a>

            <div class="sidebar-divider" style="margin-top:10px;margin-bottom:10px;"></div>

            <div class="nav-section-label">Akun</div>
            <a href="#" class="nav-item">
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
            <div class="topbar-greeting">
                Halo, <strong>{{ Auth::user()->name }}</strong> — selamat belajar hari ini! 🎒
            </div>
            <div class="topbar-right">
                <div class="topbar-date">
                    <i data-lucide="calendar" width="13" height="13"></i>
                    <span id="todayDate"></span>
                </div>
            </div>
        </header>

        <main class="content">

            {{-- Hero --}}
            <div class="hero">
                <div class="hero-left">
                    <div class="hero-tag">
                        <div class="hero-tag-dot"></div>
                        Selamat datang kembali
                    </div>
                    <h1>Buku yang bagus<br>= <span>hari yang produktif</span></h1>
                    <p>Pinjam buku, kembalikan tepat waktu,<br>dan jadilah siswa terbaik di sekolahmu.</p>
                </div>
                <div class="hero-right">
                    <div class="hero-book-stack">
                        <div class="book-spine bs-1">📗 Fiksi & Sastra</div>
                        <div class="book-spine bs-2">🔬 Sains & Ilmu</div>
                        <div class="book-spine bs-3">📘 Pelajaran</div>
                    </div>
                </div>
            </div>

            {{-- Stats --}}
            <div class="stats-row">
                <div class="stat-card">
                    <div class="stat-icon si-green">
                        <i data-lucide="book-open" width="20" height="20"></i>
                    </div>
                    <div>
                        <div class="stat-num">0</div>
                        <div class="stat-label">Sedang Dipinjam</div>
                    </div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon si-blue">
                        <i data-lucide="history" width="20" height="20"></i>
                    </div>
                    <div>
                        <div class="stat-num">0</div>
                        <div class="stat-label">Total Pernah Dipinjam</div>
                    </div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon si-amber">
                        <i data-lucide="alarm-clock" width="20" height="20"></i>
                    </div>
                    <div>
                        <div class="stat-num">0</div>
                        <div class="stat-label">Akan Jatuh Tempo</div>
                    </div>
                </div>
            </div>

            {{-- Quick Actions --}}
            <div class="section-title">Mau ngapain hari ini?</div>
            <div class="actions-grid">
                <a href="{{ route('siswa.buku.index') }}" class="action-card ac-pinjam">
                    <div class="action-icon ai-lime">
                        <i data-lucide="book-plus" width="20" height="20"></i>
                    </div>
                    <div>
                        <div class="action-label">Pinjam Buku</div>
                        <div class="action-desc">Cari dan ajukan peminjaman buku dari koleksi perpustakaan</div>
                    </div>
                    <div class="action-arrow">
                        Mulai cari <i data-lucide="arrow-right" width="13" height="13"></i>
                    </div>
                </a>

                <a href="#" class="action-card ac-kembali">
                    <div class="action-icon ai-sage">
                        <i data-lucide="book-check" width="20" height="20"></i>
                    </div>
                    <div>
                        <div class="action-label">Kembalikan Buku</div>
                        <div class="action-desc">Ajukan pengembalian buku yang sedang kamu pinjam</div>
                    </div>
                    <div class="action-arrow">
                        Lihat daftar <i data-lucide="arrow-right" width="13" height="13"></i>
                    </div>
                </a>

                <a href="{{ route('riwayat.pinjam') }}" class="action-card ac-riwayat">
                    <div class="action-icon ai-blue">
                        <i data-lucide="scroll-text" width="20" height="20"></i>
                    </div>
                    <div>
                        <div class="action-label">Riwayat Pinjam</div>
                        <div class="action-desc">Lihat semua riwayat peminjaman bukumu selama ini</div>
                    </div>
                    <div class="action-arrow">
                        Buka riwayat <i data-lucide="arrow-right" width="13" height="13"></i>
                    </div>
                </a>

                <a href="#" class="action-card ac-akun">
                    <div class="action-icon ai-purple">
                        <i data-lucide="user-circle" width="20" height="20"></i>
                    </div>
                    <div>
                        <div class="action-label">Akun Saya</div>
                        <div class="action-desc">Lihat dan perbarui data profil akunmu</div>
                    </div>
                    <div class="action-arrow">
                        Buka profil <i data-lucide="arrow-right" width="13" height="13"></i>
                    </div>
                </a>
            </div>

            {{-- Active Loans --}}
            <div class="section-title">Peminjaman Aktif</div>
            <div class="card">
                <div class="card-head">
                    <div class="card-head-title">
                        <i data-lucide="book-open" width="15" height="15" style="color:var(--sage)"></i>
                        Buku yang Sedang Dipinjam
                    </div>
                    <a href="{{ route('siswa.buku.index') }}" class="btn-sm btn-outline">
                        <i data-lucide="plus" width="12" height="12"></i>
                        Pinjam Lagi
                    </a>
                </div>
                <div class="loan-list">
                    {{-- @forelse($peminjaman as $item)
                <div class="loan-item">
                    <div class="loan-cover">📗</div>
                    <div class="loan-info">
                        <div class="loan-title">{{ $item->buku->judul }}</div>
                        <div class="loan-author">{{ $item->buku->pengarang }}</div>
                        <div class="loan-meta">
                            <i data-lucide="calendar" width="11" height="11"></i>
                            Kembali {{ $item->tanggal_kembali->format('d M Y') }}
                        </div>
                    </div>
                    <span class="badge badge-green">Aktif</span>
                </div>
                @empty --}}
                    <div class="empty-state">
                        <div class="empty-circle">
                            <i data-lucide="inbox" width="24" height="24"></i>
                        </div>
                        <p>Kamu belum pinjam buku apapun.<br>
                            <a href="{{ route('siswa.buku.index') }}">Yuk mulai dari sini →</a>
                        </p>
                    </div>
                    {{-- @endforelse --}}
                </div>
            </div>

        </main>
    </div>

    <script>
        lucide.createIcons();

        // Tanggal hari ini
        const opts = {
            weekday: 'long',
            year: 'numeric',
            month: 'long',
            day: 'numeric'
        };
        document.getElementById('todayDate').textContent = new Date().toLocaleDateString('id-ID', opts);
    </script>
</body>

</html>
    