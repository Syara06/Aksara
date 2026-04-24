<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Buku - Admin</title>
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
        .brand-sub { font-size: 11.5px; color: rgba(255,255,255,0.38); margin-top: 1px; }

        .nav-section { padding: 18px 14px 6px; }
        .nav-label {
            font-size: 10.5px; font-weight: 700;
            letter-spacing: 0.12em; text-transform: uppercase;
            color: rgba(255,255,255,0.28);
            padding: 0 10px; margin-bottom: 7px;
        }
        .nav-item {
            display: flex; align-items: center; gap: 12px;
            padding: 11px 13px; border-radius: var(--radius-sm);
            color: rgba(255,255,255,0.58);
            text-decoration: none; font-size: 14.5px; font-weight: 500;
            transition: all 0.18s; margin-bottom: 2px; position: relative;
        }
        .nav-item:hover { background: rgba(255,255,255,0.07); color: rgba(255,255,255,0.92); }
        .nav-item.active { background: rgba(163,230,53,0.14); color: var(--lime); }
        .nav-item.active::before {
            content: ''; position: absolute;
            left: 0; top: 22%; bottom: 22%;
            width: 3px; background: var(--lime); border-radius: 0 3px 3px 0;
        }
        .sidebar-divider { height: 1px; background: rgba(255,255,255,0.07); margin: 8px 14px; }
        .sidebar-footer { margin-top: auto; padding: 14px 14px 24px; }
        .btn-logout-nav {
            display: flex; align-items: center; gap: 12px; width: 100%;
            padding: 11px 13px; border-radius: var(--radius-sm);
            background: none; border: none; cursor: pointer;
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
        .page-title { font-family: 'Playfair Display', serif; font-size: 20px; font-weight: 700; color: var(--forest); }
        .page-sub { font-size: 12px; color: var(--text-muted); margin-top: 1px; }
        .topbar-right { display: flex; align-items: center; gap: 12px; }
        .user-chip {
            display: flex; align-items: center; gap: 9px;
            background: var(--sand); border: 1px solid var(--border);
            padding: 5px 14px 5px 5px; border-radius: 40px;
        }
        .user-avatar {
            width: 30px; height: 30px;
            background: linear-gradient(135deg, var(--forest-mid), var(--green));
            border-radius: 50%; display: flex; align-items: center; justify-content: center;
            color: white; font-size: 12px; font-weight: 700;
        }
        .user-name { font-size: 13.5px; font-weight: 600; }
        .btn-logout-top {
            display: inline-flex; align-items: center; gap: 6px;
            background: none; border: 1.5px solid #fca5a5; color: #dc2626;
            font-size: 13px; font-weight: 500; padding: 7px 14px;
            border-radius: var(--radius-sm); cursor: pointer;
            font-family: 'Plus Jakarta Sans', sans-serif; transition: all 0.15s;
        }
        .btn-logout-top:hover { background: #dc2626; color: white; border-color: #dc2626; }

        /* ─── CONTENT ─── */
        .content { padding: 28px 32px; flex: 1; }

        /* ─── PAGE HEADER ─── */
        .page-header {
            display: flex; align-items: center; justify-content: space-between;
            margin-bottom: 22px;
        }
        .page-header-left h1 {
            font-family: 'Playfair Display', serif;
            font-size: 26px; font-weight: 700; color: var(--forest);
        }
        .page-header-left p { font-size: 13.5px; color: var(--text-muted); margin-top: 3px; }

        /* ─── BUTTONS ─── */
        .btn {
            display: inline-flex; align-items: center; gap: 7px;
            padding: 9px 18px; border-radius: var(--radius-sm);
            font-size: 14px; font-weight: 600;
            font-family: 'Plus Jakarta Sans', sans-serif;
            text-decoration: none; cursor: pointer; border: none; transition: all 0.15s;
        }
        .btn-green { background: var(--green); color: white; box-shadow: 0 2px 8px rgba(61,153,112,0.3); }
        .btn-green:hover { background: #2e7d56; }
        .btn-sm { padding: 6px 12px; font-size: 12.5px; }
        .btn-edit {
            background: #eff6ff; color: #2563eb; border: 1px solid #bfdbfe;
        }
        .btn-edit:hover { background: #2563eb; color: white; border-color: #2563eb; }
        .btn-delete {
            background: #fff1f2; color: #dc2626; border: 1px solid #fecaca;
        }
        .btn-delete:hover { background: #dc2626; color: white; border-color: #dc2626; }

        /* ─── ALERT ─── */
        .alert {
            display: flex; align-items: center; gap: 10px;
            background: var(--green-light); border: 1px solid #6ee7b7;
            color: #065f46; padding: 12px 16px;
            border-radius: var(--radius-sm); margin-bottom: 20px;
            font-size: 14px; font-weight: 500;
        }

        /* ─── SEARCH & FILTER BAR ─── */
        .toolbar {
            display: flex; align-items: center; gap: 10px;
            margin-bottom: 16px; flex-wrap: wrap;
        }
        .search-wrap {
            position: relative; flex: 1; min-width: 200px;
        }
        .search-wrap svg {
            position: absolute; left: 12px; top: 50%; transform: translateY(-50%);
            color: var(--text-muted); pointer-events: none;
        }
        .search-input {
            width: 100%; padding: 9px 12px 9px 38px;
            border: 1px solid var(--border); border-radius: var(--radius-sm);
            font-family: 'Plus Jakarta Sans', sans-serif; font-size: 14px;
            background: var(--surface); color: var(--text);
            transition: border-color 0.15s;
        }
        .search-input:focus { outline: none; border-color: var(--green); }
        .filter-select {
            padding: 9px 14px; border: 1px solid var(--border);
            border-radius: var(--radius-sm); font-family: 'Plus Jakarta Sans', sans-serif;
            font-size: 14px; background: var(--surface); color: var(--text);
            cursor: pointer;
        }
        .filter-select:focus { outline: none; border-color: var(--green); }

        /* ─── TABLE CARD ─── */
        .table-card {
            background: var(--surface); border: 1px solid var(--border);
            border-radius: var(--radius); box-shadow: var(--shadow-sm);
            overflow: hidden;
        }
        table { width: 100%; border-collapse: collapse; }
        thead th {
            font-size: 11.5px; font-weight: 700;
            text-transform: uppercase; letter-spacing: 0.06em;
            color: var(--text-muted); padding: 12px 16px;
            background: var(--sand); border-bottom: 1px solid var(--border);
            text-align: left; white-space: nowrap;
        }
        tbody td {
            padding: 13px 16px; font-size: 14px;
            border-bottom: 1px solid var(--border); color: var(--text);
            vertical-align: middle;
        }
        tbody tr:last-child td { border-bottom: none; }
        tbody tr { transition: background 0.12s; }
        tbody tr:hover td { background: #faf8f4; }

        /* ─── COVER THUMBNAIL ─── */
        .cover-wrap {
            width: 44px; height: 58px;
            border-radius: 6px; overflow: hidden;
            border: 1px solid var(--border);
            background: var(--sand);
            display: flex; align-items: center; justify-content: center;
            flex-shrink: 0;
        }
        .cover-wrap img { width: 100%; height: 100%; object-fit: cover; }
        .cover-placeholder { color: var(--text-muted); }

        /* ─── BOOK TITLE CELL ─── */
        .book-cell { display: flex; align-items: center; gap: 12px; }
        .book-info .book-title { font-weight: 600; font-size: 14px; color: var(--forest); line-height: 1.3; }
        .book-info .book-author { font-size: 12px; color: var(--text-muted); margin-top: 2px; }

        /* ─── ISBN ─── */
        .isbn-code {
            font-size: 12px; font-family: monospace;
            background: var(--sand); padding: 3px 8px;
            border-radius: 5px; color: var(--text-muted);
            white-space: nowrap;
        }

        /* ─── BADGES ─── */
        .badge {
            display: inline-flex; align-items: center; gap: 4px;
            padding: 3px 10px; border-radius: 20px;
            font-size: 12px; font-weight: 600; white-space: nowrap;
        }
        .badge-green  { background: #d1fae5; color: #065f46; }
        .badge-amber  { background: #fef3c7; color: #92400e; }
        .badge-red    { background: #fee2e2; color: #991b1b; }
        .badge-blue   { background: #dbeafe; color: #1d4ed8; }
        .badge-gray   { background: #f1f5f9; color: #475569; }

        /* ─── STOK ─── */
        .stok-cell { display: flex; align-items: center; gap: 6px; }
        .stok-num { font-weight: 700; font-size: 15px; color: var(--forest); }
        .stok-label { font-size: 11px; color: var(--text-muted); }

        /* ─── AKSI ─── */
        .aksi-cell { display: flex; align-items: center; gap: 6px; }

        /* ─── EMPTY STATE ─── */
        .empty-state { padding: 56px; text-align: center; color: var(--text-muted); }
        .empty-icon {
            width: 60px; height: 60px; background: var(--sand); border-radius: 50%;
            display: flex; align-items: center; justify-content: center;
            margin: 0 auto 14px; color: var(--text-muted);
        }
        .empty-state p { font-size: 14px; }

        /* ─── PAGINATION ─── */
        .pagination-wrap {
            padding: 14px 18px;
            border-top: 1px solid var(--border);
            background: var(--sand);
            display: flex; align-items: center; justify-content: space-between;
        }
        .pagination-info { font-size: 13px; color: var(--text-muted); }

        /* ─── RESPONSIVE ─── */
        @media (max-width: 900px) {
            :root { --sidebar-w: 68px; }
            .brand-name, .brand-sub, .nav-label, .nav-text { display: none; }
            .sidebar-brand { justify-content: center; padding: 22px 12px 20px; }
            .nav-item { justify-content: center; padding: 11px; }
            .nav-item.active::before { display: none; }
            .btn-logout-nav { justify-content: center; padding: 11px; }
            .topbar, .content { padding-left: 18px; padding-right: 18px; }
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
        <div>
            <div class="page-title">Kelola Buku</div>
            <div class="page-sub">Manajemen koleksi buku perpustakaan</div>
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

        {{-- Page Header --}}
        <div class="page-header">
            <div class="page-header-left">
                <h1>Daftar Buku</h1>
                <p>Total {{ $books->total() }} buku dalam koleksi</p>
            </div>
            <a href="{{ route('admin.books.create') }}" class="btn btn-green">
                <i data-lucide="plus" width="16" height="16"></i>
                Tambah Buku
            </a>
        </div>

        {{-- Alert --}}
        @if(session('success'))
        <div class="alert">
            <i data-lucide="check-circle" width="16" height="16"></i>
            {{ session('success') }}
        </div>
        @endif

        {{-- Toolbar --}}
        <div class="toolbar">
            <div class="search-wrap">
                <i data-lucide="search" width="15" height="15"></i>
                <input type="text" class="search-input" placeholder="Cari judul, pengarang, atau ISBN...">
            </div>
            <select class="filter-select">
                <option value="">Semua Kategori</option>
                <option>Fiksi</option>
                <option>Non-Fiksi</option>
                <option>Sains</option>
                <option>Sejarah</option>
                <option>Pelajaran</option>
            </select>
            <select class="filter-select">
                <option value="">Semua Kondisi</option>
                <option>Baik</option>
                <option>Rusak</option>
            </select>
        </div>

        {{-- Table --}}
        <div class="table-card">
            <table>
                <thead>
                    <tr>
                        <th>Buku</th>
                        <th>ISBN</th>
                        <th>Kategori</th>
                        <th>Kode Rak</th>
                        <th>Stok</th>
                        <th>Kondisi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($books as $book)
                    <tr>
                        {{-- Buku (cover + judul + pengarang) --}}
                        <td>
                            <div class="book-cell">
                                <div class="cover-wrap">
                                    @if($book->cover)
                                        <img src="{{ Storage::url($book->cover) }}" alt="Cover">
                                    @else
                                        <span class="cover-placeholder">
                                            <i data-lucide="book" width="18" height="18"></i>
                                        </span>
                                    @endif
                                </div>
                                <div class="book-info">
                                    <div class="book-title">{{ $book->judul }}</div>
                                    <div class="book-author">{{ $book->pengarang }} · {{ $book->penerbit }}</div>
                                </div>
                            </div>
                        </td>

                        {{-- ISBN --}}
                        <td><span class="isbn-code">{{ $book->isbn ?? '–' }}</span></td>

                        {{-- Kategori --}}
                        <td>
                            @if($book->kategori)
                                <span class="badge badge-blue">{{ $book->kategori }}</span>
                            @else
                                <span style="color:var(--text-muted)">–</span>
                            @endif
                        </td>

                        {{-- Kode Rak --}}
                        <td>
                            <span style="font-size:13px; font-weight:600; color:var(--forest-soft)">
                                {{ $book->kode_rak ?? '–' }}
                            </span>
                        </td>

                        {{-- Stok --}}
                        <td>
                            <div class="stok-cell">
                                <span class="stok-num">{{ $book->total_stok }}</span>
                                <span class="stok-label">eks</span>
                            </div>
                        </td>

                        {{-- Kondisi --}}
                        <td>
                            @php
                                $kondisi = strtolower($book->kondisi ?? '');
                                $badgeClass = match($kondisi) {
                                    'Baik'        => 'badge-green',
                                    'Rusak'       => 'badge-red',
                                    default       => 'badge-gray',
                                };
                            @endphp
                            <span class="badge {{ $badgeClass }}">{{ $book->kondisi ?? '–' }}</span>
                        </td>

                        {{-- Aksi --}}
                        <td>
                            <div class="aksi-cell">
                                <a href="{{ route('admin.books.edit', $book) }}" class="btn btn-edit btn-sm">
                                    <i data-lucide="pencil" width="13" height="13"></i>
                                    Edit
                                </a>
                                <form action="{{ route('admin.books.destroy', $book) }}" method="POST">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn btn-delete btn-sm"
                                        onclick="return confirm('Yakin ingin menghapus buku ini?')">
                                        <i data-lucide="trash-2" width="13" height="13"></i>
                                        Hapus
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7">
                            <div class="empty-state">
                                <div class="empty-icon">
                                    <i data-lucide="book-x" width="26" height="26"></i>
                                </div>
                                <p>Belum ada buku dalam koleksi.</p>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>

            {{-- Pagination --}}
            @if($books->hasPages())
            <div class="pagination-wrap">
                <span class="pagination-info">
                    Menampilkan {{ $books->firstItem() }}–{{ $books->lastItem() }} dari {{ $books->total() }} buku
                </span>
                {{ $books->links() }}
            </div>
            @endif
        </div>

    </main>
</div>

<script>lucide.createIcons();</script>
</body>
</html>