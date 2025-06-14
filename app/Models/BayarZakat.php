<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BayarZakat extends Model
{
    use HasFactory;

    protected $table = 'bayarzakat';
    protected $primaryKey = 'id_zakat';
    protected $fillable = [
        'nama_KK',
        'jumlah_tanggungan',
        'jenis_bayar',
        'jumlah_tanggunganyangdibayar',
        'bayar_beras',
        'bayar_uang',
        'id_muzakki'
    ];

    public function muzakki()
    {
        return $this->belongsTo(Muzakki::class, 'id_muzakki', 'id_muzakki');
    }
} 