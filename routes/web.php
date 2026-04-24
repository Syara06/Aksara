<?php

use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Admin\BookController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\LoanController;
use App\Http\Controllers\SiswaDashboardController;
use Illuminate\Support\Facades\Route;

// Halaman welcome
Route::get('/', function () {
    return view('welcome');
});

// Auth
Route::get('/register', [RegisterController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Dashboard Siswa (hanya untuk role peminjam)
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard/siswa', [App\Http\Controllers\siswa\SiswaDashboardController::class, 'index'])->name('siswa.dashboard');
});

// Fitur siswa (peminjaman & riwayat)
Route::middleware(['auth'])->group(function () {
    Route::get('/buku', [App\Http\Controllers\Siswa\BukuController::class, 'index'])->name('siswa.buku.index');
    Route::get('/buku/{id}', [App\Http\Controllers\Siswa\BukuController::class, 'show'])->name('siswa.buku.show');
    Route::get('/pinjam/{book_id}/form', [LoanController::class, 'formPinjam'])->name('pinjam.form');
    Route::post('/pinjam', [LoanController::class, 'ajukanPinjam'])->name('pinjam.ajukan');
    Route::get('/riwayat', [LoanController::class, 'riwayatPinjam'])->name('riwayat.pinjam');
    Route::get('/pengembalian', [App\Http\Controllers\PengembalianController::class, 'index'])->name('pengembalian.index');
    Route::get('/pengembalian/{loanId}', [App\Http\Controllers\PengembalianController::class, 'form'])->name('pengembalian.form');
    Route::post('/pengembalian/{loanId}', [App\Http\Controllers\PengembalianController::class, 'ajukan'])->name('pengembalian.ajukan');
    Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile.index');
    Route::put('/profile', [App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
});

// Admin Dashboard & Fitur Admin (hanya role admin)
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    // Dashboard admin
    Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');

    // Kelola Buku
    Route::resource('books', BookController::class);

    // Kelola Anggota
    Route::resource('users', UserController::class);

    // Verifikasi Pengajuan Peminjaman
    Route::get('/loans/pengajuan', [LoanController::class, 'daftarPengajuan'])->name('loans.pengajuan');
    Route::post('/loans/setujui/{id}', [LoanController::class, 'setujui'])->name('loans.setujui');
    Route::post('/loans/tolak/{id}', [LoanController::class, 'tolak'])->name('loans.tolak');
    // Verifikasi Pengajuan Pengembalian
    Route::get('/loans/active', [LoanController::class, 'daftarPeminjamanAktif'])->name('loans.active');
    Route::post('/loans/kembali/{id}', [LoanController::class, 'prosesKembali'])->name('loans.kembali');
    // Pengelolaan pengajuan pengembalian
    Route::get('/pengembalian', [App\Http\Controllers\Admin\PengembalianAdminController::class, 'index'])->name('pengembalian.index');
    Route::get('/pengembalian/{id}/tinjau', [App\Http\Controllers\Admin\PengembalianAdminController::class, 'tinjau'])->name('pengembalian.tinjau');
    Route::post('/pengembalian/{id}/setujui', [App\Http\Controllers\Admin\PengembalianAdminController::class, 'setujui'])->name('pengembalian.setujui');
    Route::post('/pengembalian/{id}/tolak', [App\Http\Controllers\Admin\PengembalianAdminController::class, 'tolak'])->name('pengembalian.tolak');
});
