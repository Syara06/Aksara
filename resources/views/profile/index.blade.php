<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Akun Saya - Aksara</title>
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
            overflow: hidden;
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

        .topbar-left {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .back-btn {
            display: flex;
            align-items: center;
            gap: 6px;
            font-size: 13px;
            font-weight: 500;
            color: var(--text-soft);
            text-decoration: none;
            padding: 6px 12px;
            border: 1px solid var(--border);
            border-radius: var(--radius-sm);
            background: var(--cream);
            transition: all 0.15s;
        }

        .back-btn:hover {
            border-color: var(--sage);
            color: var(--sage);
        }

        .topbar-title {
            font-family: 'Lora', serif;
            font-size: 17px;
            font-weight: 600;
            color: var(--ink);
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

        /* ── SUCCESS ALERT ── */
        .alert-success {
            display: flex;
            align-items: center;
            gap: 10px;
            background: var(--mint);
            border: 1px solid #a7f3d0;
            border-radius: var(--radius-sm);
            color: #166534;
            font-size: 13.5px;
            font-weight: 500;
            padding: 12px 16px;
            margin-bottom: 24px;
        }

        /* ── PROFILE LAYOUT ── */
        .profile-layout {
            display: grid;
            grid-template-columns: 240px minmax(0, 1fr);
            gap: 20px;
            max-width: 920px;
        }

        /* ── AVATAR CARD ── */
        .avatar-card {
            background: var(--ink);
            border-radius: var(--radius-xl);
            padding: 30px 22px;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 14px;
            text-align: center;
            position: relative;
            overflow: hidden;
            align-self: start;
        }

        .avatar-card::before {
            content: '';
            position: absolute;
            top: -50px;
            right: -50px;
            width: 180px;
            height: 180px;
            background: radial-gradient(circle, rgba(181, 232, 83, 0.15) 0%, transparent 70%);
            pointer-events: none;
        }

        .avatar-card::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            height: 120px;
            background: radial-gradient(ellipse at 50% 110%, rgba(90, 138, 106, 0.18) 0%, transparent 65%);
            pointer-events: none;
        }

        .avatar-ring {
            position: relative;
            width: 100px;
            height: 100px;
            z-index: 1;
        }

        .avatar-ring::before {
            content: '';
            position: absolute;
            inset: -4px;
            border-radius: 50%;
            border: 2px dashed rgba(181, 232, 83, 0.35);
            animation: spin 18s linear infinite;
        }

        @keyframes spin {
            to { transform: rotate(360deg); }
        }

        .avatar-img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--sage), var(--lime-pop));
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 36px;
            font-weight: 700;
            color: var(--ink);
            overflow: hidden;
            position: relative;
            z-index: 1;
        }

        .avatar-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .avatar-edit-overlay {
            position: absolute;
            inset: 0;
            border-radius: 50%;
            background: rgba(0, 0, 0, 0.45);
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            transition: opacity 0.2s;
            cursor: pointer;
            z-index: 2;
        }

        .avatar-ring:hover .avatar-edit-overlay {
            opacity: 1;
        }

        .av-name {
            font-family: 'Lora', serif;
            font-size: 16px;
            font-weight: 600;
            color: white;
            line-height: 1.3;
            z-index: 1;
        }

        .av-role-badge {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            background: rgba(181, 232, 83, 0.15);
            border: 1px solid rgba(181, 232, 83, 0.25);
            color: var(--lime-pop);
            font-size: 11.5px;
            font-weight: 600;
            padding: 4px 12px;
            border-radius: 20px;
            z-index: 1;
        }

        .av-role-dot {
            width: 5px;
            height: 5px;
            background: var(--lime-pop);
            border-radius: 50%;
        }

        .av-nisn {
            font-size: 11.5px;
            color: rgba(255, 255, 255, 0.35);
            font-family: monospace;
            letter-spacing: 0.5px;
            z-index: 1;
        }

        .change-photo-btn {
            display: flex;
            align-items: center;
            gap: 7px;
            font-size: 12.5px;
            font-weight: 600;
            font-family: 'Sora', sans-serif;
            color: rgba(255, 255, 255, 0.6);
            padding: 8px 16px;
            border-radius: var(--radius-sm);
            border: 1px solid rgba(255, 255, 255, 0.12);
            background: rgba(255, 255, 255, 0.05);
            cursor: pointer;
            transition: all 0.18s;
            z-index: 1;
        }

        .change-photo-btn:hover {
            border-color: var(--lime-pop);
            color: var(--lime-pop);
            background: rgba(181, 232, 83, 0.08);
        }

        input[type="file"] {
            display: none;
        }

        .photo-preview {
            display: none;
            align-items: center;
            gap: 8px;
            z-index: 1;
            margin-top: -4px;
        }

        .photo-preview img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid var(--lime-pop);
        }

        .photo-preview-label {
            font-size: 11px;
            color: var(--lime-pop);
            font-weight: 500;
        }

        /* ── FORM CARD ── */
        .form-card {
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: var(--radius-xl);
            overflow: hidden;
        }

        .form-section {
            padding: 24px 28px;
            border-bottom: 1px solid var(--border);
        }

        .form-section:last-child {
            border-bottom: none;
        }

        .section-head {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 20px;
        }

        .section-icon {
            width: 34px;
            height: 34px;
            border-radius: 10px;
            background: var(--cream-dark);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--sage);
            flex-shrink: 0;
        }

        .section-title {
            font-family: 'Lora', serif;
            font-size: 15px;
            font-weight: 600;
            color: var(--ink);
        }

        .section-subtitle {
            font-size: 12px;
            color: var(--text-soft);
            margin-top: 1px;
        }

        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 16px;
        }

        .field {
            display: flex;
            flex-direction: column;
            gap: 7px;
        }

        .field.full {
            grid-column: span 2;
        }

        .field label {
            font-size: 12px;
            font-weight: 600;
            color: var(--text-soft);
            letter-spacing: 0.02em;
            display: flex;
            align-items: center;
            gap: 4px;
        }

        .required-dot {
            width: 4px;
            height: 4px;
            background: var(--sage);
            border-radius: 50%;
            display: inline-block;
        }

        .field input {
            font-family: 'Sora', sans-serif;
            font-size: 13.5px;
            padding: 10px 13px;
            border: 1.5px solid var(--border);
            border-radius: var(--radius-sm);
            background: var(--surface);
            color: var(--text);
            outline: none;
            transition: border-color 0.15s, box-shadow 0.15s;
            width: 100%;
        }

        .field input:focus {
            border-color: var(--sage);
            box-shadow: 0 0 0 3px rgba(90, 138, 106, 0.12);
        }

        .field input.readonly {
            background: var(--cream);
            color: var(--text-soft);
            cursor: not-allowed;
            border-style: dashed;
        }

        .field input::placeholder {
            color: #b0bcb5;
        }

        .hint {
            font-size: 11px;
            color: var(--text-soft);
        }

        /* ── FORM FOOTER ── */
        .form-footer {
            padding: 18px 28px;
            display: flex;
            align-items: center;
            justify-content: flex-end;
            gap: 10px;
            background: var(--cream);
            border-top: 1px solid var(--border);
        }

        .btn-cancel {
            font-family: 'Sora', sans-serif;
            font-size: 13px;
            font-weight: 600;
            padding: 9px 20px;
            border-radius: var(--radius-sm);
            border: 1.5px solid var(--border);
            background: var(--surface);
            color: var(--text-soft);
            cursor: pointer;
            transition: all 0.15s;
            text-decoration: none;
        }

        .btn-cancel:hover {
            border-color: var(--sage);
            color: var(--sage);
        }

        .btn-save {
            font-family: 'Sora', sans-serif;
            font-size: 13px;
            font-weight: 700;
            padding: 10px 24px;
            border-radius: var(--radius-sm);
            border: none;
            background: var(--ink);
            color: white;
            cursor: pointer;
            transition: all 0.18s;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .btn-save:hover {
            background: var(--ink-soft);
            transform: translateY(-1px);
            box-shadow: 0 6px 20px rgba(15, 28, 20, 0.2);
        }

        .btn-save:active {
            transform: translateY(0);
        }

        /* ── RESPONSIVE ── */
        @media (max-width: 900px) {
            :root { --sidebar-w: 64px; }

            .sidebar-top .sidebar-user,
            .sidebar-top .logo-text,
            .nav-item span,
            .nav-section-label,
            .logout-btn span {
                display: none;
            }

            .sidebar-top { padding: 20px 10px; }
            .sidebar-logo { justify-content: center; }
            .nav-item { justify-content: center; padding: 11px; }
            .nav-item.active::before { display: none; }
            .logout-btn { justify-content: center; padding: 11px; }
            .nav-wrap { padding: 12px 8px; }
            .sidebar-footer { padding: 10px 8px 20px; }
            .topbar, .content { padding-left: 18px; padding-right: 18px; }
        }

        @media (max-width: 700px) {
            .profile-layout { grid-template-columns: 1fr; }
            .form-grid { grid-template-columns: 1fr; }
            .field.full { grid-column: span 1; }
            .avatar-card { flex-direction: row; flex-wrap: wrap; justify-content: flex-start; text-align: left; padding: 20px; gap: 10px; }
            .avatar-card::before, .avatar-card::after { display: none; }
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
                    <div class="sidebar-avatar" style="padding:0;">
                        <img src="{{ Storage::url(Auth::user()->foto) }}" style="width:100%;height:100%;object-fit:cover;">
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
            <a href="{{ route('siswa.dashboard') }}" class="nav-item">
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
            <a href="{{ route('profile.index') }}" class="nav-item active">
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
            <div class="topbar-left">
                <a href="{{ Auth::user()->role == 'admin' ? route('admin.dashboard') : route('siswa.dashboard') }}" class="back-btn">
                    <i data-lucide="arrow-left" width="13" height="13"></i>
                    Dashboard
                </a>
                <span class="topbar-title">Akun Saya</span>
            </div>
            <div class="topbar-date">
                <i data-lucide="calendar" width="13" height="13"></i>
                <span id="todayDate"></span>
            </div>
        </header>

        <main class="content">

            @if (session('success'))
                <div class="alert-success">
                    <i data-lucide="check-circle" width="16" height="16"></i>
                    {{ session('success') }}
                </div>
            @endif

            <div class="profile-layout">

                {{-- ── AVATAR PANEL ── --}}
                <div class="avatar-card">
                    <div class="avatar-ring">
                        <div class="avatar-img" id="avatarBig">
                            @if ($user->foto)
                                <img src="{{ Storage::url($user->foto) }}" alt="Foto Profil">
                            @else
                                {{ strtoupper(substr($user->name, 0, 2)) }}
                            @endif
                        </div>
                        <div class="avatar-edit-overlay" onclick="document.getElementById('fotoInput').click()">
                            <i data-lucide="camera" width="20" height="20" style="color:white;"></i>
                        </div>
                    </div>

                    <div class="av-name" id="displayName">{{ $user->name }}</div>

                    <div class="av-role-badge">
                        <div class="av-role-dot"></div>
                        {{ ucfirst($user->role) }}
                    </div>

                    <div class="av-nisn">NISN · {{ $user->nisn }}</div>

                    <button class="change-photo-btn" type="button" onclick="document.getElementById('fotoInput').click()">
                        <i data-lucide="image-plus" width="13" height="13"></i>
                        Ganti Foto
                    </button>

                    <div class="photo-preview" id="photoPreview">
                        <img id="previewImg" src="" alt="Preview">
                        <span class="photo-preview-label">Foto baru dipilih</span>
                    </div>
                </div>

                {{-- ── FORM PANEL ── --}}
                <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <input type="file" name="foto" accept="image/*" id="fotoInput">

                    <div class="form-card">

                        {{-- Informasi Pribadi --}}
                        <div class="form-section">
                            <div class="section-head">
                                <div class="section-icon">
                                    <i data-lucide="user" width="16" height="16"></i>
                                </div>
                                <div>
                                    <div class="section-title">Informasi Pribadi</div>
                                    <div class="section-subtitle">Data dasar akun kamu</div>
                                </div>
                            </div>
                            <div class="form-grid">
                                <div class="field full">
                                    <label>
                                        Nama Lengkap
                                        <span class="required-dot"></span>
                                    </label>
                                    <input
                                        type="text"
                                        name="name"
                                        value="{{ old('name', $user->name) }}"
                                        placeholder="Nama lengkap kamu"
                                        required
                                        oninput="document.getElementById('displayName').textContent = this.value || '{{ $user->name }}'; document.getElementById('avatarBig').textContent = (this.value.trim().split(' ').slice(0,2).map(w=>w[0]||'').join('')).toUpperCase() || '??';">
                                </div>
                                <div class="field">
                                    <label>
                                        Email
                                        <span class="required-dot"></span>
                                    </label>
                                    <input
                                        type="email"
                                        name="email"
                                        value="{{ old('email', $user->email) }}"
                                        placeholder="email@kamu.com"
                                        required>
                                </div>
                                <div class="field">
                                    <label>
                                        Nomor Telepon
                                        <span class="required-dot"></span>
                                    </label>
                                    <input
                                        type="text"
                                        name="nomor_telepon"
                                        value="{{ old('nomor_telepon', $user->nomor_telepon) }}"
                                        placeholder="08xxxxxxxxxx"
                                        required>
                                </div>
                                <div class="field">
                                    <label>NISN</label>
                                    <input type="text" value="{{ $user->nisn }}" class="readonly" readonly disabled>
                                </div>
                                <div class="field">
                                    <label>Role</label>
                                    <input type="text" value="{{ ucfirst($user->role) }}" class="readonly" readonly disabled>
                                </div>
                            </div>
                        </div>

                        {{-- Ganti Password --}}
                        <div class="form-section">
                            <div class="section-head">
                                <div class="section-icon">
                                    <i data-lucide="lock" width="16" height="16"></i>
                                </div>
                                <div>
                                    <div class="section-title">Ganti Password</div>
                                    <div class="section-subtitle">Kosongkan jika tidak ingin mengganti</div>
                                </div>
                            </div>
                            <div class="form-grid">
                                <div class="field">
                                    <label>Password Baru</label>
                                    <input type="password" name="password" placeholder="••••••••">
                                </div>
                                <div class="field">
                                    <label>Konfirmasi Password Baru</label>
                                    <input type="password" name="password_confirmation" placeholder="••••••••">
                                </div>
                            </div>
                        </div>

                        {{-- Footer --}}
                        <div class="form-footer">
                            <a href="{{ Auth::user()->role == 'admin' ? route('admin.dashboard') : route('siswa.dashboard') }}" class="btn-cancel">
                                Batalkan
                            </a>
                            <button type="submit" class="btn-save">
                                <i data-lucide="save" width="14" height="14"></i>
                                Simpan Perubahan
                            </button>
                        </div>

                    </div>
                </form>

            </div>
        </main>
    </div>

    <script>
        lucide.createIcons();

        const opts = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
        document.getElementById('todayDate').textContent = new Date().toLocaleDateString('id-ID', opts);

        document.getElementById('fotoInput').addEventListener('change', function (e) {
            const preview = document.getElementById('photoPreview');
            const img = document.getElementById('previewImg');
            const avatarBig = document.getElementById('avatarBig');

            if (e.target.files && e.target.files[0]) {
                const reader = new FileReader();
                reader.onload = function (ev) {
                    img.src = ev.target.result;
                    preview.style.display = 'flex';
                    preview.style.alignItems = 'center';
                    preview.style.gap = '8px';

                    avatarBig.textContent = '';
                    avatarBig.style.fontSize = '0';
                    const imgEl = document.createElement('img');
                    imgEl.src = ev.target.result;
                    imgEl.style.cssText = 'width:100%;height:100%;object-fit:cover;border-radius:50%;';
                    avatarBig.appendChild(imgEl);
                };
                reader.readAsDataURL(e.target.files[0]);
            }
        });
    </script>

</body>
</html>