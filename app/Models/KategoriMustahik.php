<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriMustahik extends Model
{
    use HasFactory;

    protected $table = 'kategori_mustahik';
    protected $primaryKey = 'id_kategori';
    protected $fillable = ['nama_kategori', 'jumlah_hak'];
} 