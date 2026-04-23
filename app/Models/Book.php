<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'isbn',
        'judul',
        'kategori',
        'pengarang',
        'kode_rak',
        'penerbit',
        'tahun_terbit',
        'cover',
        'deskripsi',
        'total_stok',
        'kondisi',
    ];
}