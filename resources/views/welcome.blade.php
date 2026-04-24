<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Aksara - Perpustakaan Digital</title>
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
            height: 100%;
            background: var(--bg);
            color: var(--text);
            font-family: 'Plus Jakarta Sans', sans-serif;
            overflow-x: hidden;
        }

        /* ── GRAIN OVERLAY ── */
        body::before {
            content: '';
            position: fixed;
            inset: 0;
            z-index: 0;
            opacity: 0.028;
            background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='noise'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23noise)'/%3E%3C/svg%3E");
            background-size: 200px 200px;
            pointer-events: none;
        }

        /* ── BG DECO ── */
        .bg-deco {
            position: fixed;
            inset: 0;
            z-index: 0;
            pointer-events: none;
            overflow: hidden;
        }

        .bg-deco::before {
            content: '';
            position: absolute;
            top: -180px;
            right: -120px;
            width: 600px;
            height: 600px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(61, 153, 112, 0.10) 0%, rgba(26, 58, 42, 0.04) 45%, transparent 70%);
        }

        .bg-deco::after {
            content: '';
            position: absolute;
            bottom: -200px;
            left: -150px;
            width: 640px;
            height: 640px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(163, 230, 53, 0.07) 0%, transparent 65%);
        }

        /* ── PAGE ── */
        .page {
            position: relative;
            z-index: 1;
            min-height: 100vh;
            display: grid;
            grid-template-rows: auto 1fr auto;
        }

        /* ── HEADER ── */
        header {
            padding: 24px 52px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            border-bottom: 1px solid rgba(26, 58, 42, 0.06);
            background: rgba(247, 244, 239, 0.85);
            backdrop-filter: blur(8px);
            position: sticky;
            top: 0;
            z-index: 50;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 13px;
            text-decoration: none;
        }

        .brand-mark {
            width: 40px;
            height: 40px;
            background: linear-gradient(135deg, var(--forest), var(--forest-soft));
            border-radius: 11px;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 12px rgba(26, 58, 42, 0.22);
        }

        .brand-mark svg {
            color: var(--lime);
        }

        .brand-name {
            font-family: 'Playfair Display', serif;
            font-size: 19px;
            font-weight: 700;
            color: var(--forest);
            line-height: 1.15;
        }

        .brand-name span {
            display: block;
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-size: 10.5px;
            font-weight: 500;
            color: var(--text-muted);
            letter-spacing: 0.1em;
            text-transform: uppercase;
        }

        nav {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .nav-link {
            display: inline-flex;
            align-items: center;
            padding: 9px 20px;
            border-radius: 8px;
            font-size: 14px;
            font-weight: 500;
            text-decoration: none;
            transition: all 0.18s;
            color: var(--text-muted);
            border: 1px solid transparent;
        }

        .nav-link:hover {
            color: var(--forest);
            background: var(--sand);
            border-color: var(--border);
        }

        .nav-link.primary {
            background: var(--forest);
            color: var(--lime);
            border-color: var(--forest);
            box-shadow: 0 2px 10px rgba(26, 58, 42, 0.2);
        }

        .nav-link.primary:hover {
            background: var(--forest-soft);
            border-color: var(--forest-soft);
            color: var(--lime);
            transform: translateY(-1px);
            box-shadow: 0 4px 16px rgba(26, 58, 42, 0.28);
        }

        /* ── HERO ── */
        .hero {
            display: flex;
            align-items: center;
            padding: 60px 52px 48px;
            gap: 64px;
            max-width: 1160px;
            margin: 0 auto;
            width: 100%;
        }

        .hero-left {
            flex: 1;
        }

        .eyebrow {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: var(--green-light);
            border: 1px solid #6ee7b7;
            padding: 5px 14px;
            border-radius: 20px;
            font-size: 11.5px;
            font-weight: 600;
            color: #065f46;
            letter-spacing: 0.08em;
            text-transform: uppercase;
            margin-bottom: 26px;
        }

        .eyebrow-dot {
            width: 6px;
            height: 6px;
            border-radius: 50%;
            background: var(--green);
            animation: pulse-dot 2s ease-in-out infinite;
        }

        @keyframes pulse-dot {

            0%,
            100% {
                opacity: 1;
                transform: scale(1);
            }

            50% {
                opacity: 0.5;
                transform: scale(0.75);
            }
        }

        h1 {
            font-family: 'Playfair Display', serif;
            font-size: clamp(48px, 5.5vw, 76px);
            font-weight: 700;
            color: var(--forest);
            line-height: 1.06;
            margin-bottom: 22px;
            letter-spacing: -0.015em;
        }

        h1 em {
            font-style: italic;
            color: var(--green);
        }

        h1 .underline-lime {
            position: relative;
            display: inline-block;
        }

        h1 .underline-lime::after {
            content: '';
            position: absolute;
            bottom: 2px;
            left: 0;
            right: 0;
            height: 4px;
            background: var(--lime);
            border-radius: 2px;
            opacity: 0.7;
        }

        .hero-desc {
            font-size: 16px;
            color: var(--text-muted);
            line-height: 1.8;
            max-width: 440px;
            margin-bottom: 36px;
            font-weight: 400;
        }

        .cta-row {
            display: flex;
            align-items: center;
            gap: 14px;
            flex-wrap: wrap;
        }

        .btn-main {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            background: var(--forest);
            color: var(--lime);
            padding: 14px 30px;
            border-radius: 10px;
            font-size: 15px;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.2s;
            box-shadow: 0 4px 18px rgba(26, 58, 42, 0.22);
        }

        .btn-main:hover {
            background: var(--forest-soft);
            transform: translateY(-2px);
            box-shadow: 0 8px 28px rgba(26, 58, 42, 0.28);
        }

        .btn-main svg {
            transition: transform 0.18s;
        }

        .btn-main:hover svg {
            transform: translateX(3px);
        }

        .btn-sec {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            color: var(--text-muted);
            font-size: 14px;
            font-weight: 500;
            text-decoration: none;
            padding: 14px 18px;
            border-radius: 10px;
            border: 1.5px solid var(--border);
            background: white;
            transition: all 0.18s;
        }

        .btn-sec:hover {
            color: var(--forest);
            border-color: var(--green);
            background: var(--green-light);
        }

        /* ── HERO RIGHT – Book Illustration ── */
        .hero-right {
            flex-shrink: 0;
            width: 380px;
            position: relative;
        }

        .books-illustration {
            position: relative;
            height: 430px;
        }

        .book-card {
            position: absolute;
            border-radius: 14px;
            overflow: hidden;
        }

        /* Main card */
        .bc-main {
            width: 220px;
            height: 300px;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%) rotate(-3deg);
            background: linear-gradient(145deg, var(--forest) 0%, var(--forest-soft) 100%);
            box-shadow: 0 24px 64px rgba(26, 58, 42, 0.32);
            display: flex;
            flex-direction: column;
            justify-content: flex-end;
            padding: 22px;
            z-index: 3;
            animation: floatMain 6s ease-in-out infinite;
        }

        @keyframes floatMain {

            0%,
            100% {
                transform: translate(-50%, -50%) rotate(-3deg) translateY(0);
            }

            50% {
                transform: translate(-50%, -50%) rotate(-3deg) translateY(-10px);
            }
        }

        .bc-main::before {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(135deg, rgba(163, 230, 53, 0.10) 0%, transparent 55%);
        }

        .bc-main-deco {
            position: absolute;
            top: 20px;
            left: 20px;
            right: 20px;
        }

        .bc-line {
            height: 2px;
            background: rgba(163, 230, 53, 0.22);
            border-radius: 2px;
            margin-bottom: 9px;
        }

        .bc-line:nth-child(2) {
            width: 68%;
        }

        .bc-line:nth-child(3) {
            width: 46%;
        }

        .bc-main-label {
            font-family: 'Playfair Display', serif;
            font-size: 22px;
            font-weight: 700;
            font-style: italic;
            color: var(--lime);
            line-height: 1.3;
            position: relative;
            z-index: 1;
        }

        .bc-main-sub {
            font-size: 10.5px;
            color: rgba(255, 255, 255, 0.35);
            margin-top: 8px;
            letter-spacing: 0.10em;
            text-transform: uppercase;
            position: relative;
            z-index: 1;
        }

        /* Side cards */
        .bc-left {
            width: 160px;
            height: 224px;
            left: 8px;
            top: 50%;
            transform: translateY(-50%) rotate(-8deg);
            background: linear-gradient(145deg, var(--green-2), var(--green));
            box-shadow: 0 12px 32px rgba(26, 58, 42, 0.18);
            z-index: 2;
            animation: floatLeft 7s ease-in-out infinite 0.5s;
        }

        @keyframes floatLeft {

            0%,
            100% {
                transform: translateY(-50%) rotate(-8deg);
            }

            50% {
                transform: translateY(calc(-50% - 8px)) rotate(-8deg);
            }
        }

        .bc-left::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            height: 55%;
            background: linear-gradient(to top, rgba(0, 0, 0, 0.25), transparent);
        }

        .bc-right {
            width: 150px;
            height: 204px;
            right: 8px;
            top: 50%;
            transform: translateY(-55%) rotate(6deg);
            background: linear-gradient(145deg, #1a3a2a, #3d9970);
            box-shadow: 0 12px 32px rgba(26, 58, 42, 0.18);
            z-index: 2;
            animation: floatRight 8s ease-in-out infinite 1s;
        }

        @keyframes floatRight {

            0%,
            100% {
                transform: translateY(-55%) rotate(6deg);
            }

            50% {
                transform: translateY(calc(-55% - 6px)) rotate(6deg);
            }
        }

        .bc-right::before {
            content: 'Koleksi\nTerpilih';
            white-space: pre;
            position: absolute;
            bottom: 18px;
            left: 14px;
            font-family: 'Playfair Display', serif;
            font-size: 13px;
            font-style: italic;
            color: rgba(163, 230, 53, 0.7);
            line-height: 1.4;
        }

        .bc-small {
            width: 112px;
            height: 152px;
            right: 48px;
            bottom: 18px;
            transform: rotate(2deg);
            background: linear-gradient(145deg, var(--lime), #84cc16);
            box-shadow: 0 8px 24px rgba(26, 58, 42, 0.14);
            z-index: 1;
            animation: floatSmall 9s ease-in-out infinite 0.8s;
        }

        @keyframes floatSmall {

            0%,
            100% {
                transform: rotate(2deg) translateY(0);
            }

            50% {
                transform: rotate(2deg) translateY(-6px);
            }
        }

        .bc-small::after {
            content: '';
            position: absolute;
            top: 14px;
            left: 12px;
            right: 12px;
            height: 2px;
            background: rgba(26, 58, 42, 0.2);
            border-radius: 2px;
        }

        /* Dots */
        .dots-deco {
            position: absolute;
            bottom: 26px;
            left: 18px;
            display: grid;
            grid-template-columns: repeat(5, 1fr);
            gap: 7px;
        }

        .dot {
            width: 4px;
            height: 4px;
            border-radius: 50%;
            background: var(--border);
        }

        .dot:nth-child(even) {
            background: var(--lime);
            opacity: 0.55;
        }

        /* ── STATS ── */
        .stats-strip {
            max-width: 1160px;
            margin: 0 auto;
            width: 100%;
            padding: 0 52px 56px;
            display: flex;
            gap: 0;
        }

        .stat-item {
            flex: 1;
            padding: 24px 32px;
            border-top: 2px solid var(--border);
            position: relative;
        }

        .stat-item:first-child {
            padding-left: 0;
        }

        .stat-item:not(:first-child) {
            border-left: 1px solid var(--border);
        }

        .stat-num {
            font-family: 'Playfair Display', serif;
            font-size: 46px;
            font-weight: 700;
            color: var(--forest);
            line-height: 1;
        }

        .stat-unit {
            font-size: 20px;
            color: var(--green);
        }

        .stat-label {
            font-size: 13px;
            color: var(--text-muted);
            margin-top: 6px;
            font-weight: 400;
        }

        /* ── FEATURES ── */
        .features {
            background: var(--forest);
            padding: 80px 52px;
            position: relative;
            overflow: hidden;
        }

        .features::before {
            content: '';
            position: absolute;
            top: -80px;
            right: -80px;
            width: 420px;
            height: 420px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(163, 230, 53, 0.07) 0%, transparent 65%);
        }

        .features::after {
            content: '';
            position: absolute;
            bottom: -100px;
            left: -60px;
            width: 360px;
            height: 360px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(61, 153, 112, 0.10) 0%, transparent 65%);
        }

        .features-inner {
            max-width: 1160px;
            margin: 0 auto;
            position: relative;
            z-index: 1;
        }

        .features-header {
            display: flex;
            align-items: flex-end;
            justify-content: space-between;
            margin-bottom: 52px;
        }

        .features-title {
            font-family: 'Playfair Display', serif;
            font-size: 44px;
            font-weight: 700;
            color: white;
            line-height: 1.15;
        }

        .features-title em {
            font-style: italic;
            color: var(--lime);
        }

        .features-sub {
            font-size: 14px;
            color: rgba(255, 255, 255, 0.38);
            max-width: 240px;
            line-height: 1.7;
            text-align: right;
        }

        .features-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 2px;
        }

        .feature-item {
            background: rgba(255, 255, 255, 0.04);
            border: 1px solid rgba(255, 255, 255, 0.07);
            padding: 32px 28px;
            transition: all 0.22s;
            cursor: default;
        }

        .feature-item:hover {
            background: rgba(163, 230, 53, 0.06);
            border-color: rgba(163, 230, 53, 0.18);
            transform: translateY(-2px);
        }

        .feature-icon {
            width: 44px;
            height: 44px;
            border: 1px solid rgba(163, 230, 53, 0.22);
            border-radius: 11px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 18px;
            color: var(--lime);
            background: rgba(163, 230, 53, 0.07);
        }

        .feature-name {
            font-family: 'Playfair Display', serif;
            font-size: 19px;
            font-weight: 600;
            color: white;
            margin-bottom: 10px;
            line-height: 1.3;
        }

        .feature-desc {
            font-size: 13.5px;
            color: rgba(255, 255, 255, 0.4);
            line-height: 1.7;
            font-weight: 300;
        }

        /* ── FOOTER ── */
        footer {
            background: var(--forest);
            border-top: 1px solid rgba(255, 255, 255, 0.06);
            padding: 24px 52px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .footer-copy {
            font-size: 13px;
            color: rgba(255, 255, 255, 0.24);
        }

        .footer-version {
            font-size: 12px;
            color: rgba(255, 255, 255, 0.16);
            font-family: monospace;
        }

        /* ── REVEAL ── */
        .reveal {
            opacity: 0;
            transform: translateY(22px);
            animation: revealUp 0.72s ease forwards;
        }

        @keyframes revealUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .delay-1 {
            animation-delay: 0.08s;
        }

        .delay-2 {
            animation-delay: 0.20s;
        }

        .delay-3 {
            animation-delay: 0.34s;
        }

        .delay-4 {
            animation-delay: 0.48s;
        }

        .delay-5 {
            animation-delay: 0.62s;
        }

        .delay-6 {
            animation-delay: 0.78s;
        }

        /* ── RESPONSIVE ── */
        @media (max-width: 960px) {
            header {
                padding: 18px 28px;
            }

            .hero {
                flex-direction: column;
                padding: 36px 28px 40px;
                gap: 44px;
            }

            .hero-right {
                width: 100%;
                max-width: 360px;
                margin: 0 auto;
            }

            .stats-strip {
                padding: 0 28px 44px;
                flex-wrap: wrap;
            }

            .stat-item {
                min-width: 50%;
            }

            .features {
                padding: 56px 28px;
            }

            .features-grid {
                grid-template-columns: 1fr;
            }

            .features-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 14px;
            }

            .features-sub {
                text-align: left;
                max-width: 100%;
            }

            footer {
                padding: 20px 28px;
                flex-direction: column;
                gap: 8px;
                text-align: center;
            }
        }

        @media (max-width: 640px) {
            h1 {
                font-size: 44px;
            }

            .books-illustration {
                height: 340px;
            }

            .bc-main {
                width: 175px;
                height: 245px;
            }

            .bc-left {
                width: 126px;
                height: 175px;
            }

            .bc-right {
                width: 120px;
                height: 160px;
            }
        }
    </style>
</head>

<body>
    <div class="bg-deco"></div>

    <div class="page">

        {{-- ── HEADER ── --}}
        <header class="reveal">
            <a href="/" class="brand">
                <div class="brand-mark">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z" />
                        <path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z" />
                    </svg>
                </div>
                <div class="brand-name">
                    Aksara
                    <span>Perpustakaan Digital</span>
                </div>
            </a>

            @if (Route::has('login'))
                <nav>
                    @auth
                        <a href="{{ url('/dashboard') }}" class="nav-link primary">Masuk ke Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="nav-link">Masuk</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="nav-link primary">Daftar Sekarang</a>
                        @endif
                    @endauth
                </nav>
            @endif
        </header>

        {{-- ── HERO ── --}}
        <section>
            <div class="hero">
                <div class="hero-left">
                    <div class="eyebrow reveal delay-1">
                        <span class="eyebrow-dot"></span>
                        Selamat Datang di Aksara
                    </div>

                    <h1 class="reveal delay-2">
                        Perpustakaan<br>
                        <em>ada di</em>
                        <span class="underline-lime">ujung jarimu.</span>
                    </h1>

                    <p class="hero-desc reveal delay-3">
                        Sistem manajemen perpustakaan yang memudahkan siswa meminjam buku dan petugas mengelola koleksi
                        dari mana saja, kapan saja.
                    </p>

                    <div class="cta-row reveal delay-4">
                        @auth
                            <a href="{{ url('/dashboard') }}" class="btn-main">
                                Buka Dashboard
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M5 12h14M12 5l7 7-7 7" />
                                </svg>
                            </a>
                        @else
                            <a href="{{ route('login') }}" class="btn-main">
                                Mulai Sekarang
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M5 12h14M12 5l7 7-7 7" />
                                </svg>
                            </a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="btn-sec">
                                    Buat Akun Gratis
                                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round">
                                        <path d="M7 17L17 7M7 7h10v10" />
                                    </svg>
                                </a>
                            @endif
                        @endauth
                    </div>
                </div>

                {{-- Buku dekoratif --}}
                <div class="hero-right reveal delay-5">
                    <div class="books-illustration">
                        <div class="book-card bc-left"></div>
                        <div class="book-card bc-right"></div>
                        <div class="book-card bc-small"></div>
                        <div class="book-card bc-main">
                            <div class="bc-main-deco">
                                <div class="bc-line"></div>
                                <div class="bc-line"></div>
                                <div class="bc-line"></div>
                            </div>
                            <div class="bc-main-label">Buku<br>Terbaik<br>Hari Ini</div>
                            <div class="bc-main-sub">Koleksi Pilihan</div>
                        </div>
                        <div class="dots-deco">
                            <div class="dot"></div>
                            <div class="dot"></div>
                            <div class="dot"></div>
                            <div class="dot"></div>
                            <div class="dot"></div>
                            <div class="dot"></div>
                            <div class="dot"></div>
                            <div class="dot"></div>
                            <div class="dot"></div>
                            <div class="dot"></div>
                            <div class="dot"></div>
                            <div class="dot"></div>
                            <div class="dot"></div>
                            <div class="dot"></div>
                            <div class="dot"></div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Stats --}}
            <div class="stats-strip reveal delay-6">
                <div class="stat-item">
                    <div class="stat-num">500<span class="stat-unit">+</span></div>
                    <div class="stat-label">Koleksi buku tersedia</div>
                </div>
                <div class="stat-item">
                    <div class="stat-num">24<span class="stat-unit">jam</span></div>
                    <div class="stat-label">Akses kapan saja</div>
                </div>
                <div class="stat-item">
                    <div class="stat-num">100<span class="stat-unit">%</span></div>
                    <div class="stat-label">Mudah & gratis digunakan</div>
                </div>
            </div>
        </section>

        {{-- ── FEATURES ── --}}
        <section class="features">
            <div class="features-inner">
                <div class="features-header">
                    <div class="features-title">
                        Semua yang kamu<br>butuhkan, <em>sudah ada.</em>
                    </div>
                    <div class="features-sub">Dirancang untuk memudahkan siswa dan petugas perpustakaan bekerja lebih
                        efisien.</div>
                </div>

                <div class="features-grid">
                    <div class="feature-item">
                        <div class="feature-icon">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="1.7" stroke-linecap="round"
                                stroke-linejoin="round">
                                <path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z" />
                                <path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z" />
                            </svg>
                        </div>
                        <div class="feature-name">Katalog Buku Lengkap</div>
                        <div class="feature-desc">Temukan buku berdasarkan kategori, pengarang, atau judul. Lihat stok
                            dan detail buku sebelum meminjam.</div>
                    </div>
                    <div class="feature-item">
                        <div class="feature-icon">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="1.7" stroke-linecap="round"
                                stroke-linejoin="round">
                                <rect x="3" y="4" width="18" height="18" rx="2" ry="2" />
                                <line x1="16" y1="2" x2="16" y2="6" />
                                <line x1="8" y1="2" x2="8" y2="6" />
                                <line x1="3" y1="10" x2="21" y2="10" />
                            </svg>
                        </div>
                        <div class="feature-name">Peminjaman Online</div>
                        <div class="feature-desc">Ajukan peminjaman buku cukup dari ponsel atau komputer, tanpa harus
                            antri di perpustakaan.</div>
                    </div>
                    <div class="feature-item">
                        <div class="feature-icon">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="1.7" stroke-linecap="round"
                                stroke-linejoin="round">
                                <polyline points="22 12 18 12 15 21 9 3 6 12 2 12" />
                            </svg>
                        </div>
                        <div class="feature-name">Pantau Riwayat</div>
                        <div class="feature-desc">Lihat semua riwayat peminjaman, status pengajuan, dan tanggal jatuh
                            tempo dengan mudah.</div>
                    </div>
                    <div class="feature-item">
                        <div class="feature-icon">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="1.7" stroke-linecap="round"
                                stroke-linejoin="round">
                                <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2" />
                                <circle cx="9" cy="7" r="4" />
                                <path d="M23 21v-2a4 4 0 0 0-3-3.87" />
                                <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                            </svg>
                        </div>
                        <div class="feature-name">Kelola Anggota</div>
                        <div class="feature-desc">Admin dapat mengelola data siswa, memberi akses, dan memantau
                            aktivitas peminjaman seluruh anggota.</div>
                    </div>
                    <div class="feature-item">
                        <div class="feature-icon">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="1.7" stroke-linecap="round"
                                stroke-linejoin="round">
                                <polyline points="9 11 12 14 22 4" />
                                <path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11" />
                            </svg>
                        </div>
                        <div class="feature-name">Proses Pengajuan</div>
                        <div class="feature-desc">Petugas dapat menyetujui atau menolak pengajuan peminjaman dan
                            pengembalian buku secara real-time.</div>
                    </div>
                    <div class="feature-item">
                        <div class="feature-icon">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="1.7" stroke-linecap="round"
                                stroke-linejoin="round">
                                <line x1="18" y1="20" x2="18" y2="10" />
                                <line x1="12" y1="20" x2="12" y2="4" />
                                <line x1="6" y1="20" x2="6" y2="14" />
                            </svg>
                        </div>
                        <div class="feature-name">Laporan & Statistik</div>
                        <div class="feature-desc">Pantau koleksi buku, jumlah peminjaman aktif, dan buku yang paling
                            diminati siswa.</div>
                    </div>
                </div>
            </div>
        </section>

        {{-- ── FOOTER ── --}}
        <footer>
            <div class="footer-copy">© {{ date('Y') }} Aksara — Perpustakaan Digital</div>
            <div class="footer-version">v{{ app()->version() }}</div>
        </footer>

    </div>
</body>

</html>
