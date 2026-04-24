<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Katalog Buku - Aksara</title>
    <link href="https://fonts.googleapis.com/css2?family=Sora:wght@400;500;600;700;800&family=Lora:ital,wght@0,400;0,600;1,400&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/lucide@latest/dist/umd/lucide.js"></script>
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        :root {
            --ink:        #0f1c14;
            --ink-soft:   #2e3d34;
            --sage:       #5a8a6a;
            --sage-light: #8cb89a;
            --mint:       #c8f0d4;
            --lime-pop:   #b5e853;
            --cream:      #f6f2ea;
            --cream-dark: #ede8dc;
            --warm-white: #faf8f4;
            --surface:    #ffffff;
            --text:       #1a2b20;
            --text-soft:  #5a6b60;
            --border:     #ddd8cc;
            --radius-xl:  20px;
            --radius-lg:  14px;
            --radius-sm:  9px;
            --sidebar-w:  260px;
        }

        body { font-family: 'Sora', sans-serif; background: var(--cream); color: var(--text); min-height: 100vh; }

        /* ── SIDEBAR ── */
        .sidebar {
            position: fixed; top: 0; left: 0;
            width: var(--sidebar-w); height: 100vh;
            background: var(--ink); display: flex; flex-direction: column;
            z-index: 100; overflow: hidden;
        }
        .sidebar::after {
            content: ''; position: absolute; bottom: 0; left: 0; right: 0; height: 280px;
            background: radial-gradient(ellipse at 50% 110%, rgba(181,232,83,0.12) 0%, transparent 65%);
            pointer-events: none;
        }
        .sidebar-top { padding: 26px 22px 20px; border-bottom: 1px solid rgba(255,255,255,0.07); }
        .sidebar-logo { display: flex; align-items: center; gap: 10px; margin-bottom: 20px; }
        .logo-dot {
            width: 10px; height: 10px; background: var(--lime-pop); border-radius: 50%;
            box-shadow: 0 0 8px rgba(181,232,83,0.6);
        }
        .logo-text { font-family: 'Lora', serif; color: white; font-size: 15px; font-weight: 600; }
        .sidebar-user {
            display: flex; align-items: center; gap: 11px;
            background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.08);
            border-radius: var(--radius-lg); padding: 11px 13px;
        }
        .sidebar-avatar {
            width: 38px; height: 38px; border-radius: 50%;
            background: linear-gradient(135deg, var(--sage), var(--lime-pop));
            display: flex; align-items: center; justify-content: center;
            font-size: 15px; font-weight: 700; color: var(--ink); flex-shrink: 0;
        }
        .sidebar-user-name { font-size: 13px; font-weight: 600; color: white; line-height: 1.2; }
        .sidebar-user-nisn { font-size: 11px; color: rgba(255,255,255,0.38); margin-top: 2px; }
        .nav-wrap { padding: 18px 14px; flex: 1; }
        .nav-section-label {
            font-size: 10px; font-weight: 700; letter-spacing: 0.14em; text-transform: uppercase;
            color: rgba(255,255,255,0.22); padding: 0 8px; margin-bottom: 8px; margin-top: 16px;
        }
        .nav-section-label:first-child { margin-top: 0; }
        .nav-item {
            display: flex; align-items: center; gap: 11px; padding: 10px 10px;
            border-radius: var(--radius-sm); color: rgba(255,255,255,0.5); text-decoration: none;
            font-size: 14px; font-weight: 500; transition: all 0.18s; margin-bottom: 2px; position: relative;
        }
        .nav-item:hover { background: rgba(255,255,255,0.06); color: rgba(255,255,255,0.9); }
        .nav-item.active { background: rgba(181,232,83,0.14); color: var(--lime-pop); }
        .nav-item.active::before {
            content: ''; position: absolute; left: 0; top: 25%; bottom: 25%;
            width: 3px; background: var(--lime-pop); border-radius: 0 2px 2px 0;
        }
        .sidebar-divider { height: 1px; background: rgba(255,255,255,0.07); margin: 4px 14px; }
        .sidebar-footer { padding: 14px 14px 26px; }
        .logout-btn {
            display: flex; align-items: center; gap: 11px; width: 100%; padding: 10px 10px;
            border-radius: var(--radius-sm); background: none; border: none; cursor: pointer;
            color: rgba(255,255,255,0.35); font-size: 14px; font-weight: 500;
            font-family: 'Sora', sans-serif; transition: all 0.18s; text-align: left;
        }
        .logout-btn:hover { background: rgba(239,68,68,0.15); color: #fca5a5; }

        /* ── MAIN ── */
        .main { margin-left: var(--sidebar-w); min-height: 100vh; display: flex; flex-direction: column; }

        /* ── TOPBAR ── */
        .topbar {
            background: var(--surface); border-bottom: 1px solid var(--border);
            padding: 14px 32px; display: flex; align-items: center;
            justify-content: space-between; position: sticky; top: 0; z-index: 50;
        }
        .topbar-breadcrumb { display: flex; align-items: center; gap: 8px; }
        .breadcrumb-link {
            font-size: 13px; color: var(--text-soft); text-decoration: none;
            display: flex; align-items: center; gap: 5px; font-weight: 500;
        }
        .breadcrumb-link:hover { color: var(--sage); }
        .breadcrumb-sep     { color: var(--border); }
        .breadcrumb-current { font-size: 13px; font-weight: 600; color: var(--text); }
        .topbar-right { display: flex; align-items: center; gap: 10px; }
        .user-chip {
            display: flex; align-items: center; gap: 9px; background: var(--cream);
            border: 1px solid var(--border); padding: 5px 14px 5px 5px; border-radius: 40px;
        }
        .chip-avatar {
            width: 28px; height: 28px; border-radius: 50%;
            background: linear-gradient(135deg, var(--sage), var(--lime-pop));
            display: flex; align-items: center; justify-content: center;
            color: var(--ink); font-size: 11px; font-weight: 700;
        }
        .chip-name { font-size: 13px; font-weight: 600; }

        /* ── CONTENT ── */
        .content { padding: 28px 32px; flex: 1; }

        /* ── PAGE HEADER ── */
        .page-header {
            display: flex; align-items: flex-end; justify-content: space-between;
            margin-bottom: 22px; gap: 16px; flex-wrap: wrap;
        }
        .page-header h1 {
            font-family: 'Lora', serif; font-size: 26px; font-weight: 600; color: var(--ink);
        }
        .page-header p { font-size: 13.5px; color: var(--text-soft); margin-top: 4px; }

        /* ── TOOLBAR ── */
        .toolbar {
            display: flex; align-items: center; gap: 10px;
            margin-bottom: 22px; flex-wrap: wrap;
        }
        .search-wrap { position: relative; flex: 1; min-width: 220px; }
        .search-wrap svg {
            position: absolute; left: 13px; top: 50%; transform: translateY(-50%);
            color: var(--text-soft); pointer-events: none;
        }
        .search-input {
            width: 100%; padding: 10px 14px 10px 40px;
            border: 1.5px solid var(--border); border-radius: var(--radius-lg);
            font-family: 'Sora', sans-serif; font-size: 14px;
            background: var(--surface); color: var(--text); transition: border-color 0.15s;
        }
        .search-input:focus { outline: none; border-color: var(--sage); }
        .search-input::placeholder { color: #b4bfb8; }
        .filter-select {
            padding: 10px 14px; border: 1.5px solid var(--border); border-radius: var(--radius-lg);
            font-family: 'Sora', sans-serif; font-size: 14px;
            background: var(--surface); color: var(--text); cursor: pointer; appearance: none;
        }
        .filter-select:focus { outline: none; border-color: var(--sage); }

        /* ── BOOK GRID ── */
        .book-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(190px, 1fr));
            gap: 18px;
        }

        .book-card {
            background: var(--surface); border: 1.5px solid var(--border);
            border-radius: var(--radius-lg); overflow: hidden;
            transition: all 0.22s; display: flex; flex-direction: column;
        }
        .book-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 12px 32px rgba(15,28,20,0.12);
            border-color: var(--sage-light);
        }

        /* Cover area */
        .cover-wrap {
            position: relative; aspect-ratio: 2/3;
            background: var(--cream-dark); overflow: hidden;
        }
        .cover-wrap img {
            width: 100%; height: 100%; object-fit: cover;
            transition: transform 0.3s;
        }
        .book-card:hover .cover-wrap img { transform: scale(1.04); }
        .cover-placeholder {
            width: 100%; height: 100%;
            display: flex; flex-direction: column; align-items: center; justify-content: center;
            gap: 8px; color: var(--text-soft);
        }
        .cover-placeholder span { font-size: 11px; }

        /* Category pill on cover */
        .cover-badge {
            position: absolute; top: 10px; left: 10px;
            background: rgba(15,28,20,0.70); backdrop-filter: blur(4px);
            color: rgba(255,255,255,0.9); font-size: 10.5px; font-weight: 600;
            padding: 3px 9px; border-radius: 20px; letter-spacing: 0.02em;
        }

        /* Stok indicator */
        .stok-dot {
            position: absolute; top: 10px; right: 10px;
            width: 10px; height: 10px; border-radius: 50%;
            border: 2px solid rgba(255,255,255,0.6);
        }
        .stok-ok     { background: #22c55e; }
        .stok-low    { background: #f59e0b; }
        .stok-empty  { background: #ef4444; }

        /* Card body */
        .book-body { padding: 14px 14px 16px; display: flex; flex-direction: column; flex: 1; gap: 4px; }
        .book-title {
            font-size: 14px; font-weight: 700; color: var(--ink);
            line-height: 1.35;
            display: -webkit-box; -webkit-line-clamp: 2;
            -webkit-box-orient: vertical; overflow: hidden;
        }
        .book-author { font-size: 12px; color: var(--text-soft); margin-top: 2px; }
        .book-publisher { font-size: 11px; color: var(--text-soft); }

        .book-footer {
            display: flex; align-items: center; justify-content: space-between;
            margin-top: auto; padding-top: 12px;
        }
        .stok-text {
            font-size: 12px; font-weight: 600;
            display: flex; align-items: center; gap: 5px;
        }
        .stok-text.ok    { color: #16a34a; }
        .stok-text.low   { color: #d97706; }
        .stok-text.empty { color: #dc2626; }

        .btn-detail {
            display: inline-flex; align-items: center; gap: 5px;
            background: var(--ink); color: white;
            font-size: 12px; font-weight: 600;
            padding: 6px 12px; border-radius: var(--radius-sm);
            text-decoration: none; font-family: 'Sora', sans-serif;
            transition: all 0.15s;
        }
        .btn-detail:hover { background: var(--ink-soft); }
        .book-card:hover .btn-detail {
            background: var(--lime-pop); color: var(--ink);
        }

        /* ── EMPTY STATE ── */
        .empty-state {
            grid-column: 1/-1; padding: 60px; text-align: center; color: var(--text-soft);
        }
        .empty-circle {
            width: 64px; height: 64px; border-radius: 50%; background: var(--cream-dark);
            display: flex; align-items: center; justify-content: center;
            margin: 0 auto 16px; color: var(--text-soft);
        }
        .empty-state p { font-size: 14px; }

        /* ── PAGINATION ── */
        .pagination-wrap {
            margin-top: 28px; display: flex; align-items: center; justify-content: space-between;
            padding: 14px 18px; background: var(--surface); border: 1px solid var(--border);
            border-radius: var(--radius-lg);
        }
        .pagination-info { font-size: 13px; color: var(--text-soft); }

        /* ── RESPONSIVE ── */
        @media (max-width: 900px) {
            :root { --sidebar-w: 64px; }
            .sidebar-top .sidebar-user, .logo-text,
            .nav-item span, .nav-section-label, .logout-btn span { display: none; }
            .sidebar-top { padding: 20px 10px; }
            .sidebar-logo { justify-content: center; }
            .nav-item { justify-content: center; padding: 11px; }
            .nav-item.active::before { display: none; }
            .logout-btn { justify-content: center; padding: 11px; }
            .nav-wrap { padding: 12px 8px; }
            .topbar, .content { padding-left: 18px; padding-right: 18px; }
        }
        @media (max-width: 580px) {
            .book-grid { grid-template-columns: repeat(2, 1fr); gap: 12px; }
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
            <span class="breadcrumb-current">Pinjam Buku</span>
        </div>
        <div class="topbar-right">
            <div class="user-chip">
                <div class="chip-avatar">{{ strtoupper(substr(Auth::user()->name, 0, 1)) }}</div>
                <span class="chip-name">{{ Auth::user()->name }}</span>
            </div>
        </div>
    </header>

    <main class="content">

        {{-- Page Header --}}
        <div class="page-header">
            <div>
                <h1>Katalog Buku</h1>
                <p>Temukan dan pinjam buku yang kamu mau dari koleksi perpustakaan</p>
            </div>
        </div>

        {{-- Toolbar --}}
        <div class="toolbar">
            <div class="search-wrap">
                <i data-lucide="search" width="15" height="15"></i>
                <input type="text" class="search-input" placeholder="Cari judul atau pengarang...">
            </div>
            <select class="filter-select">
                <option value="">Semua Kategori</option>
                <option>Fiksi</option>
                <option>Non-Fiksi</option>
                <option>Sains</option>
                <option>Sejarah</option>
                <option>Pelajaran</option>
                <option>Biografi</option>
                <option>Teknologi</option>
                <option>Sastra</option>
            </select>
            <select class="filter-select">
                <option value="">Semua Stok</option>
                <option>Tersedia</option>
                <option>Habis</option>
            </select>
        </div>

        {{-- Book Grid --}}
        <div class="book-grid">
            @forelse($books as $book)
            <div class="book-card">

                {{-- Cover --}}
                <div class="cover-wrap">
                    @if($book->cover)
                        <img src="{{ Storage::url($book->cover) }}" alt="{{ $book->judul }}">
                    @else
                        <div class="cover-placeholder">
                            <i data-lucide="book" width="32" height="32"></i>
                            <span>Tidak ada cover</span>
                        </div>
                    @endif

                    @if($book->kategori)
                        <span class="cover-badge">{{ $book->kategori }}</span>
                    @endif

                    @php
                        $stokClass = $book->total_stok > 3 ? 'stok-ok' : ($book->total_stok > 0 ? 'stok-low' : 'stok-empty');
                    @endphp
                    <span class="stok-dot {{ $stokClass }}"></span>
                </div>

                {{-- Body --}}
                <div class="book-body">
                    <div class="book-title">{{ $book->judul }}</div>
                    <div class="book-author">{{ $book->pengarang }}</div>
                    @if($book->penerbit)
                        <div class="book-publisher">{{ $book->penerbit }}</div>
                    @endif

                    <div class="book-footer">
                        @php
                            $stokLabel = $book->total_stok > 3 ? 'ok' : ($book->total_stok > 0 ? 'low' : 'empty');
                            $stokText  = $book->total_stok > 0 ? $book->total_stok . ' tersedia' : 'Habis';
                        @endphp
                        <span class="stok-text {{ $stokLabel }}">
                            <i data-lucide="{{ $book->total_stok > 0 ? 'circle-check' : 'circle-x' }}" width="13" height="13"></i>
                            {{ $stokText }}
                        </span>
                        <a href="{{ route('siswa.buku.show', $book->id) }}" class="btn-detail">
                            Detail <i data-lucide="arrow-right" width="11" height="11"></i>
                        </a>
                    </div>
                </div>

            </div>
            @empty
            <div class="empty-state">
                <div class="empty-circle">
                    <i data-lucide="book-x" width="26" height="26"></i>
                </div>
                <p>Belum ada buku dalam koleksi saat ini.</p>
            </div>
            @endforelse
        </div>

        {{-- Pagination --}}
        @if($books->hasPages())
        <div class="pagination-wrap">
            <span class="pagination-info">
                Menampilkan {{ $books->firstItem() }}–{{ $books->lastItem() }} dari {{ $books->total() }} buku
            </span>
            {{ $books->links() }}
        </div>
        @endif

    </main>
</div>

<script>lucide.createIcons();</script>
</body>
</html>