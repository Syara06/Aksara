<?php

namespace App\Http\Controllers\siswa;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class SiswaDashboardController extends Controller
{
    public function index()
    {
        // Pastikan hanya role peminjam yang bisa akses
        if (Auth::user()->role !== 'peminjam') {
            return redirect()->route('admin.dashboard')->with('error', 'Anda tidak memiliki akses ke halaman siswa.');
        }
        return view('siswa.dashboard');
    }
}