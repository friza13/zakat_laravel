<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Muzakki extends Model
{
    use HasFactory;

    protected $table = 'muzakki';
    protected $primaryKey = 'id_muzakki';
    protected $fillable = ['nama_muzakki', 'jumlah_tanggungan', 'keterangan'];

    public function bayarZakat()
    {
        return $this->hasMany(BayarZakat::class, 'id_muzakki', 'id_muzakki');
    }

    public function mustahikWarga()
    {
        return $this->hasMany(MustahikWarga::class, 'id_muzakki', 'id_muzakki');
    }
} 