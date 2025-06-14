<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MustahikWarga extends Model
{
    use HasFactory;

    protected $table = 'mustahik_warga';
    protected $primaryKey = 'id_mustahikwarga';
    protected $fillable = ['nama', 'kategori', 'hak'];
} 