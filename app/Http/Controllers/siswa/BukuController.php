<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    public function index()
    {
        $books = Book::where('kondisi', 'baik')
            ->where('total_stok', '>', 0)
            ->latest()
            ->paginate(12);

        return view('siswa.pinjam.index', compact('books'));
    }

    public function show($id)
    {
        $book = Book::findOrFail($id);
        return view('siswa.pinjam.show', compact('book'));
    }
}
