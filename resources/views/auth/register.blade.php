<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Daftar Akun - Aksara</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link
        href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,600;0,700;1,400;1,600&family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
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
            --lime-soft: #ecfccb;
            --sand: #f5f0e8;
            --sand-2: #ede7d9;
            --bg: #f7f4ef;
            --surface: #ffffff;
            --text: #1c2b22;
            --text-muted: #6b7c72;
            --border: #e0d9ce;
        }

        html,
        body {
            min-height: 100%;
            background: var(--bg);
            font-family: 'Plus Jakarta Sans', sans-serif;
            color: var(--text);
        }

        /* grain */
        body::before {
            content: '';
            position: fixed;
            inset: 0;
            z-index: 0;
            opacity: 0.028;
            background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='noise'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23noise)'/%3E%3C/svg%3E");
            background-size: 200px;
            pointer-events: none;
        }

        .page {
            position: relative;
            z-index: 1;
            min-height: 100vh;
            display: grid;
            grid-template-columns: 1fr 1fr;
        }

        /* ── LEFT PANEL ── */
        .left-panel {
            background: var(--forest);
            padding: 48px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            position: sticky;
            top: 0;
            height: 100vh;
            overflow: hidden;
        }

        .left-panel::before {
            content: '';
            position: absolute;
            top: -100px;
            right: -100px;
            width: 420px;
            height: 420px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(163, 230, 53, 0.08) 0%, transparent 65%);
            pointer-events: none;
        }

        .left-panel::after {
            content: '';
            position: absolute;
            bottom: -60px;
            left: -60px;
            width: 300px;
            height: 300px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(61, 153, 112, 0.14) 0%, transparent 65%);
            pointer-events: none;
        }

        /* Brand */
        .left-brand {
            display: flex;
            align-items: center;
            gap: 13px;
            position: relative;
            z-index: 1;
        }

        .brand-mark {
            width: 40px;
            height: 40px;
            background: rgba(163, 230, 53, 0.12);
            border: 1px solid rgba(163, 230, 53, 0.22);
            border-radius: 11px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--lime);
        }

        .brand-name-text {
            font-family: 'Playfair Display', serif;
            font-size: 18px;
            font-weight: 700;
            color: white;
            line-height: 1.2;
        }

        .brand-name-text span {
            display: block;
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-size: 10.5px;
            font-weight: 500;
            color: rgba(255, 255, 255, 0.32);
            letter-spacing: 0.10em;
            text-transform: uppercase;
            margin-top: 1px;
        }

        /* Main content */
        .left-content {
            position: relative;
            z-index: 1;
        }

        .left-quote {
            font-family: 'Playfair Display', serif;
            font-size: 40px;
            font-weight: 700;
            color: white;
            line-height: 1.18;
            margin-bottom: 18px;
        }

        .left-quote em {
            font-style: italic;
            color: var(--lime);
        }

        .left-sub {
            font-size: 14px;
            color: rgba(255, 255, 255, 0.42);
            line-height: 1.75;
            font-weight: 300;
            max-width: 300px;
        }

        /* Steps */
        .steps-list {
            margin-top: 44px;
            display: flex;
            flex-direction: column;
            gap: 18px;
            position: relative;
            z-index: 1;
        }

        .step-item {
            display: flex;
            align-items: flex-start;
            gap: 14px;
        }

        .step-num {
            width: 28px;
            height: 28px;
            border-radius: 50%;
            flex-shrink: 0;
            border: 1px solid rgba(163, 230, 53, 0.28);
            background: rgba(163, 230, 53, 0.07);
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Playfair Display', serif;
            font-size: 13px;
            color: var(--lime);
        }

        .step-text {
            font-size: 13.5px;
            color: rgba(255, 255, 255, 0.42);
            line-height: 1.65;
            padding-top: 4px;
            font-weight: 300;
        }

        .step-text strong {
            color: rgba(255, 255, 255, 0.78);
            font-weight: 600;
        }

        /* Footer */
        .left-footer {
            position: relative;
            z-index: 1;
        }

        .left-footer-text {
            font-size: 12px;
            color: rgba(255, 255, 255, 0.18);
        }

        /* ── RIGHT PANEL ── */
        .right-panel {
            display: flex;
            align-items: flex-start;
            justify-content: center;
            padding: 52px 48px;
            background: var(--bg);
            overflow-y: auto;
            position: relative;
        }

        .right-panel::before {
            content: '';
            position: fixed;
            bottom: -80px;
            right: -80px;
            width: 340px;
            height: 340px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(61, 153, 112, 0.06) 0%, transparent 65%);
            pointer-events: none;
        }

        .form-box {
            width: 100%;
            max-width: 400px;
            position: relative;
            z-index: 1;
        }

        /* Form Header */
        .form-header {
            margin-bottom: 30px;
        }

        .form-eyebrow {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            background: var(--green-light);
            border: 1px solid #6ee7b7;
            padding: 4px 13px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: 600;
            color: #065f46;
            letter-spacing: 0.08em;
            text-transform: uppercase;
            margin-bottom: 16px;
        }

        .form-eyebrow-dot {
            width: 5px;
            height: 5px;
            border-radius: 50%;
            background: var(--green);
        }

        .form-title {
            font-family: 'Playfair Display', serif;
            font-size: 34px;
            font-weight: 700;
            color: var(--forest);
            line-height: 1.1;
            margin-bottom: 8px;
        }

        .form-title em {
            font-style: italic;
            color: var(--green);
        }

        .form-sub {
            font-size: 13.5px;
            color: var(--text-muted);
            font-weight: 400;
            line-height: 1.65;
        }

        /* Fields */
        .field {
            margin-bottom: 17px;
        }

        .field label {
            display: block;
            font-size: 11.5px;
            font-weight: 700;
            color: var(--text-muted);
            margin-bottom: 7px;
            letter-spacing: 0.06em;
            text-transform: uppercase;
        }

        .field-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 14px;
        }

        .input-wrap {
            position: relative;
        }

        .input-wrap svg {
            position: absolute;
            left: 13px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--text-muted);
            pointer-events: none;
            opacity: 0.5;
        }

        .input-wrap .toggle-pw {
            position: absolute;
            right: 12px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            cursor: pointer;
            color: var(--text-muted);
            opacity: 0.45;
            padding: 0;
            transition: opacity 0.15s;
            display: flex;
            align-items: center;
        }

        .input-wrap .toggle-pw:hover {
            opacity: 1;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"],
        input[type="tel"] {
            width: 100%;
            padding: 11px 14px 11px 40px;
            border: 1.5px solid var(--border);
            border-radius: 9px;
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-size: 14px;
            color: var(--text);
            background: white;
            transition: border-color 0.18s, box-shadow 0.18s;
        }

        input:focus {
            outline: none;
            border-color: var(--green);
            box-shadow: 0 0 0 3px rgba(61, 153, 112, 0.12);
        }

        input::placeholder {
            color: #b0bdb5;
        }

        input.has-toggle {
            padding-right: 42px;
        }

        /* Error */
        .error-msg {
            font-size: 12px;
            color: #b03a1c;
            margin-top: 5px;
            display: flex;
            align-items: center;
            gap: 4px;
        }

        /* Divider */
        .section-divider {
            display: flex;
            align-items: center;
            gap: 12px;
            margin: 6px 0 18px;
        }

        .divider-line {
            flex: 1;
            height: 1px;
            background: var(--border);
        }

        .divider-label {
            font-size: 11px;
            color: var(--text-muted);
            font-weight: 600;
            letter-spacing: 0.07em;
            text-transform: uppercase;
        }

        /* Submit */
        .btn-submit {
            width: 100%;
            padding: 13px;
            background: var(--forest);
            color: var(--lime);
            border: none;
            border-radius: 9px;
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-size: 15px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 9px;
            margin-top: 4px;
            box-shadow: 0 2px 12px rgba(26, 58, 42, 0.18);
        }

        .btn-submit:hover {
            background: var(--forest-soft);
            transform: translateY(-1px);
            box-shadow: 0 6px 20px rgba(26, 58, 42, 0.26);
        }

        .btn-submit svg {
            transition: transform 0.18s;
        }

        .btn-submit:hover svg {
            transform: translateX(3px);
        }

        .form-footer {
            margin-top: 20px;
            text-align: center;
            font-size: 13.5px;
            color: var(--text-muted);
        }

        .form-footer a {
            color: var(--green);
            text-decoration: none;
            font-weight: 600;
        }

        .form-footer a:hover {
            text-decoration: underline;
        }

        /* Reveal */
        .reveal {
            opacity: 0;
            transform: translateY(14px);
            animation: revealUp 0.6s ease forwards;
        }

        @keyframes revealUp {
            to {
                opacity: 1;
                transform: none;
            }
        }

        .d1 {
            animation-delay: 0.05s;
        }

        .d2 {
            animation-delay: 0.14s;
        }

        .d3 {
            animation-delay: 0.23s;
        }

        .d4 {
            animation-delay: 0.32s;
        }

        .d5 {
            animation-delay: 0.41s;
        }

        .d6 {
            animation-delay: 0.50s;
        }

        .d7 {
            animation-delay: 0.58s;
        }

        /* ── RESPONSIVE ── */
        @media (max-width: 768px) {
            .page {
                grid-template-columns: 1fr;
            }

            .left-panel {
                display: none;
            }

            .right-panel {
                padding: 40px 24px 60px;
            }
        }

        @media (max-width: 500px) {
            .field-row {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>
    <div class="page">

        {{-- ── LEFT ── --}}
        <div class="left-panel">
            <div class="left-brand">
                <div class="brand-mark">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z" />
                        <path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z" />
                    </svg>
                </div>
                <div class="brand-name-text">
                    Aksara
                    <span>Perpustakaan Digital</span>
                </div>
            </div>

            <div class="left-content">
                <div class="left-quote">
                    Mulai perjalanan<br><em>literasimu</em><br>hari ini.
                </div>
                <div class="left-sub">
                    Daftar sekarang dan nikmati kemudahan meminjam buku favorit langsung dari genggamanmu.
                </div>
                <div class="steps-list">
                    <div class="step-item">
                        <div class="step-num">1</div>
                        <div class="step-text"><strong>Buat akun</strong> dengan data dirimu yang valid.</div>
                    </div>
                    <div class="step-item">
                        <div class="step-num">2</div>
                        <div class="step-text"><strong>Jelajahi katalog</strong> dan temukan buku yang kamu mau.</div>
                    </div>
                    <div class="step-item">
                        <div class="step-num">3</div>
                        <div class="step-text"><strong>Ajukan peminjaman</strong> dan tunggu konfirmasi petugas.</div>
                    </div>
                </div>
            </div>

            <div class="left-footer">
                <div class="left-footer-text">© {{ date('Y') }} Aksara</div>
            </div>
        </div>

        {{-- ── RIGHT ── --}}
        <div class="right-panel">
            <div class="form-box">

                <div class="form-header reveal d1">
                    <div class="form-eyebrow">
                        <span class="form-eyebrow-dot"></span>
                        Pendaftaran Baru
                    </div>
                    <div class="form-title">Buat <em>Akun</em><br>Perpustakaan</div>
                    <div class="form-sub">Isi data diri kamu untuk mendaftar sebagai anggota perpustakaan.</div>
                </div>

                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    {{-- Nama --}}
                    <div class="field reveal d2">
                        <label>Nama Lengkap</label>
                        <div class="input-wrap">
                            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2" />
                                <circle cx="12" cy="7" r="4" />
                            </svg>
                            <input type="text" name="name" value="{{ old('name') }}"
                                placeholder="Nama lengkap kamu" required autocomplete="name">
                        </div>
                        @error('name')
                            <div class="error-msg">
                                <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2">
                                    <circle cx="12" cy="12" r="10" />
                                    <line x1="12" y1="8" x2="12" y2="12" />
                                    <line x1="12" y1="16" x2="12.01" y2="16" />
                                </svg>
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    {{-- NISN & Telepon --}}
                    <div class="field-row reveal d3">
                        <div class="field" style="margin-bottom:0">
                            <label>NISN</label>
                            <div class="input-wrap">
                                <svg width="15" height="15" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="1.8" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <line x1="4" y1="9" x2="20" y2="9" />
                                    <line x1="4" y1="15" x2="20" y2="15" />
                                    <line x1="10" y1="3" x2="8" y2="21" />
                                    <line x1="16" y1="3" x2="14" y2="21" />
                                </svg>
                                <input type="text" name="nisn" value="{{ old('nisn') }}"
                                    placeholder="Nomor NISN" required>
                            </div>
                            @error('nisn')
                                <div class="error-msg">
                                    <svg width="12" height="12" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="2">
                                        <circle cx="12" cy="12" r="10" />
                                        <line x1="12" y1="8" x2="12" y2="12" />
                                        <line x1="12" y1="16" x2="12.01" y2="16" />
                                    </svg>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="field" style="margin-bottom:0">
                            <label>No. Telepon</label>
                            <div class="input-wrap">
                                <svg width="15" height="15" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="1.8" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <path
                                        d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 4.69 12a19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 3.6 1.18h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 8.91a16 16 0 0 0 6 6l.82-.82a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z" />
                                </svg>
                                <input type="text" name="nomor_telepon" value="{{ old('nomor_telepon') }}"
                                    placeholder="08xx-xxxx-xxxx" required>
                            </div>
                            @error('nomor_telepon')
                                <div class="error-msg">
                                    <svg width="12" height="12" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="2">
                                        <circle cx="12" cy="12" r="10" />
                                        <line x1="12" y1="8" x2="12" y2="12" />
                                        <line x1="12" y1="16" x2="12.01" y2="16" />
                                    </svg>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="section-divider reveal d3">
                        <div class="divider-line"></div>
                        <div class="divider-label">Akun & Keamanan</div>
                        <div class="divider-line"></div>
                    </div>

                    {{-- Email --}}
                    <div class="field reveal d4">
                        <label>Email</label>
                        <div class="input-wrap">
                            <svg width="15" height="15" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="1.8" stroke-linecap="round"
                                stroke-linejoin="round">
                                <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z" />
                                <polyline points="22,6 12,13 2,6" />
                            </svg>
                            <input type="email" name="email" value="{{ old('email') }}"
                                placeholder="nama@email.com" required autocomplete="email">
                        </div>
                        @error('email')
                            <div class="error-msg">
                                <svg width="12" height="12" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2">
                                    <circle cx="12" cy="12" r="10" />
                                    <line x1="12" y1="8" x2="12" y2="12" />
                                    <line x1="12" y1="16" x2="12.01" y2="16" />
                                </svg>
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    {{-- Password --}}
                    <div class="field-row reveal d5">
                        <div class="field" style="margin-bottom:0">
                            <label>Password</label>
                            <div class="input-wrap">
                                <svg width="15" height="15" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="1.8" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <rect x="3" y="11" width="18" height="11" rx="2"
                                        ry="2" />
                                    <path d="M7 11V7a5 5 0 0 1 10 0v4" />
                                </svg>
                                <input type="password" name="password" id="pw1" placeholder="Min. 8 karakter"
                                    required autocomplete="new-password" class="has-toggle">
                                <button type="button" class="toggle-pw" onclick="togglePw('pw1','eye1')">
                                    <svg id="eye1" width="15" height="15" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="1.8"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z" />
                                        <circle cx="12" cy="12" r="3" />
                                    </svg>
                                </button>
                            </div>
                            @error('password')
                                <div class="error-msg">
                                    <svg width="12" height="12" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="2">
                                        <circle cx="12" cy="12" r="10" />
                                        <line x1="12" y1="8" x2="12" y2="12" />
                                        <line x1="12" y1="16" x2="12.01" y2="16" />
                                    </svg>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="field" style="margin-bottom:0">
                            <label>Konfirmasi</label>
                            <div class="input-wrap">
                                <svg width="15" height="15" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="1.8" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z" />
                                </svg>
                                <input type="password" name="password_confirmation" id="pw2"
                                    placeholder="Ulangi password" required autocomplete="new-password"
                                    class="has-toggle">
                                <button type="button" class="toggle-pw" onclick="togglePw('pw2','eye2')">
                                    <svg id="eye2" width="15" height="15" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="1.8"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z" />
                                        <circle cx="12" cy="12" r="3" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>

                    <div style="margin-top: 22px;">
                        <button type="submit" class="btn-submit reveal d6">
                            Buat Akun Sekarang
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round">
                                <path d="M5 12h14M12 5l7 7-7 7" />
                            </svg>
                        </button>
                    </div>

                    <div class="form-footer reveal d7">
                        Sudah punya akun? <a href="{{ route('login') }}">Masuk di sini</a>
                    </div>

                </form>
            </div>
        </div>

    </div>

    <script>
        function togglePw(inputId, iconId) {
            const input = document.getElementById(inputId);
            const icon = document.getElementById(iconId);
            const isHidden = input.type === 'password';
            input.type = isHidden ? 'text' : 'password';
            icon.innerHTML = isHidden ?
                '<path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24"/><line x1="1" y1="1" x2="23" y2="23"/>' :
                '<path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/>';
        }
    </script>
</body>

</html>
