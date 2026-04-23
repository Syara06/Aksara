<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'book_id',
        'tanggal_pinjam',
        'tanggal_kembali_rencana',
        'tanggal_kembali_realisasi',
        'status',
        'denda',
        'verifikasi_pinjam_oleh',
        'verifikasi_kembali_oleh',
        'catatan',
        'alasan_tolak',
    ];

    // Relasi ke User (peminjam)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi ke Book
    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    // Relasi ke User (admin yang memverifikasi pinjam)
    public function verifikatorPinjam()
    {
        return $this->belongsTo(User::class, 'verifikasi_pinjam_oleh');
    }

    // Relasi ke User (admin yang memverifikasi kembali)
    public function verifikatorKembali()
    {
        return $this->belongsTo(User::class, 'verifikasi_kembali_oleh');
    }
}