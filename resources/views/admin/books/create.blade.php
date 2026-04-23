<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Buku - Admin</title>
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
            --bg:          #f7f4ef;
            --surface:     #ffffff;
            --text:        #1c2b22;
            --text-muted:  #6b7c72;
            --border:      #e0d9ce;
            --border-focus:#3d9970;
            --shadow-sm:   0 1px 4px rgba(26,58,42,0.07);
            --shadow:      0 4px 18px rgba(26,58,42,0.10);
            --radius:      14px;
            --radius-sm:   9px;
            --sidebar-w:   270px;
        }

        body { font-family: 'Plus Jakarta Sans', sans-serif; background: var(--bg); color: var(--text); min-height: 100vh; }

        /* ─── SIDEBAR ─── */
        .sidebar {
            position: fixed; top: 0; left: 0;
            width: var(--sidebar-w); height: 100vh;
            background: var(--forest); display: flex; flex-direction: column;
            z-index: 100; overflow: hidden;
        }
        .sidebar::before {
            content: ''; position: absolute; inset: 0;
            background-image:
                radial-gradient(circle at 80% 10%, rgba(163,230,53,0.06) 0%, transparent 55%),
                radial-gradient(circle at 20% 80%, rgba(61,153,112,0.08) 0%, transparent 50%);
            pointer-events: none;
        }
        .sidebar-brand {
            padding: 28px 24px 24px; border-bottom: 1px solid rgba(255,255,255,0.07);
            display: flex; align-items: center; gap: 13px;
        }
        .brand-icon {
            width: 44px; height: 44px;
            background: linear-gradient(135deg, var(--green), var(--lime));
            border-radius: 12px; display: flex; align-items: center; justify-content: center;
            flex-shrink: 0; box-shadow: 0 4px 14px rgba(61,153,112,0.4); color: var(--forest);
        }
        .brand-name { font-family: 'Playfair Display', serif; color: #fff; font-size: 17px; font-weight: 700; line-height: 1.2; }
        .brand-sub  { font-size: 11.5px; color: rgba(255,255,255,0.38); margin-top: 1px; }
        .nav-section { padding: 18px 14px 6px; }
        .nav-label {
            font-size: 10.5px; font-weight: 700; letter-spacing: 0.12em; text-transform: uppercase;
            color: rgba(255,255,255,0.28); padding: 0 10px; margin-bottom: 7px;
        }
        .nav-item {
            display: flex; align-items: center; gap: 12px; padding: 11px 13px;
            border-radius: var(--radius-sm); color: rgba(255,255,255,0.58); text-decoration: none;
            font-size: 14.5px; font-weight: 500; transition: all 0.18s; margin-bottom: 2px; position: relative;
        }
        .nav-item:hover { background: rgba(255,255,255,0.07); color: rgba(255,255,255,0.92); }
        .nav-item.active { background: rgba(163,230,53,0.14); color: var(--lime); }
        .nav-item.active::before {
            content: ''; position: absolute; left: 0; top: 22%; bottom: 22%;
            width: 3px; background: var(--lime); border-radius: 0 3px 3px 0;
        }
        .sidebar-divider { height: 1px; background: rgba(255,255,255,0.07); margin: 8px 14px; }
        .sidebar-footer { margin-top: auto; padding: 14px 14px 24px; }
        .btn-logout-nav {
            display: flex; align-items: center; gap: 12px; width: 100%; padding: 11px 13px;
            border-radius: var(--radius-sm); background: none; border: none; cursor: pointer;
            color: rgba(255,255,255,0.42); font-size: 14.5px; font-weight: 500;
            font-family: 'Plus Jakarta Sans', sans-serif; transition: all 0.18s; text-align: left;
        }
        .btn-logout-nav:hover { background: rgba(239,68,68,0.15); color: #fca5a5; }

        /* ─── MAIN ─── */
        .main { margin-left: var(--sidebar-w); min-height: 100vh; display: flex; flex-direction: column; }

        /* ─── TOPBAR ─── */
        .topbar {
            background: var(--surface); border-bottom: 1px solid var(--border);
            padding: 14px 32px; display: flex; align-items: center;
            justify-content: space-between; position: sticky; top: 0; z-index: 50;
        }
        .topbar-breadcrumb { display: flex; align-items: center; gap: 8px; }
        .breadcrumb-link {
            font-size: 13px; color: var(--text-muted); text-decoration: none;
            display: flex; align-items: center; gap: 5px; font-weight: 500;
        }
        .breadcrumb-link:hover { color: var(--green); }
        .breadcrumb-sep { color: var(--border); font-size: 14px; }
        .breadcrumb-current { font-size: 13px; font-weight: 600; color: var(--forest); }
        .topbar-right { display: flex; align-items: center; gap: 12px; }
        .user-chip {
            display: flex; align-items: center; gap: 9px; background: var(--sand);
            border: 1px solid var(--border); padding: 5px 14px 5px 5px; border-radius: 40px;
        }
        .user-avatar {
            width: 30px; height: 30px;
            background: linear-gradient(135deg, var(--forest-mid), var(--green));
            border-radius: 50%; display: flex; align-items: center; justify-content: center;
            color: white; font-size: 12px; font-weight: 700;
        }
        .user-name { font-size: 13.5px; font-weight: 600; }
        .btn-logout-top {
            display: inline-flex; align-items: center; gap: 6px; background: none;
            border: 1.5px solid #fca5a5; color: #dc2626; font-size: 13px; font-weight: 500;
            padding: 7px 14px; border-radius: var(--radius-sm); cursor: pointer;
            font-family: 'Plus Jakarta Sans', sans-serif; transition: all 0.15s;
        }
        .btn-logout-top:hover { background: #dc2626; color: white; border-color: #dc2626; }

        /* ─── CONTENT ─── */
        .content { padding: 28px 32px; flex: 1; }

        /* ─── PAGE HEADER ─── */
        .page-header { margin-bottom: 24px; }
        .page-header h1 { font-family: 'Playfair Display', serif; font-size: 26px; font-weight: 700; color: var(--forest); }
        .page-header p { font-size: 13.5px; color: var(--text-muted); margin-top: 4px; }

        /* ─── FORM LAYOUT ─── */
        .form-grid { display: grid; grid-template-columns: 1fr 320px; gap: 20px; align-items: start; }

        /* ─── CARD ─── */
        .card {
            background: var(--surface); border: 1px solid var(--border);
            border-radius: var(--radius); box-shadow: var(--shadow-sm);
            overflow: hidden; margin-bottom: 20px;
        }
        .card:last-child { margin-bottom: 0; }
        .card-header {
            padding: 15px 22px; border-bottom: 1px solid var(--border);
            display: flex; align-items: center; gap: 9px; background: var(--sand);
        }
        .card-title { font-family: 'Playfair Display', serif; font-size: 15px; font-weight: 700; color: var(--forest); }
        .card-body { padding: 22px; }

        /* ─── FIELDS ─── */
        .field { margin-bottom: 18px; }
        .field:last-child { margin-bottom: 0; }
        .field-row { display: grid; grid-template-columns: 1fr 1fr; gap: 16px; }

        label {
            display: block; font-size: 13px; font-weight: 600;
            color: var(--text); margin-bottom: 6px;
        }
        label .required { color: #dc2626; margin-left: 2px; }
        label .hint { font-weight: 400; color: var(--text-muted); font-size: 11.5px; margin-left: 4px; }

        .input-wrap { position: relative; }
        .input-wrap svg {
            position: absolute; left: 12px; top: 50%; transform: translateY(-50%);
            color: var(--text-muted); pointer-events: none;
        }
        .input-wrap input,
        .input-wrap select { padding-left: 38px !important; }

        input[type="text"],
        input[type="number"],
        select,
        textarea {
            width: 100%; padding: 10px 14px;
            border: 1.5px solid var(--border); border-radius: var(--radius-sm);
            font-family: 'Plus Jakarta Sans', sans-serif; font-size: 14px;
            color: var(--text); background: var(--surface);
            transition: border-color 0.15s, box-shadow 0.15s; appearance: none;
        }
        input:focus, select:focus, textarea:focus {
            outline: none; border-color: var(--border-focus);
            box-shadow: 0 0 0 3px rgba(61,153,112,0.12);
        }
        input::placeholder, textarea::placeholder { color: #b4bfb8; }
        textarea { resize: vertical; min-height: 100px; line-height: 1.6; }

        .error-msg { font-size: 12px; color: #dc2626; margin-top: 5px; display: flex; align-items: center; gap: 4px; }
        .input-error { border-color: #fca5a5 !important; }
        .input-error:focus { box-shadow: 0 0 0 3px rgba(239,68,68,0.10) !important; }

        /* ─── COVER UPLOAD ─── */
        .cover-drop {
            width: 100%; aspect-ratio: 2/3; border: 2px dashed var(--border);
            border-radius: var(--radius-sm); background: var(--sand);
            display: flex; flex-direction: column; align-items: center; justify-content: center;
            gap: 8px; overflow: hidden; position: relative; cursor: pointer; transition: all 0.18s;
        }
        .cover-drop:hover { border-color: var(--green); background: #f0fdf4; }
        .cover-drop.has-image { border-style: solid; border-color: var(--border); }
        .cover-drop img {
            width: 100%; height: 100%; object-fit: cover; position: absolute; inset: 0;
        }
        .cover-overlay {
            position: absolute; inset: 0; background: rgba(26,58,42,0.55);
            display: flex; flex-direction: column; align-items: center; justify-content: center;
            gap: 6px; opacity: 0; transition: opacity 0.18s;
        }
        .cover-drop:hover .cover-overlay { opacity: 1; }
        .cover-overlay span { color: white; font-size: 13px; font-weight: 600; }
        .cover-empty { display: flex; flex-direction: column; align-items: center; gap: 8px; }
        .cover-empty-icon {
            width: 48px; height: 48px; background: var(--surface);
            border: 1px solid var(--border); border-radius: 12px;
            display: flex; align-items: center; justify-content: center;
            color: var(--text-muted);
        }
        .cover-empty-text { font-size: 13px; font-weight: 500; color: var(--text-muted); }
        .cover-empty-sub  { font-size: 11.5px; color: #b4bfb8; }
        #coverInput { display: none; }

        /* ─── STOK ─── */
        .stok-display {
            display: flex; align-items: center; justify-content: space-between;
            background: var(--sand); border: 1px solid var(--border);
            border-radius: var(--radius-sm); padding: 10px 14px; margin-top: 8px;
        }
        .stok-label-sm { font-size: 12px; color: var(--text-muted); }
        .stok-val { font-family: 'Playfair Display', serif; font-size: 22px; font-weight: 700; color: var(--forest); }

        /* ─── KONDISI ─── */
        .kondisi-options { display: flex; flex-direction: column; gap: 8px; margin-top: 2px; }
        .kondisi-option {
            display: flex; align-items: center; gap: 10px; padding: 11px 14px;
            border: 1.5px solid var(--border); border-radius: var(--radius-sm);
            cursor: pointer; transition: all 0.15s;
        }
        .kondisi-option:hover { border-color: var(--green); background: #f0fdf4; }
        .kondisi-option input[type="radio"] { display: none; }
        .kondisi-option.selected-Baik       { border-color: #6ee7b7; background: #f0fdf4; }
        .kondisi-option.selected-Rusak      { border-color: #fca5a5; background: #fff1f2; }
        .kondisi-dot { width: 10px; height: 10px; border-radius: 50%; flex-shrink: 0; }
        .dot-Baik       { background: #10b981; }
        .dot-Rusak      { background: #ef4444; }
        .kondisi-text { font-size: 14px; font-weight: 500; }

        /* ─── FORM ACTIONS ─── */
        .form-actions {
            display: flex; align-items: center; gap: 10px;
            padding: 18px 22px; border-top: 1px solid var(--border); background: var(--sand);
        }
        .btn {
            display: inline-flex; align-items: center; gap: 8px; padding: 10px 20px;
            border-radius: var(--radius-sm); font-size: 14px; font-weight: 600;
            font-family: 'Plus Jakarta Sans', sans-serif; text-decoration: none;
            cursor: pointer; border: none; transition: all 0.15s;
        }
        .btn-green { background: var(--green); color: white; box-shadow: 0 2px 8px rgba(61,153,112,0.3); }
        .btn-green:hover { background: #2e7d56; }
        .btn-ghost { background: none; color: var(--text-muted); border: 1.5px solid var(--border); }
        .btn-ghost:hover { border-color: var(--text-muted); color: var(--text); }

        /* ─── RESPONSIVE ─── */
        @media (max-width: 1024px) { .form-grid { grid-template-columns: 1fr; } }
        @media (max-width: 900px) {
            :root { --sidebar-w: 68px; }
            .brand-name, .brand-sub, .nav-label, .nav-text { display: none; }
            .sidebar-brand { justify-content: center; padding: 22px 12px 20px; }
            .nav-item { justify-content: center; padding: 11px; }
            .nav-item.active::before { display: none; }
            .btn-logout-nav { justify-content: center; padding: 11px; }
            .topbar, .content { padding-left: 18px; padding-right: 18px; }
        }
        @media (max-width: 600px) { .field-row { grid-template-columns: 1fr; } }
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
        <a href="{{ route('admin.dashboard') }}" class="nav-item">
            <i data-lucide="layout-dashboard" width="18" height="18"></i>
            <span class="nav-text">Dashboard</span>
        </a>
        <a href="{{ route('admin.books.index') }}" class="nav-item active">
            <i data-lucide="book-marked" width="18" height="18"></i>
            <span class="nav-text">Kelola Buku</span>
        </a>
        <a href="#" class="nav-item">
            <i data-lucide="book-plus" width="18" height="18"></i>
            <span class="nav-text">Pengajuan Peminjaman</span>
        </a>
        <a href="#" class="nav-item">
            <i data-lucide="book-check" width="18" height="18"></i>
            <span class="nav-text">Pengajuan Pengembalian</span>
        </a>
        <a href="#" class="nav-item">
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
        <div class="topbar-breadcrumb">
            <a href="{{ route('admin.books.index') }}" class="breadcrumb-link">
                <i data-lucide="book-marked" width="14" height="14"></i>
                Kelola Buku
            </a>
            <span class="breadcrumb-sep">/</span>
            <span class="breadcrumb-current">Tambah Buku</span>
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

        <div class="page-header">
            <h1>Tambah Buku Baru</h1>
            <p>Isi informasi buku yang akan ditambahkan ke koleksi perpustakaan.</p>
        </div>

        <form method="POST" action="{{ route('admin.books.store') }}" enctype="multipart/form-data">
            @csrf

            <div class="form-grid">

                {{-- ─── KOLOM KIRI ─── --}}
                <div>

                    {{-- Identitas Buku --}}
                    <div class="card">
                        <div class="card-header">
                            <i data-lucide="file-text" width="16" height="16" style="color:var(--green)"></i>
                            <span class="card-title">Identitas Buku</span>
                        </div>
                        <div class="card-body">

                            <div class="field">
                                <label>Judul <span class="required">*</span></label>
                                <div class="input-wrap">
                                    <i data-lucide="type" width="15" height="15"></i>
                                    <input type="text" name="judul"
                                        value="{{ old('judul') }}"
                                        placeholder="Masukkan judul buku"
                                        class="{{ $errors->has('judul') ? 'input-error' : '' }}"
                                        required>
                                </div>
                                @error('judul')
                                    <div class="error-msg"><i data-lucide="circle-alert" width="12" height="12"></i> {{ $message }}</div>
                                @enderror
                            </div>

                            <div class="field-row">
                                <div class="field">
                                    <label>Pengarang <span class="required">*</span></label>
                                    <div class="input-wrap">
                                        <i data-lucide="user" width="15" height="15"></i>
                                        <input type="text" name="pengarang"
                                            value="{{ old('pengarang') }}"
                                            placeholder="Nama pengarang"
                                            class="{{ $errors->has('pengarang') ? 'input-error' : '' }}"
                                            required>
                                    </div>
                                    @error('pengarang')
                                        <div class="error-msg"><i data-lucide="circle-alert" width="12" height="12"></i> {{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="field">
                                    <label>Penerbit</label>
                                    <div class="input-wrap">
                                        <i data-lucide="building-2" width="15" height="15"></i>
                                        <input type="text" name="penerbit"
                                            value="{{ old('penerbit') }}"
                                            placeholder="Nama penerbit">
                                    </div>
                                </div>
                            </div>

                            <div class="field-row">
                                <div class="field">
                                    <label>ISBN <span class="required">*</span></label>
                                    <div class="input-wrap">
                                        <i data-lucide="barcode" width="15" height="15"></i>
                                        <input type="text" name="isbn"
                                            value="{{ old('isbn') }}"
                                            placeholder="978-xxx-xxx"
                                            class="{{ $errors->has('isbn') ? 'input-error' : '' }}"
                                            required>
                                    </div>
                                    @error('isbn')
                                        <div class="error-msg"><i data-lucide="circle-alert" width="12" height="12"></i> {{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="field">
                                    <label>Tahun Terbit</label>
                                    <div class="input-wrap">
                                        <i data-lucide="calendar" width="15" height="15"></i>
                                        <input type="number" name="tahun_terbit"
                                            value="{{ old('tahun_terbit') }}"
                                            placeholder="{{ date('Y') }}"
                                            min="1900" max="{{ date('Y') }}">
                                    </div>
                                </div>
                            </div>

                            <div class="field-row">
                                <div class="field">
                                    <label>Kategori</label>
                                    <div class="input-wrap">
                                        <i data-lucide="tag" width="15" height="15"></i>
                                        <select name="kategori">
                                            <option value="">Pilih kategori</option>
                                            @foreach(['Fiksi','Non-Fiksi','Sains','Sejarah','Pelajaran','Biografi','Teknologi','Sastra','Lainnya'] as $kat)
                                                <option value="{{ $kat }}" {{ old('kategori') == $kat ? 'selected' : '' }}>{{ $kat }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="field">
                                    <label>Kode Rak</label>
                                    <div class="input-wrap">
                                        <i data-lucide="map-pin" width="15" height="15"></i>
                                        <input type="text" name="kode_rak"
                                            value="{{ old('kode_rak') }}"
                                            placeholder="Cth: A-01-03">
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    {{-- Deskripsi --}}
                    <div class="card">
                        <div class="card-header">
                            <i data-lucide="align-left" width="16" height="16" style="color:var(--green)"></i>
                            <span class="card-title">Deskripsi</span>
                        </div>
                        <div class="card-body">
                            <div class="field">
                                <label>Sinopsis / Deskripsi <span class="hint">(opsional)</span></label>
                                <textarea name="deskripsi" rows="5"
                                    placeholder="Tulis sinopsis atau deskripsi singkat buku...">{{ old('deskripsi') }}</textarea>
                            </div>
                        </div>
                    </div>

                    {{-- Form Actions --}}
                    <div class="card">
                        <div class="form-actions">
                            <button type="submit" class="btn btn-green">
                                <i data-lucide="plus-circle" width="15" height="15"></i>
                                Simpan Buku
                            </button>
                            <a href="{{ route('admin.books.index') }}" class="btn btn-ghost">
                                <i data-lucide="x" width="15" height="15"></i>
                                Batal
                            </a>
                        </div>
                    </div>

                </div>

                {{-- ─── KOLOM KANAN ─── --}}
                <div>

                    {{-- Cover --}}
                    <div class="card" style="margin-bottom:20px;">
                        <div class="card-header">
                            <i data-lucide="image" width="16" height="16" style="color:var(--green)"></i>
                            <span class="card-title">Cover Buku</span>
                        </div>
                        <div class="card-body">
                            <div class="cover-drop" id="coverDrop" onclick="document.getElementById('coverInput').click()">
                                <div class="cover-empty" id="coverEmpty">
                                    <div class="cover-empty-icon">
                                        <i data-lucide="image-plus" width="22" height="22"></i>
                                    </div>
                                    <span class="cover-empty-text">Klik untuk upload cover</span>
                                    <span class="cover-empty-sub">JPG, PNG — maks 2MB</span>
                                </div>
                            </div>
                            <input type="file" name="cover" id="coverInput" accept="image/*">
                            <p style="font-size:11.5px; color:var(--text-muted); margin-top:10px; text-align:center;">
                                Rasio ideal 2:3 (contoh: 400×600px)
                            </p>
                        </div>
                    </div>

                    {{-- Stok & Kondisi --}}
                    <div class="card">
                        <div class="card-header">
                            <i data-lucide="package" width="16" height="16" style="color:var(--green)"></i>
                            <span class="card-title">Stok & Kondisi</span>
                        </div>
                        <div class="card-body">

                            <div class="field">
                                <label>Total Stok <span class="required">*</span></label>
                                <div class="input-wrap">
                                    <i data-lucide="hash" width="15" height="15"></i>
                                    <input type="number" name="total_stok" id="stokInput"
                                        value="{{ old('total_stok', 1) }}"
                                        placeholder="0" min="0"
                                        class="{{ $errors->has('total_stok') ? 'input-error' : '' }}"
                                        required
                                        oninput="document.getElementById('stokDisplay').textContent = this.value || '0'">
                                </div>
                                @error('total_stok')
                                    <div class="error-msg"><i data-lucide="circle-alert" width="12" height="12"></i> {{ $message }}</div>
                                @enderror
                                <div class="stok-display">
                                    <span class="stok-label-sm">Jumlah eksemplar</span>
                                    <span class="stok-val" id="stokDisplay">{{ old('total_stok', 1) }}</span>
                                </div>
                            </div>

                            <div class="field">
                                <label>Kondisi Buku <span class="required">*</span></label>
                                <div class="kondisi-options">
                                    @foreach([
                                        ['value' => 'Baik',       'label' => 'Baik',       'dot' => 'dot-Baik',       'sel' => 'selected-Baik'],
                                        ['value' => 'Rusak',      'label' => 'Rusak',      'dot' => 'dot-Rusak',      'sel' => 'selected-Rusak'],
                                    ] as $opt)
                                    @php $isSelected = old('kondisi', 'Baik') == $opt['value']; @endphp
                                    <label class="kondisi-option {{ $isSelected ? $opt['sel'] : '' }}"
                                           onclick="selectKondisi(this, '{{ $opt['sel'] }}')">
                                        <input type="radio" name="kondisi" value="{{ $opt['value'] }}" {{ $isSelected ? 'checked' : '' }}>
                                        <span class="kondisi-dot {{ $opt['dot'] }}"></span>
                                        <span class="kondisi-text">{{ $opt['label'] }}</span>
                                    </label>
                                    @endforeach
                                </div>
                                @error('kondisi')
                                    <div class="error-msg" style="margin-top:6px"><i data-lucide="circle-alert" width="12" height="12"></i> {{ $message }}</div>
                                @enderror
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </form>
    </main>
</div>

<script>
lucide.createIcons();

// Cover preview
document.getElementById('coverInput').addEventListener('change', function(e) {
    const file = e.target.files[0];
    if (!file) return;
    const reader = new FileReader();
    reader.onload = function(ev) {
        const drop = document.getElementById('coverDrop');
        drop.classList.add('has-image');
        drop.innerHTML = `
            <img src="${ev.target.result}" alt="Preview" style="width:100%;height:100%;object-fit:cover;position:absolute;inset:0;">
            <div class="cover-overlay">
                <i data-lucide="camera" width="22" height="22" style="color:white"></i>
                <span>Ganti Cover</span>
            </div>`;
        lucide.createIcons();
        drop.onmouseenter = () => drop.querySelector('.cover-overlay').style.opacity = '1';
        drop.onmouseleave = () => drop.querySelector('.cover-overlay').style.opacity = '0';
    };
    reader.readAsDataURL(file);
});

// Drag & drop
const coverDrop = document.getElementById('coverDrop');
coverDrop.addEventListener('dragover', (e) => { e.preventDefault(); coverDrop.style.borderColor = 'var(--green)'; });
coverDrop.addEventListener('dragleave', ()  => { coverDrop.style.borderColor = ''; });
coverDrop.addEventListener('drop', (e) => {
    e.preventDefault(); coverDrop.style.borderColor = '';
    const file = e.dataTransfer.files[0];
    if (file && file.type.startsWith('image/')) {
        const dt = new DataTransfer();
        dt.items.add(file);
        document.getElementById('coverInput').files = dt.files;
        document.getElementById('coverInput').dispatchEvent(new Event('change'));
    }
});

// Kondisi selection
function selectKondisi(el, selClass) {
    document.querySelectorAll('.kondisi-option').forEach(opt => {
        opt.classList.remove('selected-Baik', 'selected-Cukup-Baik', 'selected-Rusak');
    });
    el.classList.add(selClass);
    el.querySelector('input[type="radio"]').checked = true;
}
</script>
</body>
</html>