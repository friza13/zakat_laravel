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
        Schema::create('bayarzakat', function (Blueprint $table) {
            $table->id('id_zakat');
            $table->string('nama_KK');
            $table->integer('jumlah_tanggungan');
            $table->enum('jenis_bayar', ['beras', 'uang']);
            $table->integer('jumlah_tanggunganyangdibayar');
            $table->float('bayar_beras')->nullable();
            $table->decimal('bayar_uang', 10, 2)->nullable();
            $table->unsignedBigInteger('id_muzakki');
            $table->foreign('id_muzakki')->references('id_muzakki')->on('muzakki');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bayarzakat');
    }
}; 