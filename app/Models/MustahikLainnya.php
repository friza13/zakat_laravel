<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MustahikLainnya extends Model
{
    use HasFactory;

    protected $table = 'mustahik_lainnya';
    protected $primaryKey = 'id_mustahiklainnya';
    protected $fillable = ['nama', 'kategori', 'hak'];
} 