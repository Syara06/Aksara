<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pengembalian Buku - Aksara</title>
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
        }
        .nav-item:hover {
            background: rgba(255,255,255,0.07);
            color: rgba(255,255,255,0.92);
        }
        .nav-item.active {
            background: rgba(163,230,53,0.14);
            color: var(--lime);
        }
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

        /* ─── CONTENT ─── */
        .content { padding: 28px 32px; flex: 1; }

        /* ─── BREADCRUMB ─── */
        .breadcrumb {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 13px;
            color: var(--text-muted);
            margin-bottom: 20px;
        }
        .breadcrumb a {
            color: var(--text-muted);
            text-decoration: none;
            transition: color 0.15s;
        }
        .breadcrumb a:hover { color: var(--green); }
        .breadcrumb-sep { color: var(--border); }
        .breadcrumb-current { color: var(--forest); font-weight: 600; }

        /* ─── FORM CARD ─── */
        .form-card {
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: var(--radius);
            box-shadow: var(--shadow-sm);
            max-width: 680px;
            overflow: hidden;
        }

        .form-card-header {
            background: linear-gradient(130deg, var(--forest) 0%, var(--forest-soft) 100%);
            padding: 24px 28px;
            position: relative;
            overflow: hidden;
        }
        .form-card-header::after {
            content: '';
            position: absolute;
            right: -20px; bottom: -30px;
            width: 160px; height: 160px;
            background: radial-gradient(circle, rgba(163,230,53,0.1) 0%, transparent 70%);
        }
        .form-card-header-inner {
            display: flex;
            align-items: center;
            gap: 14px;
            position: relative;
            z-index: 1;
        }
        .header-icon {
            width: 48px; height: 48px;
            background: rgba(255,255,255,0.1);
            border: 1px solid rgba(255,255,255,0.15);
            border-radius: 12px;
            display: flex; align-items: center; justify-content: center;
            color: var(--lime);
            flex-shrink: 0;
        }
        .form-card-title {
            font-family: 'Playfair Display', serif;
            font-size: 20px;
            font-weight: 700;
            color: white;
        }
        .form-card-sub {
            font-size: 12.5px;
            color: rgba(255,255,255,0.5);
            margin-top: 3px;
        }

        .form-body { padding: 28px; }

        /* ─── INFO BLOCK ─── */
        .info-block {
            background: var(--sand);
            border: 1px solid var(--border);
            border-radius: var(--radius-sm);
            padding: 18px 20px;
            margin-bottom: 24px;
        }
        .info-block-title {
            font-size: 11px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.1em;
            color: var(--text-muted);
            margin-bottom: 12px;
            display: flex;
            align-items: center;
            gap: 6px;
        }
        .info-row {
            display: flex;
            align-items: baseline;
            gap: 10px;
            padding: 7px 0;
            border-bottom: 1px solid var(--border);
        }
        .info-row:last-child { border-bottom: none; padding-bottom: 0; }
        .info-label {
            font-size: 12.5px;
            color: var(--text-muted);
            font-weight: 500;
            min-width: 150px;
            flex-shrink: 0;
        }
        .info-value {
            font-size: 13.5px;
            color: var(--text);
            font-weight: 600;
        }

        /* ─── STATUS ALERT ─── */
        .status-alert {
            border-radius: var(--radius-sm);
            padding: 14px 18px;
            margin-bottom: 24px;
            display: flex;
            align-items: flex-start;
            gap: 12px;
        }
        .status-alert.late {
            background: #fff7ed;
            border: 1px solid #fed7aa;
        }
        .status-alert.ontime {
            background: #f0fdf4;
            border: 1px solid #bbf7d0;
        }
        .alert-icon {
            width: 36px; height: 36px;
            border-radius: 8px;
            display: flex; align-items: center; justify-content: center;
            flex-shrink: 0;
        }
        .alert-icon.late { background: #ffedd5; color: #ea580c; }
        .alert-icon.ontime { background: #dcfce7; color: #16a34a; }
        .alert-content { flex: 1; }
        .alert-title {
            font-size: 13.5px;
            font-weight: 700;
            margin-bottom: 4px;
        }
        .alert-title.late { color: #c2410c; }
        .alert-title.ontime { color: #15803d; }
        .alert-desc { font-size: 12.5px; color: var(--text-muted); line-height: 1.6; }
        .denda-amount {
            font-size: 15px;
            font-weight: 700;
            color: #c2410c;
        }

        /* ─── FIELD ─── */
        .field { margin-bottom: 20px; }
        .field label {
            display: block;
            font-size: 12px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.07em;
            color: var(--text-muted);
            margin-bottom: 8px;
        }
        .field label span.optional {
            font-weight: 400;
            text-transform: none;
            letter-spacing: 0;
            color: #9ca8a1;
            font-size: 11.5px;
        }
        textarea {
            width: 100%;
            padding: 12px 14px;
            border: 1.5px solid var(--border);
            border-radius: var(--radius-sm);
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-size: 14px;
            color: var(--text);
            background: white;
            resize: vertical;
            min-height: 100px;
            transition: border-color 0.18s, box-shadow 0.18s;
            line-height: 1.6;
        }
        textarea:focus {
            outline: none;
            border-color: var(--green);
            box-shadow: 0 0 0 3px rgba(61,153,112,0.12);
        }
        textarea::placeholder { color: #b0bdb5; }

        /* ─── ACTIONS ─── */
        .actions {
            display: flex;
            gap: 12px;
            align-items: center;
            margin-top: 8px;
        }
        .btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 11px 22px;
            border-radius: var(--radius-sm);
            font-size: 14px;
            font-weight: 600;
            font-family: 'Plus Jakarta Sans', sans-serif;
            text-decoration: none;
            cursor: pointer;
            border: none;
            transition: all 0.15s;
        }
        .btn-primary {
            background: var(--forest);
            color: white;
            box-shadow: 0 2px 8px rgba(26,58,42,0.2);
        }
        .btn-primary:hover {
            background: var(--forest-soft);
            transform: translateY(-1px);
            box-shadow: 0 4px 14px rgba(26,58,42,0.25);
        }
        .btn-ghost {
            background: var(--sand);
            color: var(--text-muted);
            border: 1px solid var(--border);
        }
        .btn-ghost:hover {
            background: var(--sand-2);
            color: var(--text);
        }

        /* ─── RESPONSIVE ─── */
        @media (max-width: 900px) {
            :root { --sidebar-w: 68px; }
            .brand-name, .brand-sub, .nav-label, .nav-text { display: none; }
            .sidebar-brand { justify-content: center; padding: 22px 12px 20px; }
            .nav-item { justify-content: center; padding: 11px; }
            .nav-item.active::before { display: none; }
            .btn-logout-nav { justify-content: center; padding: 11px; }
            .content { padding: 20px 16px; }
            .form-body { padding: 20px; }
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
            <div class="page-title">Pengembalian Buku</div>
            <div class="page-sub">Ajukan pengembalian buku yang dipinjam</div>
        </div>
        <div class="topbar-right">
            <div class="user-chip">
                <div class="user-avatar">{{ strtoupper(substr(Auth::user()->name, 0, 1)) }}</div>
                <span class="user-name">{{ Auth::user()->name }}</span>
            </div>
        </div>
    </header>

    <main class="content">

        {{-- Breadcrumb --}}
        <div class="breadcrumb">
            <a href="{{ route('riwayat.pinjam') }}">
                <i data-lucide="history" width="13" height="13" style="display:inline;vertical-align:middle;margin-right:4px;"></i>
                Riwayat Pinjam
            </a>
            <span class="breadcrumb-sep"><i data-lucide="chevron-right" width="13" height="13" style="display:inline;vertical-align:middle;"></i></span>
            <span class="breadcrumb-current">Form Pengembalian</span>
        </div>

        <div class="form-card">

            {{-- Header --}}
            <div class="form-card-header">
                <div class="form-card-header-inner">
                    <div class="header-icon">
                        <i data-lucide="package-check" width="22" height="22"></i>
                    </div>
                    <div>
                        <div class="form-card-title">Form Pengembalian Buku</div>
                        <div class="form-card-sub">Isi formulir berikut untuk mengajukan pengembalian</div>
                    </div>
                </div>
            </div>

            <div class="form-body">

                {{-- Info Peminjaman --}}
                <div class="info-block">
                    <div class="info-block-title">
                        <i data-lucide="info" width="13" height="13"></i>
                        Detail Peminjaman
                    </div>
                    <div class="info-row">
                        <span class="info-label">Judul Buku</span>
                        <span class="info-value">{{ $loan->book->judul }}</span>
                    </div>
                    <div class="info-row">
                        <span class="info-label">Tanggal Pinjam</span>
                        <span class="info-value">{{ $loan->tanggal_pinjam }}</span>
                    </div>
                    <div class="info-row">
                        <span class="info-label">Rencana Kembali</span>
                        <span class="info-value">{{ $loan->tanggal_kembali_rencana }}</span>
                    </div>
                </div>

                {{-- Status Keterlambatan --}}
                @if ($hariTerlambat > 0)
                    <div class="status-alert late">
                        <div class="alert-icon late">
                            <i data-lucide="alert-triangle" width="18" height="18"></i>
                        </div>
                        <div class="alert-content">
                            <div class="alert-title late">Terlambat {{ $hariTerlambat }} hari</div>
                            <div class="alert-desc">
                                Estimasi denda keterlambatan:
                                <span class="denda-amount">Rp {{ number_format($estimasiDenda, 0, ',', '.') }}</span>
                                (Rp {{ number_format($dendaPerHari, 0, ',', '.') }}/hari)<br>
                                <span style="font-size:11.5px;color:#9ca3af;margin-top:4px;display:block;">Denda akan diverifikasi admin dan dapat berubah jika terdapat kerusakan pada buku.</span>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="status-alert ontime">
                        <div class="alert-icon ontime">
                            <i data-lucide="check-circle-2" width="18" height="18"></i>
                        </div>
                        <div class="alert-content">
                            <div class="alert-title ontime">Tepat Waktu</div>
                            <div class="alert-desc">Tidak ada denda keterlambatan. Terima kasih sudah mengembalikan tepat waktu!</div>
                        </div>
                    </div>
                @endif

                {{-- Form --}}
                <form method="POST" action="{{ route('pengembalian.ajukan', $loan->id) }}">
                    @csrf

                    <div class="field">
                        <label>
                            Alasan Keterlambatan
                            <span class="optional">(opsional, isi jika terlambat)</span>
                        </label>
                        <textarea
                            name="alasan_keterlambatan"
                            rows="4"
                            placeholder="Contoh: sakit, ada tugas menumpuk, lupa tanggal jatuh tempo..."
                        ></textarea>
                    </div>

                    <div class="actions">
                        <button type="submit" class="btn btn-primary">
                            <i data-lucide="send" width="15" height="15"></i>
                            Ajukan Pengembalian
                        </button>
                        <a href="{{ route('riwayat.pinjam') }}" class="btn btn-ghost">
                            <i data-lucide="x" width="15" height="15"></i>
                            Batal
                        </a>
                    </div>

                </form>

            </div>
        </div>

    </main>
</div>

<script>lucide.createIcons();</script>
</body>
</html>