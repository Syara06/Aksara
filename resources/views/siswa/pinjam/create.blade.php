<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajukan Peminjaman - Aksara</title>
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
            --border-focus: #5a8a6a;
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

        .form-wrap {
            max-width: 680px;
            margin: 0 auto;
            display: flex;
            flex-direction: column;
            gap: 18px;
        }

        /* ── PAGE HEADER ── */
        .page-header {
            margin-bottom: 4px;
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

        /* ── BOOK SUMMARY ── */
        .book-summary {
            background: var(--ink);
            border-radius: var(--radius-xl);
            padding: 22px 26px;
            display: flex;
            align-items: center;
            gap: 18px;
            position: relative;
            overflow: hidden;
        }

        .book-summary::before {
            content: '';
            position: absolute;
            top: -40px;
            right: -40px;
            width: 180px;
            height: 180px;
            background: radial-gradient(circle, rgba(181, 232, 83, 0.14) 0%, transparent 65%);
        }

        .summary-cover {
            width: 56px;
            height: 74px;
            border-radius: 8px;
            flex-shrink: 0;
            background: rgba(255, 255, 255, 0.08);
            border: 1px solid rgba(255, 255, 255, 0.12);
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            position: relative;
            z-index: 1;
        }

        .summary-cover img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .summary-info {
            position: relative;
            z-index: 1;
        }

        .summary-label {
            font-size: 11px;
            color: rgba(255, 255, 255, 0.4);
            font-weight: 600;
            letter-spacing: 0.08em;
            text-transform: uppercase;
            margin-bottom: 4px;
        }

        .summary-title {
            font-family: 'Lora', serif;
            color: white;
            font-size: 17px;
            font-weight: 600;
            line-height: 1.3;
            margin-bottom: 4px;
        }

        .summary-author {
            font-size: 13px;
            color: rgba(255, 255, 255, 0.5);
        }

        .summary-stok {
            margin-left: auto;
            position: relative;
            z-index: 1;
            flex-shrink: 0;
            background: rgba(181, 232, 83, 0.15);
            border: 1px solid rgba(181, 232, 83, 0.25);
            border-radius: var(--radius-sm);
            padding: 10px 16px;
            text-align: center;
        }

        .stok-num {
            font-family: 'Lora', serif;
            font-size: 26px;
            font-weight: 600;
            color: var(--lime-pop);
            line-height: 1;
        }

        .stok-lbl {
            font-size: 10.5px;
            color: rgba(255, 255, 255, 0.45);
            margin-top: 3px;
        }

        /* ── CARD ── */
        .card {
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: var(--radius-lg);
            overflow: hidden;
        }

        .card-head {
            padding: 14px 22px;
            border-bottom: 1px solid var(--border);
            background: var(--cream);
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .card-head-title {
            font-family: 'Lora', serif;
            font-size: 15px;
            font-weight: 600;
            color: var(--ink);
        }

        .card-body {
            padding: 22px;
        }

        /* ── FIELDS ── */
        .field {
            margin-bottom: 18px;
        }

        .field:last-child {
            margin-bottom: 0;
        }

        .field-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 16px;
        }

        label {
            display: block;
            font-size: 13px;
            font-weight: 600;
            color: var(--text);
            margin-bottom: 6px;
        }

        label .hint {
            font-weight: 400;
            color: var(--text-soft);
            font-size: 11.5px;
            margin-left: 4px;
        }

        .input-wrap {
            position: relative;
        }

        .input-wrap svg {
            position: absolute;
            left: 12px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--text-soft);
            pointer-events: none;
        }

        .input-wrap input {
            padding-left: 38px !important;
        }

        input[type="date"] {
            width: 100%;
            padding: 10px 14px;
            border: 1.5px solid var(--border);
            border-radius: var(--radius-sm);
            font-family: 'Sora', sans-serif;
            font-size: 14px;
            color: var(--text);
            background: var(--surface);
            transition: border-color 0.15s, box-shadow 0.15s;
            appearance: none;
        }

        input[type="date"]:focus {
            outline: none;
            border-color: var(--border-focus);
            box-shadow: 0 0 0 3px rgba(90, 138, 106, 0.12);
        }

        .date-hint {
            font-size: 12px;
            color: var(--text-soft);
            display: flex;
            align-items: center;
            gap: 5px;
            margin-top: 6px;
        }

        /* ── DURASI DISPLAY ── */
        .durasi-display {
            background: var(--cream);
            border: 1px solid var(--border);
            border-radius: var(--radius-sm);
            padding: 12px 16px;
            display: flex;
            align-items: center;
            gap: 10px;
            margin-top: 14px;
        }

        .durasi-icon {
            width: 36px;
            height: 36px;
            background: var(--mint);
            border-radius: 9px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--sage);
            flex-shrink: 0;
        }

        .durasi-num {
            font-family: 'Lora', serif;
            font-size: 20px;
            font-weight: 600;
            color: var(--ink);
        }

        .durasi-lbl {
            font-size: 12px;
            color: var(--text-soft);
        }

        /* ── FORM ACTIONS ── */
        .form-actions {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 18px 22px;
            border-top: 1px solid var(--border);
            background: var(--cream);
        }

        .btn-submit {
            display: inline-flex;
            align-items: center;
            gap: 9px;
            background: var(--lime-pop);
            color: var(--ink);
            font-size: 14px;
            font-weight: 700;
            padding: 11px 22px;
            border-radius: var(--radius-lg);
            border: none;
            cursor: pointer;
            font-family: 'Sora', sans-serif;
            transition: all 0.18s;
            box-shadow: 0 4px 14px rgba(181, 232, 83, 0.35);
        }

        .btn-submit:hover {
            background: #a8db46;
            transform: translateY(-1px);
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

        /* ── INFO BOX ── */
        .info-box {
            display: flex;
            align-items: flex-start;
            gap: 12px;
            background: #eff6ff;
            border: 1.5px solid #bfdbfe;
            border-radius: var(--radius-lg);
            padding: 14px 18px;
            font-size: 13.5px;
            color: #1e40af;
            line-height: 1.6;
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

            .field-row {
                grid-template-columns: 1fr;
            }

            .summary-stok {
                display: none;
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
            <a href="{{ route('pengembalian.index') }}" class="nav-item">
                <i data-lucide="book-check" width="17" height="17"></i>
                <span>Pengajuan Pengembalian</span>
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
                <a href="{{ route('siswa.buku.index') }}" class="breadcrumb-link">
                    <i data-lucide="book-plus" width="13" height="13"></i> Katalog
                </a>
                <span class="breadcrumb-sep">/</span>
                <a href="{{ route('siswa.buku.show', $book->id) }}"
                    class="breadcrumb-link">{{ Str::limit($book->judul, 24) }}</a>
                <span class="breadcrumb-sep">/</span>
                <span class="breadcrumb-current">Ajukan Peminjaman</span>
            </div>
            <div class="user-chip">
                <div class="chip-avatar">{{ strtoupper(substr(Auth::user()->name, 0, 1)) }}</div>
                <span class="chip-name">{{ Auth::user()->name }}</span>
            </div>
        </header>

        <main class="content">
            <div class="form-wrap">

                <div class="page-header">
                    <h1>Ajukan Peminjaman</h1>
                    <p>Pilih tanggal pinjam dan rencana pengembalian buku.</p>
                </div>

                {{-- Book Summary --}}
                <div class="book-summary">
                    <div class="summary-cover">
                        @if ($book->cover)
                            <img src="{{ Storage::url($book->cover) }}" alt="{{ $book->judul }}">
                        @else
                            <i data-lucide="book" width="22" height="22" style="color:rgba(255,255,255,0.4)"></i>
                        @endif
                    </div>
                    <div class="summary-info">
                        <div class="summary-label">Buku yang dipinjam</div>
                        <div class="summary-title">{{ $book->judul }}</div>
                        <div class="summary-author">{{ $book->pengarang }}</div>
                    </div>
                    <div class="summary-stok">
                        <div class="stok-num">{{ $book->total_stok }}</div>
                        <div class="stok-lbl">stok tersedia</div>
                    </div>
                </div>

                {{-- Info --}}
                <div class="info-box">
                    <i data-lucide="info" width="18" height="18" style="flex-shrink:0;margin-top:1px"></i>
                    <span>Pengajuan peminjaman akan direview oleh petugas perpustakaan. Pastikan tanggal yang kamu pilih
                        sudah benar sebelum mengajukan.</span>
                </div>

                {{-- Form --}}
                <form method="POST" action="{{ route('pinjam.ajukan') }}">
                    @csrf
                    <input type="hidden" name="book_id" value="{{ $book->id }}">

                    <div class="card">
                        <div class="card-head">
                            <i data-lucide="calendar-check" width="15" height="15"
                                style="color:var(--sage)"></i>
                            <span class="card-head-title">Jadwal Peminjaman</span>
                        </div>
                        <div class="card-body">
                            <div class="field-row">
                                <div class="field">
                                    <label>Tanggal Pinjam</label>
                                    <div class="input-wrap">
                                        <i data-lucide="calendar" width="15" height="15"></i>
                                        <input type="date" name="tanggal_pinjam" id="tglPinjam"
                                            min="{{ date('Y-m-d') }}" onchange="hitungDurasi()" required>
                                    </div>
                                </div>
                                <div class="field">
                                    <label>Rencana Kembali</label>
                                    <div class="input-wrap">
                                        <i data-lucide="calendar-x" width="15" height="15"></i>
                                        <input type="date" name="tanggal_kembali_rencana" id="tglKembali"
                                            min="{{ date('Y-m-d') }}" onchange="hitungDurasi()" required>
                                    </div>
                                </div>
                            </div>

                            <div class="durasi-display" id="durasiBox" style="display:none;">
                                <div class="durasi-icon">
                                    <i data-lucide="clock" width="17" height="17"></i>
                                </div>
                                <div>
                                    <div class="durasi-num" id="durasiNum">–</div>
                                    <div class="durasi-lbl">durasi peminjaman</div>
                                </div>
                            </div>

                        </div>
                        <div class="form-actions">
                            <button type="submit" class="btn-submit">
                                <i data-lucide="send" width="15" height="15"></i>
                                Ajukan Peminjaman
                            </button>
                            <a href="{{ route('siswa.buku.show', $book->id) }}" class="btn-back">
                                <i data-lucide="arrow-left" width="14" height="14"></i>
                                Kembali
                            </a>
                        </div>
                    </div>

                </form>
            </div>
        </main>
    </div>

    <script>
        lucide.createIcons();

        function hitungDurasi() {
            const a = document.getElementById('tglPinjam').value;
            const b = document.getElementById('tglKembali').value;
            const box = document.getElementById('durasiBox');
            const num = document.getElementById('durasiNum');
            if (a && b) {
                const diff = Math.round((new Date(b) - new Date(a)) / 86400000);
                box.style.display = 'flex';
                if (diff > 0) {
                    num.textContent = diff + ' hari';
                    num.style.color = diff <= 7 ? 'var(--ink)' : diff <= 14 ? '#d97706' : '#dc2626';
                } else {
                    num.textContent = 'Tanggal tidak valid';
                    num.style.color = '#dc2626';
                }
            } else {
                box.style.display = 'none';
            }
        }
    </script>
</body>

</html>
