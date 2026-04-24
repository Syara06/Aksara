<?php

namespace App\Http\Controllers\Admin;

use App\Models\Loan;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class LoanController extends Controller
{
    // === SISWA ===

    public function daftarBuku()
    {
        $books = Book::where('kondisi', 'baik')->where('total_stok', '>', 0)->get();
        return view('siswa.pinjam.index', compact('books'));
    }

    public function formPinjam($book_id)
    {
        $book = Book::findOrFail($book_id);
        if ($book->kondisi !== 'baik' || $book->total_stok <= 0) {
            return redirect()->route('siswa.buku.index')->with('error', 'Buku tidak tersedia.');
        }
        return view('siswa.pinjam.create', compact('book'));
    }

    public function ajukanPinjam(Request $request)
    {
        $request->validate([
            'book_id' => 'required|exists:books,id',
            'tanggal_pinjam' => 'required|date',
            'tanggal_kembali_rencana' => 'required|date|after:tanggal_pinjam',
        ]);

        Loan::create([
            'user_id' => Auth::id(),
            'book_id' => $request->book_id,
            'tanggal_pinjam' => $request->tanggal_pinjam,
            'tanggal_kembali_rencana' => $request->tanggal_kembali_rencana,
            'status' => 'pengajuan',
        ]);

        return redirect()->route('riwayat.pinjam')->with('success', 'Pengajuan peminjaman berhasil dikirim.');
    }

    public function riwayatPinjam()
    {
        $loans = Loan::where('user_id', Auth::id())->with('book')->latest()->get();
        return view('siswa.pinjam.riwayat', compact('loans'));
    }

    // === ADMIN ===
    //Pengajuan peminjaman
    public function daftarPengajuan()
    {
        $pengajuan = Loan::where('status', 'pengajuan')->with('user', 'book')->latest()->get();
        return view('admin.loans.pengajuan', compact('pengajuan'));
    }

    public function setujui($id)
    {
        $loan = Loan::findOrFail($id);
        $book = Book::findOrFail($loan->book_id);

        if ($book->total_stok <= 0) {
            return redirect()->back()->with('error', 'Stok buku habis, tidak bisa menyetujui.');
        }

        // Kurangi stok
        $book->total_stok -= 1;
        $book->save();

        $loan->status = 'dipinjam';
        $loan->verifikasi_pinjam_oleh = Auth::id();
        $loan->save();

        return redirect()->route('admin.loans.pengajuan')->with('success', 'Pengajuan disetujui.');
    }

    public function tolak(Request $request, $id)
    {
        $request->validate([
            'alasan_tolak' => 'required|string|min:5',
        ]);

        $loan = Loan::findOrFail($id);
        $loan->status = 'ditolak';
        $loan->alasan_tolak = $request->alasan_tolak;
        $loan->verifikasi_pinjam_oleh = Auth::id();
        $loan->save();

        return redirect()->route('admin.loans.pengajuan')->with('success', 'Pengajuan ditolak.');
    }

    //Pengembalian
    
}
