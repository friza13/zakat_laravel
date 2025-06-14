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
        Schema::create('mustahik_lainnya', function (Blueprint $table) {
            $table->id('id_mustahiklainnya');
            $table->string('nama');
            $table->enum('kategori', ['amilin', 'fisabilillah', 'mualaf', 'ibnu sabil']);
            $table->float('hak');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mustahik_lainnya');
    }
}; 