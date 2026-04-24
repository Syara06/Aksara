<?php

namespace App\Http\Controllers;

use App\Models\Loan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class PengembalianController extends Controller
{
     public function index()
    {
        $userId = Auth::id();

        $pengajuan = Loan::where('return_status', 'pending')
            ->where('user_id', $userId)
            ->with('user', 'book')
            ->orderBy('return_request_date', 'desc')
            ->get();
        return view('admin.pengembalian.index', compact('pengajuan'));
    }

    // Tampilkan form pengajuan untuk satu peminjaman
    public function form($loanId)
    {
        $loan = Loan::where('id', $loanId)
            ->where('user_id', Auth::id())
            ->where('status', 'dipinjam')
            ->whereNull('return_status')
            ->firstOrFail();

        // Denda dinonaktifkan sementara
        $hariTerlambat = 0;
        $dendaPerHari = 0;
        $estimasiDenda = 0;

        return view('admin.pengembalian.form', compact('loan', 'hariTerlambat', 'estimasiDenda', 'dendaPerHari'));
    }

    // Proses simpan pengajuan
    public function ajukan(Request $request, $loanId)
    {
        $loan = Loan::where('id', $loanId)
            ->where('user_id', Auth::id())
            ->where('status', 'dipinjam')
            ->whereNull('return_status')
            ->firstOrFail();

        $request->validate([
            'alasan_keterlambatan' => 'nullable|string|max:500',
        ]);

        // Denda dinonaktifkan sementara
        $loan->return_status = 'pending';
        $loan->return_request_date = now()->toDateString();
        $loan->alasan_keterlambatan = $request->alasan_keterlambatan;
        $loan->denda_terlambat = 0;
        $loan->total_denda = 0;
        $loan->save();

        return redirect()->route('riwayat.pinjam')->with('success', 'Pengajuan pengembalian dikirim, menunggu verifikasi admin.');
    }
}
