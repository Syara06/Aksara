<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Loan;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $totalBuku = Book::count();
        $sedangDipinjam = Loan::where('status', 'dipinjam')->count();
        $terlambat = Loan::where('status', 'dipinjam')
            ->where('tanggal_kembali_rencana', '<', now()->toDateString())
            ->count();

        $totalAnggota = User::where('role', 'peminjam')->count();

        return view('admin.dashboard', compact('totalBuku', 'sedangDipinjam', 'terlambat', 'totalAnggota'));
    }
}
