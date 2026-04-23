<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Anggota - Admin</title>
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
        .breadcrumb-sep     { color: var(--border); font-size: 14px; }
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
        .page-header p  { font-size: 13.5px; color: var(--text-muted); margin-top: 4px; }

        /* ─── LAYOUT ─── */
        .form-grid { display: grid; grid-template-columns: 1fr 300px; gap: 20px; align-items: start; }

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
        .card-body  { padding: 22px; }

        /* ─── FIELDS ─── */
        .field { margin-bottom: 18px; }
        .field:last-child { margin-bottom: 0; }
        .field-row { display: grid; grid-template-columns: 1fr 1fr; gap: 16px; }

        label {
            display: block; font-size: 13px; font-weight: 600;
            color: var(--text); margin-bottom: 6px;
        }
        label .required { color: #dc2626; margin-left: 2px; }
        label .hint     { font-weight: 400; color: var(--text-muted); font-size: 11.5px; margin-left: 4px; }

        .input-wrap { position: relative; }
        .input-wrap > svg {
            position: absolute; left: 12px; top: 50%; transform: translateY(-50%);
            color: var(--text-muted); pointer-events: none; z-index: 1;
        }
        .input-wrap input,
        .input-wrap select { padding-left: 38px !important; }
        .input-wrap .toggle-pw {
            position: absolute; right: 12px; top: 50%; transform: translateY(-50%);
            background: none; border: none; cursor: pointer; color: var(--text-muted);
            display: flex; align-items: center; padding: 0;
        }
        .input-wrap .toggle-pw:hover { color: var(--text); }

        input[type="text"],
        input[type="email"],
        input[type="password"],
        select {
            width: 100%; padding: 10px 14px;
            border: 1.5px solid var(--border); border-radius: var(--radius-sm);
            font-family: 'Plus Jakarta Sans', sans-serif; font-size: 14px;
            color: var(--text); background: var(--surface);
            transition: border-color 0.15s, box-shadow 0.15s; appearance: none;
        }
        input:focus, select:focus {
            outline: none; border-color: var(--border-focus);
            box-shadow: 0 0 0 3px rgba(61,153,112,0.12);
        }
        input::placeholder { color: #b4bfb8; }

        .error-msg { font-size: 12px; color: #dc2626; margin-top: 5px; display: flex; align-items: center; gap: 4px; }
        .input-error { border-color: #fca5a5 !important; }
        .input-error:focus { box-shadow: 0 0 0 3px rgba(239,68,68,0.10) !important; }

        /* ─── PROFILE CARD ─── */
        .profile-card {
            background: linear-gradient(135deg, var(--forest) 0%, var(--forest-soft) 100%);
            border-radius: var(--radius); padding: 28px 22px;
            display: flex; flex-direction: column; align-items: center; gap: 12px;
            text-align: center; margin-bottom: 20px; position: relative; overflow: hidden;
        }
        .profile-card::before {
            content: ''; position: absolute; right: -20px; bottom: -30px;
            width: 130px; height: 130px;
            background: radial-gradient(circle, rgba(163,230,53,0.10) 0%, transparent 70%);
        }
        .profile-avatar-lg {
            width: 72px; height: 72px; border-radius: 50%;
            display: flex; align-items: center; justify-content: center;
            font-size: 26px; font-weight: 700; color: white;
            border: 3px solid rgba(255,255,255,0.2);
        }
        .avatar-admin { background: linear-gradient(135deg, #92400e, #d97706); }
        .avatar-siswa { background: linear-gradient(135deg, var(--forest-mid), var(--green)); }
        .profile-name  { font-family: 'Playfair Display', serif; font-size: 18px; font-weight: 700; color: white; }
        .profile-email { font-size: 12.5px; color: rgba(255,255,255,0.55); }
        .profile-badge {
            display: inline-flex; align-items: center; gap: 5px;
            background: rgba(255,255,255,0.12); border: 1px solid rgba(255,255,255,0.15);
            color: rgba(255,255,255,0.85); font-size: 12px; font-weight: 600;
            padding: 4px 12px; border-radius: 20px; margin-top: 2px;
        }

        /* ─── ROLE OPTIONS ─── */
        .role-options { display: flex; flex-direction: column; gap: 10px; }
        .role-option {
            display: flex; align-items: center; gap: 12px; padding: 13px 15px;
            border: 1.5px solid var(--border); border-radius: var(--radius-sm);
            cursor: pointer; transition: all 0.15s;
        }
        .role-option:hover { border-color: var(--green); background: #f0fdf4; }
        .role-option input[type="radio"] { display: none; }
        .role-option.selected-admin { border-color: #fcd34d; background: #fffbeb; }
        .role-option.selected-siswa { border-color: #6ee7b7; background: #f0fdf4; }
        .role-icon {
            width: 36px; height: 36px; border-radius: 9px; flex-shrink: 0;
            display: flex; align-items: center; justify-content: center; transition: all 0.15s;
        }
        .role-icon-admin { background: #fef3c7; color: #d97706; }
        .role-icon-siswa { background: var(--green-light); color: var(--green); }
        .role-option.selected-admin .role-icon-admin { background: #d97706; color: white; }
        .role-option.selected-siswa .role-icon-siswa { background: var(--green); color: white; }
        .role-label { font-weight: 600; font-size: 14px; color: var(--forest); }
        .role-desc  { font-size: 12px; color: var(--text-muted); margin-top: 1px; }

        /* ─── PASSWORD STRENGTH ─── */
        .pw-strength { margin-top: 8px; }
        .pw-bars { display: flex; gap: 4px; margin-bottom: 4px; }
        .pw-bar {
            height: 3px; flex: 1; border-radius: 2px;
            background: var(--border); transition: background 0.2s;
        }
        .pw-bar.active-weak   { background: #ef4444; }
        .pw-bar.active-medium { background: #f59e0b; }
        .pw-bar.active-strong { background: var(--green); }
        .pw-hint { font-size: 11.5px; color: var(--text-muted); }

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
        <a href="{{ route('admin.books.index') }}" class="nav-item">
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
        <a href="{{ route('admin.users.index') }}" class="nav-item active">
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
            <a href="{{ route('admin.users.index') }}" class="breadcrumb-link">
                <i data-lucide="users" width="14" height="14"></i>
                Anggota
            </a>
            <span class="breadcrumb-sep">/</span>
            <span class="breadcrumb-current">Edit Anggota</span>
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
            <h1>Edit Anggota</h1>
            <p>Perbarui data anggota: <strong>{{ $user->name }}</strong></p>
        </div>

        <form method="POST" action="{{ route('admin.users.update', $user) }}">
            @csrf @method('PUT')

            <div class="form-grid">

                {{-- ─── KOLOM KIRI ─── --}}
                <div>

                    {{-- Informasi Pribadi --}}
                    <div class="card">
                        <div class="card-header">
                            <i data-lucide="user" width="16" height="16" style="color:var(--green)"></i>
                            <span class="card-title">Informasi Pribadi</span>
                        </div>
                        <div class="card-body">

                            <div class="field">
                                <label>Nama Lengkap <span class="required">*</span></label>
                                <div class="input-wrap">
                                    <i data-lucide="user" width="15" height="15"></i>
                                    <input type="text" name="name"
                                        value="{{ old('name', $user->name) }}"
                                        placeholder="Nama lengkap"
                                        class="{{ $errors->has('name') ? 'input-error' : '' }}"
                                        id="nameInput"
                                        oninput="updatePreview()"
                                        required>
                                </div>
                                @error('name')
                                    <div class="error-msg"><i data-lucide="circle-alert" width="12" height="12"></i> {{ $message }}</div>
                                @enderror
                            </div>

                                <div class="field">
                                    <label>Nomor Telepon <span class="required">*</span></label>
                                    <div class="input-wrap">
                                        <i data-lucide="phone" width="15" height="15"></i>
                                        <input type="text" name="nomor_telepon"
                                            value="{{ old('nomor_telepon', $user->nomor_telepon) }}"
                                            placeholder="08xx-xxxx-xxxx"
                                            class="{{ $errors->has('nomor_telepon') ? 'input-error' : '' }}"
                                            required>
                                    </div>
                                    @error('nomor_telepon')
                                        <div class="error-msg"><i data-lucide="circle-alert" width="12" height="12"></i> {{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="field">
                                <label>Email <span class="required">*</span></label>
                                <div class="input-wrap">
                                    <i data-lucide="mail" width="15" height="15"></i>
                                    <input type="email" name="email"
                                        value="{{ old('email', $user->email) }}"
                                        placeholder="contoh@email.com"
                                        class="{{ $errors->has('email') ? 'input-error' : '' }}"
                                        oninput="updatePreview()"
                                        required>
                                </div>
                                @error('email')
                                    <div class="error-msg"><i data-lucide="circle-alert" width="12" height="12"></i> {{ $message }}</div>
                                @enderror
                            </div>

                        </div>
                    </div>

                    {{-- Keamanan Akun --}}
                    <div class="card">
                        <div class="card-header">
                            <i data-lucide="lock" width="16" height="16" style="color:var(--green)"></i>
                            <span class="card-title">Keamanan Akun</span>
                        </div>
                        <div class="card-body">

                            <div class="field">
                                <label>Password Baru <span class="hint">(kosongkan jika tidak diubah)</span></label>
                                <div class="input-wrap">
                                    <i data-lucide="lock" width="15" height="15"></i>
                                    <input type="password" name="password" id="pwInput"
                                        placeholder="Masukkan password baru"
                                        class="{{ $errors->has('password') ? 'input-error' : '' }}"
                                        oninput="checkStrength(this.value)"
                                        style="padding-right: 42px !important;">
                                    <button type="button" class="toggle-pw" onclick="togglePw('pwInput', 'pwEye')">
                                        <i data-lucide="eye" width="16" height="16" id="pwEye"></i>
                                    </button>
                                </div>
                                <div class="pw-strength" id="pwStrength" style="display:none;">
                                    <div class="pw-bars">
                                        <div class="pw-bar" id="bar1"></div>
                                        <div class="pw-bar" id="bar2"></div>
                                        <div class="pw-bar" id="bar3"></div>
                                        <div class="pw-bar" id="bar4"></div>
                                    </div>
                                    <span class="pw-hint" id="pwHint">Masukkan password</span>
                                </div>
                                @error('password')
                                    <div class="error-msg"><i data-lucide="circle-alert" width="12" height="12"></i> {{ $message }}</div>
                                @enderror
                            </div>

                            <div class="field">
                                <label>Konfirmasi Password</label>
                                <div class="input-wrap">
                                    <i data-lucide="lock-keyhole" width="15" height="15"></i>
                                    <input type="password" name="password_confirmation" id="pwConfirm"
                                        placeholder="Ulangi password baru"
                                        style="padding-right: 42px !important;">
                                    <button type="button" class="toggle-pw" onclick="togglePw('pwConfirm', 'pwConfirmEye')">
                                        <i data-lucide="eye" width="16" height="16" id="pwConfirmEye"></i>
                                    </button>
                                </div>
                            </div>

                        </div>
                    </div>

                    {{-- Form Actions --}}
                    <div class="card">
                        <div class="form-actions">
                            <button type="submit" class="btn btn-green">
                                <i data-lucide="save" width="15" height="15"></i>
                                Simpan Perubahan
                            </button>
                            <a href="{{ route('admin.users.index') }}" class="btn btn-ghost">
                                <i data-lucide="x" width="15" height="15"></i>
                                Batal
                            </a>
                        </div>
                    </div>

                </div>

                {{-- ─── KOLOM KANAN ─── --}}
                <div>

                    {{-- Profile Preview --}}
                    <div class="profile-card" id="profileCard">
                        <div class="profile-avatar-lg {{ $user->role === 'admin' ? 'avatar-admin' : 'avatar-siswa' }}" id="profileAvatar">
                            {{ strtoupper(substr($user->name, 0, 1)) }}
                        </div>
                        <div>
                            <div class="profile-name" id="profileName">{{ $user->name }}</div>
                            <div class="profile-email" id="profileEmail">{{ $user->email }}</div>
                        </div>
                        <div class="profile-badge" id="profileBadge">
                            <i data-lucide="{{ $user->role === 'admin' ? 'shield' : 'user' }}" width="12" height="12" id="profileBadgeIcon"></i>
                            <span id="profileRole">{{ ucfirst($user->role) }}</span>
                        </div>
                    </div>

                    {{-- Role --}}
                    <div class="card">
                        <div class="card-header">
                            <i data-lucide="shield" width="16" height="16" style="color:var(--green)"></i>
                            <span class="card-title">Role Akun</span>
                        </div>
                        <div class="card-body">
                            <div class="role-options">
                                @php $currentRole = old('role', $user->role); @endphp

                                <label class="role-option {{ $currentRole === 'peminjam' ? 'selected-siswa' : '' }}"
                                       onclick="selectRole(this, 'peminjam', 'selected-siswa', 'Peminjam (Siswa)')">
                                    <input type="radio" name="role" value="peminjam" {{ $currentRole === 'peminjam' ? 'checked' : '' }}>
                                    <div class="role-icon role-icon-siswa">
                                        <i data-lucide="user" width="17" height="17"></i>
                                    </div>
                                    <div>
                                        <div class="role-label">Peminjam</div>
                                        <div class="role-desc">Dapat meminjam buku</div>
                                    </div>
                                </label>

                                <label class="role-option {{ $currentRole === 'admin' ? 'selected-admin' : '' }}"
                                       onclick="selectRole(this, 'admin', 'selected-admin', 'Admin')">
                                    <input type="radio" name="role" value="admin" {{ $currentRole === 'admin' ? 'checked' : '' }}>
                                    <div class="role-icon role-icon-admin">
                                        <i data-lucide="shield" width="17" height="17"></i>
                                    </div>
                                    <div>
                                        <div class="role-label">Admin</div>
                                        <div class="role-desc">Akses penuh sistem</div>
                                    </div>
                                </label>

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

// Live preview
function updatePreview() {
    const name  = document.getElementById('nameInput').value || '{{ $user->name }}';
    const email = document.querySelector('input[name="email"]').value || '{{ $user->email }}';
    document.getElementById('profileName').textContent  = name;
    document.getElementById('profileEmail').textContent = email;
    document.getElementById('profileAvatar').textContent = name.charAt(0).toUpperCase();
}

// Role selection
function selectRole(el, value, selClass, label) {
    document.querySelectorAll('.role-option').forEach(o => {
        o.classList.remove('selected-admin', 'selected-siswa');
    });
    el.classList.add(selClass);
    el.querySelector('input[type="radio"]').checked = true;
    document.getElementById('profileRole').textContent = label;

    const iconName = value === 'admin' ? 'shield' : 'user';
    document.getElementById('profileBadgeIcon').setAttribute('data-lucide', iconName);

    const avatar = document.getElementById('profileAvatar');
    avatar.classList.remove('avatar-admin', 'avatar-siswa');
    avatar.classList.add(value === 'admin' ? 'avatar-admin' : 'avatar-siswa');

    lucide.createIcons();
}

// Toggle password visibility
function togglePw(inputId, iconId) {
    const input = document.getElementById(inputId);
    const icon  = document.getElementById(iconId);
    if (input.type === 'password') {
        input.type = 'text';
        icon.setAttribute('data-lucide', 'eye-off');
    } else {
        input.type = 'password';
        icon.setAttribute('data-lucide', 'eye');
    }
    lucide.createIcons();
}

// Password strength
function checkStrength(val) {
    const strength = document.getElementById('pwStrength');
    const bars = [document.getElementById('bar1'), document.getElementById('bar2'),
                  document.getElementById('bar3'), document.getElementById('bar4')];
    const hint = document.getElementById('pwHint');

    bars.forEach(b => b.className = 'pw-bar');

    if (!val) { strength.style.display = 'none'; return; }
    strength.style.display = 'block';

    let score = 0;
    if (val.length >= 8)            score++;
    if (/[A-Z]/.test(val))          score++;
    if (/[0-9]/.test(val))          score++;
    if (/[^A-Za-z0-9]/.test(val))   score++;

    const cls   = score <= 1 ? 'active-weak' : score <= 2 ? 'active-medium' : 'active-strong';
    const label = score <= 1 ? 'Lemah' : score <= 2 ? 'Cukup' : score === 3 ? 'Kuat' : 'Sangat Kuat';

    for (let i = 0; i < score; i++) bars[i].classList.add(cls);
    hint.textContent = label;
    hint.style.color = score <= 1 ? '#ef4444' : score <= 2 ? '#f59e0b' : 'var(--green)';
}
</script>
</body>
</html>