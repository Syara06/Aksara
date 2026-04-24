<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Masuk ke Akun Saya - Aksara</title>
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
            --green-light: #d1fae5;
            --lime: #a3e635;
            --sand: #f5f0e8;
            --sand-2: #ede7d9;
            --bg: #f7f4ef;
            --surface: #ffffff;
            --text: #1c2b22;
            --text-muted: #6b7c72;
            --border: #e0d9ce;
            --radius: 14px;
            --radius-sm: 9px;
        }

        html,
        body {
            height: 100%;
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
            position: relative;
            overflow: hidden;
        }

        .left-panel::before {
            content: '';
            position: absolute;
            top: -120px;
            right: -120px;
            width: 420px;
            height: 420px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(163, 230, 53, 0.08) 0%, transparent 65%);
        }

        .left-panel::after {
            content: '';
            position: absolute;
            bottom: -80px;
            left: -80px;
            width: 320px;
            height: 320px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(61, 153, 112, 0.10) 0%, transparent 65%);
        }

        .left-brand {
            display: flex;
            align-items: center;
            gap: 13px;
            position: relative;
            z-index: 1;
        }

        .brand-mark {
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
            font-size: 11px;
            font-weight: 400;
            color: rgba(255, 255, 255, 0.35);
            letter-spacing: 0.10em;
            text-transform: uppercase;
            margin-top: 2px;
        }

        .left-content {
            position: relative;
            z-index: 1;
        }

        .left-quote {
            font-family: 'Playfair Display', serif;
            font-size: 44px;
            font-weight: 700;
            color: white;
            line-height: 1.12;
            margin-bottom: 20px;
            letter-spacing: -0.01em;
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
            max-width: 320px;
        }

        /* book stack */
        .book-stack {
            display: flex;
            flex-direction: column;
            gap: 10px;
            margin-top: 44px;
            position: relative;
            z-index: 1;
        }

        .book-spine-deco {
            height: 46px;
            border-radius: 9px;
            display: flex;
            align-items: center;
            padding: 0 16px;
            font-family: 'Playfair Display', serif;
            font-size: 13.5px;
            font-style: italic;
            transition: transform 0.2s;
            font-weight: 400;
        }

        .book-spine-deco:hover {
            transform: translateX(5px);
        }

        .bs-1 {
            background: rgba(163, 230, 53, 0.12);
            border: 1px solid rgba(163, 230, 53, 0.2);
            color: rgba(163, 230, 53, 0.75);
            width: 80%;
        }

        .bs-2 {
            background: rgba(61, 153, 112, 0.15);
            border: 1px solid rgba(61, 153, 112, 0.25);
            color: rgba(255, 255, 255, 0.5);
            width: 65%;
        }

        .bs-3 {
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            color: rgba(255, 255, 255, 0.35);
            width: 72%;
        }

        .left-footer {
            position: relative;
            z-index: 1;
        }

        .left-footer-text {
            font-size: 12px;
            color: rgba(255, 255, 255, 0.18);
            line-height: 1.6;
        }

        /* ── RIGHT PANEL ── */
        .right-panel {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 48px;
            background: var(--bg);
            position: relative;
        }

        .right-panel::before {
            content: '';
            position: absolute;
            bottom: -100px;
            right: -100px;
            width: 350px;
            height: 350px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(61, 153, 112, 0.07) 0%, transparent 65%);
        }

        .form-box {
            width: 100%;
            max-width: 380px;
            position: relative;
            z-index: 1;
        }

        .form-header {
            margin-bottom: 36px;
        }

        .form-eyebrow {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            background: var(--green-light);
            border: 1px solid #6ee7b7;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: 600;
            color: #065f46;
            letter-spacing: 0.08em;
            text-transform: uppercase;
            margin-bottom: 18px;
        }

        .form-eyebrow-dot {
            width: 5px;
            height: 5px;
            border-radius: 50%;
            background: var(--green);
        }

        .form-title {
            font-family: 'Playfair Display', serif;
            font-size: 40px;
            font-weight: 700;
            color: var(--forest);
            line-height: 1.1;
            margin-bottom: 10px;
            letter-spacing: -0.01em;
        }

        .form-title em {
            font-style: italic;
            color: var(--green);
        }

        .form-sub {
            font-size: 14px;
            color: var(--text-muted);
            font-weight: 300;
            line-height: 1.65;
        }

        /* Fields */
        .field {
            margin-bottom: 20px;
        }

        .field label {
            display: block;
            font-size: 12px;
            font-weight: 700;
            color: var(--text-muted);
            margin-bottom: 7px;
            letter-spacing: 0.06em;
            text-transform: uppercase;
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
            opacity: 0.55;
        }

        .input-wrap .toggle-pw {
            position: absolute;
            right: 13px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            cursor: pointer;
            color: var(--text-muted);
            opacity: 0.5;
            padding: 0;
            transition: opacity 0.15s;
        }

        .input-wrap .toggle-pw:hover {
            opacity: 1;
        }

        input[type="email"],
        input[type="password"],
        input[type="text"] {
            width: 100%;
            padding: 11px 14px 11px 40px;
            border: 1.5px solid var(--border);
            border-radius: var(--radius-sm);
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-size: 14.5px;
            color: var(--text);
            background: var(--surface);
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

        .error-msg {
            font-size: 12px;
            color: #dc2626;
            margin-top: 5px;
            display: flex;
            align-items: center;
            gap: 4px;
        }

        /* Remember row */
        .extras-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 24px;
        }

        .remember-label {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 13px;
            color: var(--text-muted);
            cursor: pointer;
        }

        .remember-label input[type="checkbox"] {
            width: 16px;
            height: 16px;
            padding: 0;
            accent-color: var(--green);
            cursor: pointer;
        }

        .forgot-link {
            font-size: 13px;
            color: var(--green);
            text-decoration: none;
            font-weight: 600;
        }

        .forgot-link:hover {
            text-decoration: underline;
        }

        /* Submit button */
        .btn-submit {
            width: 100%;
            padding: 13px;
            background: var(--forest);
            color: var(--lime);
            border: none;
            border-radius: var(--radius-sm);
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-size: 15px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 9px;
            letter-spacing: 0.01em;
            box-shadow: 0 4px 18px rgba(26, 58, 42, 0.22);
        }

        .btn-submit:hover {
            background: var(--forest-soft);
            transform: translateY(-1px);
            box-shadow: 0 8px 24px rgba(26, 58, 42, 0.3);
        }

        .btn-submit svg {
            transition: transform 0.18s;
        }

        .btn-submit:hover svg {
            transform: translateX(3px);
        }

        /* Footer */
        .form-footer {
            margin-top: 24px;
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
            transform: translateY(16px);
            animation: revealUp 0.65s ease forwards;
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
            animation-delay: 0.15s;
        }

        .d3 {
            animation-delay: 0.25s;
        }

        .d4 {
            animation-delay: 0.35s;
        }

        .d5 {
            animation-delay: 0.45s;
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
                padding: 32px 24px;
                align-items: flex-start;
                padding-top: 60px;
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
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor"
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
                    Buku adalah<br><em>jendela dunia</em><br>yang selalu terbuka.
                </div>
                <div class="left-sub">
                    Masuk untuk mengakses ribuan koleksi buku dan kelola peminjaman dengan mudah.
                </div>
                <div class="book-stack">
                    <div class="book-spine-deco bs-1">Non-Fiksi</div>
                    <div class="book-spine-deco bs-2">Fiksi</div>
                    <div class="book-spine-deco bs-3">Sejarah & Budaya</div>
                </div>
            </div>

            <div class="left-footer">
                <div class="left-footer-text">© {{ date('Y') }} Aksara — Perpustakaan Digital</div>
            </div>
        </div>

        {{-- ── RIGHT ── --}}
        <div class="right-panel">
            <div class="form-box">

                <div class="form-header reveal d1">
                    <div class="form-eyebrow">
                        <span class="form-eyebrow-dot"></span>
                        Selamat Datang
                    </div>
                    <div class="form-title">Masuk ke<br><em>Akun Kamu</em></div>
                    <div class="form-sub">Silakan masukkan email dan password untuk melanjutkan.</div>
                </div>

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="field reveal d2">
                        <label>Email</label>
                        <div class="input-wrap">
                            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z" />
                                <polyline points="22,6 12,13 2,6" />
                            </svg>
                            <input type="email" name="email" value="{{ old('email') }}"
                                placeholder="nama@email.com" required autocomplete="email">
                        </div>
                        @error('email')
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

                    <div class="field reveal d3">
                        <label>Password</label>
                        <div class="input-wrap">
                            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                <rect x="3" y="11" width="18" height="11" rx="2" ry="2" />
                                <path d="M7 11V7a5 5 0 0 1 10 0v4" />
                            </svg>
                            <input type="password" name="password" id="pwField" placeholder="••••••••" required
                                autocomplete="current-password" class="has-toggle">
                            <button type="button" class="toggle-pw" onclick="togglePw()">
                                <svg id="eyeIcon" width="16" height="16" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"
                                    stroke-linejoin="round">
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

                    <div class="extras-row reveal d4">
                        <label class="remember-label">
                            <input type="checkbox" name="remember">
                            Ingat saya
                        </label>
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" class="forgot-link">Lupa password?</a>
                        @endif
                    </div>

                    <button type="submit" class="btn-submit reveal d4">
                        Masuk Sekarang
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M5 12h14M12 5l7 7-7 7" />
                        </svg>
                    </button>

                    <div class="form-footer reveal d5">
                        Belum punya akun?
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Daftar di sini</a>
                        @endif
                    </div>
                </form>

            </div>
        </div>

    </div>

    <script>
        function togglePw() {
            const f = document.getElementById('pwField');
            const i = document.getElementById('eyeIcon');
            if (f.type === 'password') {
                f.type = 'text';
                i.innerHTML =
                    '<path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24"/><line x1="1" y1="1" x2="23" y2="23"/>';
            } else {
                f.type = 'password';
                i.innerHTML = '<path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/>';
            }
        }
    </script>
</body>

</html>
