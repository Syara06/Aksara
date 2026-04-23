<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('loans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('book_id')->constrained()->onDelete('cascade');
            $table->date('tanggal_pinjam');
            $table->date('tanggal_kembali_rencana')->nullable();
            $table->date('tanggal_kembali_realisasi')->nullable();
            $table->enum('status', ['pengajuan', 'dipinjam', 'dikembalikan', 'ditolak'])->default('pengajuan');
            $table->integer('denda')->default(0);
            $table->foreignId('verifikasi_pinjam_oleh')->nullable()->constrained('users');
            $table->foreignId('verifikasi_kembali_oleh')->nullable()->constrained('users');
            $table->text('catatan')->nullable();
            $table->text('alasan_tolak')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('loans');
    }
};