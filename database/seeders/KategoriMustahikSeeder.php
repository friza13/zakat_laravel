<?php

namespace Database\Seeders;

use App\Models\KategoriMustahik;
use Illuminate\Database\Seeder;

class KategoriMustahikSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $kategoris = [
            [
                'nama_kategori' => 'Fakir',
                'jumlah_hak' => 4.0
            ],
            [
                'nama_kategori' => 'Miskin',
                'jumlah_hak' => 3.0
            ],
            [
                'nama_kategori' => 'Mampu',
                'jumlah_hak' => 0.0
            ],
            [
                'nama_kategori' => 'Amilin',
                'jumlah_hak' => 2.0
            ],
            [
                'nama_kategori' => 'Fisabilillah',
                'jumlah_hak' => 2.0
            ],
            [
                'nama_kategori' => 'Mualaf',
                'jumlah_hak' => 2.0
            ],
            [
                'nama_kategori' => 'Ibnu Sabil',
                'jumlah_hak' => 2.0
            ],
        ];

        foreach ($kategoris as $kategori) {
            KategoriMustahik::create($kategori);
        }
    }
} 