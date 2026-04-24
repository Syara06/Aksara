<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('loans', function (Blueprint $table) {
            $table->enum('return_status', ['pending', 'approved', 'rejected'])->nullable()->after('status');
            $table->date('return_request_date')->nullable()->after('return_status');
            $table->text('alasan_keterlambatan')->nullable()->after('return_request_date');
            $table->enum('kondisi_kembali', ['baik', 'rusak_ringan', 'rusak_berat', 'hilang'])->nullable()->after('alasan_keterlambatan');
            $table->integer('denda_terlambat')->default(0)->after('kondisi_kembali');
            $table->integer('denda_kerusakan')->default(0)->after('denda_terlambat');
            $table->integer('total_denda')->default(0)->after('denda_kerusakan');
            $table->text('catatan_admin')->nullable()->after('total_denda');
            $table->string('alasan_tolak')->nullable()->after('catatan_admin');
        });
    }

    public function down()
    {
        Schema::table('loans', function (Blueprint $table) {
            $table->dropColumn([
                'return_status',
                'return_request_date',
                'alasan_keterlambatan',
                'kondisi_kembali',
                'denda_terlambat',
                'denda_kerusakan',
                'total_denda',
                'catatan_admin',
                'alasan_tolak'
            ]);
        });
    }
};
