<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('mustahik_warga', function (Blueprint $table) {
            // Menghapus foreign key constraint terlebih dahulu
            $table->dropForeign(['id_muzakki']);
            
            // Menghapus kolom id_muzakki
            $table->dropColumn('id_muzakki');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('mustahik_warga', function (Blueprint $table) {
            // Menambahkan kembali kolom id_muzakki
            $table->unsignedBigInteger('id_muzakki')->nullable();
            
            // Menambahkan kembali foreign key constraint
            $table->foreign('id_muzakki')->references('id_muzakki')->on('muzakki');
        });
    }
};
