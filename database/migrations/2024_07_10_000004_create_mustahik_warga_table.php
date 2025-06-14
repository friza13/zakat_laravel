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
        Schema::create('mustahik_warga', function (Blueprint $table) {
            $table->id('id_mustahikwarga');
            $table->string('nama');
            $table->enum('kategori', ['fakir', 'miskin', 'mampu']);
            $table->float('hak');
            $table->unsignedBigInteger('id_muzakki')->nullable();
            $table->foreign('id_muzakki')->references('id_muzakki')->on('muzakki');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mustahik_warga');
    }
}; 