<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('isbn', 20)->unique();                 
            $table->string('judul');
            $table->string('kategori')->nullable();               
            $table->string('pengarang');
            $table->string('kode_rak')->nullable();               
            $table->string('penerbit')->nullable();
            $table->year('tahun_terbit')->nullable();             
            $table->string('cover')->nullable();                  
            $table->text('deskripsi')->nullable();                
            $table->integer('total_stok')->default(1);            
            $table->enum('kondisi', ['baik', 'rusak'])->default('baik');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};