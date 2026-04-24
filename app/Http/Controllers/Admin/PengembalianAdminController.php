<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Loan;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PengembalianAdminController extends Controller
{
    public function index()
    {
        $pengembalian = Loan::whereNotNull('return_status')
            ->with('user', 'book')
            ->orderBy('return_request_date', 'desc')
            ->paginate(10);
        return view('admin.pengembalian.index', compact('pengembalian'));
    }

    public function tinjau($id)
    {
        $loan = Loan::where('id', $id)
            ->where('return_status', 'pending')
            ->with('user', 'book')
            ->firstOrFail();
        return view('admin.pengembalian.tinjau', compact('loan'));
    }

    public function setujui(Request $request, $id)
    {
        $loan = Loan::findOrFail($id);
        if ($loan->return_status !== 'pending') {
            return redirect()->back()->with('error', 'Pengajuan tidak valid.');
        }

        $request->validate([
            'kondisi_kembali' => 'required|in:baik,rusak_ringan,rusak_berat,hilang',
            'denda_kerusakan' => 'nullable|integer|min:0',
            'catatan_admin' => 'nullable|string|max:500',
        ]);

        // Denda dinonaktifkan sementara
        $loan->kondisi_kembali = $request->kondisi_kembali;
        $loan->denda_kerusakan = 0;
        $loan->total_denda = 0;
        $loan->catatan_admin = $request->catatan_admin;
        $loan->return_status = 'approved';
        $loan->status = 'dikembalikan';
        $loan->tanggal_kembali_realisasi = now()->toDateString();
        $loan->verifikasi_kembali_oleh = Auth::id();

        // Kembalikan stok jika buku tidak hilang
        if ($request->kondisi_kembali !== 'hilang') {
            $book = Book::find($loan->book_id);
            $book->total_stok += 1;
            $book->save();
        }

        $loan->save();

        return redirect()->route('admin.pengembalian.index')->with('success', 'Pengembalian disetujui.');
    }

    public function tolak(Request $request, $id)
    {
        $loan = Loan::findOrFail($id);
        if ($loan->return_status !== 'pending') {
            return redirect()->back()->with('error', 'Pengajuan sudah diproses.');
        }

        $request->validate([
            'alasan_tolak' => 'required|string|min:5|max:500',
        ]);

        $loan->return_status = 'rejected';
        $loan->alasan_tolak = $request->alasan_tolak;
        $loan->save();

        return redirect()->route('admin.pengembalian.index')->with('success', 'Pengajuan ditolak.');
    }
}
