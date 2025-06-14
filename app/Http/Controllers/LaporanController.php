<?php

namespace App\Http\Controllers;

use App\Models\BayarZakat;
use App\Models\MustahikWarga;
use App\Models\MustahikLainnya;
use Illuminate\Http\Request;
use PDF;

class LaporanController extends Controller
{
    // Konstanta konversi
    const HARGA_BERAS_PER_KG = 14000; // Rp 35000 / 2.5 kg = Rp 14000 per kg

    public function pengumpulanIndex()
    {
        $totalMuzakki = BayarZakat::count();
        $totalJiwa = BayarZakat::sum('jumlah_tanggungan');
        $totalBeras = BayarZakat::sum('bayar_beras');
        $totalUang = BayarZakat::sum('bayar_uang');
        
        // Konversi uang ke beras
        $totalBerasDariUang = $totalUang / self::HARGA_BERAS_PER_KG;
        $totalBerasKeseluruhan = $totalBeras + $totalBerasDariUang;

        return view('laporan.pengumpulan', compact(
            'totalMuzakki', 
            'totalJiwa', 
            'totalBeras', 
            'totalUang',
            'totalBerasDariUang',
            'totalBerasKeseluruhan'
        ));
    }

    public function pengumpulanPdf()
    {
        $totalMuzakki = BayarZakat::count();
        $totalJiwa = BayarZakat::sum('jumlah_tanggungan');
        $totalBeras = BayarZakat::sum('bayar_beras');
        $totalUang = BayarZakat::sum('bayar_uang');
        
        // Konversi uang ke beras
        $totalBerasDariUang = $totalUang / self::HARGA_BERAS_PER_KG;
        $totalBerasKeseluruhan = $totalBeras + $totalBerasDariUang;

        $pdf = PDF::loadView('laporan.pengumpulan_pdf', compact(
            'totalMuzakki', 
            'totalJiwa', 
            'totalBeras', 
            'totalUang',
            'totalBerasDariUang',
            'totalBerasKeseluruhan'
        ));

        return $pdf->download('laporan-pengumpulan-zakat.pdf');
    }

    public function distribusiIndex()
    {
        // Hitung total zakat dalam bentuk beras
        $totalBeras = BayarZakat::sum('bayar_beras');
        $totalUang = BayarZakat::sum('bayar_uang');
        $totalBerasDariUang = $totalUang / self::HARGA_BERAS_PER_KG;
        $totalBerasKeseluruhan = $totalBeras + $totalBerasDariUang;
        
        // Hitung jumlah hak per kategori mustahik
        $mustahikWarga = $this->getHakMustahikWarga();
        $mustahikLainnya = $this->getHakMustahikLainnya();
        
        // Hitung total hak keseluruhan
        $totalHakWarga = $mustahikWarga->sum('total_hak');
        $totalHakLainnya = $mustahikLainnya->sum('total_hak');
        $totalHakKeseluruhan = $totalHakWarga + $totalHakLainnya;
        
        // Hitung zakat per hak (kg beras per 1 hak)
        $zakatPerHak = $totalHakKeseluruhan > 0 ? $totalBerasKeseluruhan / $totalHakKeseluruhan : 0;
        
        return view('laporan.distribusi', compact(
            'mustahikWarga', 
            'mustahikLainnya', 
            'totalBerasKeseluruhan',
            'totalHakKeseluruhan',
            'zakatPerHak'
        ));
    }

    public function distribusiPdf()
    {
        // Hitung total zakat dalam bentuk beras
        $totalBeras = BayarZakat::sum('bayar_beras');
        $totalUang = BayarZakat::sum('bayar_uang');
        $totalBerasDariUang = $totalUang / self::HARGA_BERAS_PER_KG;
        $totalBerasKeseluruhan = $totalBeras + $totalBerasDariUang;
        
        // Hitung jumlah hak per kategori mustahik
        $mustahikWarga = $this->getHakMustahikWarga();
        $mustahikLainnya = $this->getHakMustahikLainnya();
        
        // Hitung total hak keseluruhan
        $totalHakWarga = $mustahikWarga->sum('total_hak');
        $totalHakLainnya = $mustahikLainnya->sum('total_hak');
        $totalHakKeseluruhan = $totalHakWarga + $totalHakLainnya;
        
        // Hitung zakat per hak (kg beras per 1 hak)
        $zakatPerHak = $totalHakKeseluruhan > 0 ? $totalBerasKeseluruhan / $totalHakKeseluruhan : 0;

        $pdf = PDF::loadView('laporan.distribusi_pdf', compact(
            'mustahikWarga', 
            'mustahikLainnya',
            'totalBerasKeseluruhan',
            'totalHakKeseluruhan',
            'zakatPerHak'
        ));

        return $pdf->download('laporan-distribusi-zakat.pdf');
    }
    
    // Helper method untuk menghitung hak mustahik warga
    private function getHakMustahikWarga()
    {
        $result = MustahikWarga::select('kategori')
            ->selectRaw('COUNT(*) as jumlah_orang')
            ->groupBy('kategori')
            ->get();
            
        foreach ($result as $item) {
            // Hak per orang berdasarkan kategori
            if ($item->kategori == 'fakir') {
                $item->hak_per_orang = 4;
            } elseif ($item->kategori == 'miskin') {
                $item->hak_per_orang = 3;
            } else { // mampu
                $item->hak_per_orang = 0;
            }
            
            // Total hak = jumlah orang × hak per orang
            $item->total_hak = $item->jumlah_orang * $item->hak_per_orang;
        }
        
        return $result;
    }
    
    // Helper method untuk menghitung hak mustahik lainnya
    private function getHakMustahikLainnya()
    {
        $result = MustahikLainnya::select('kategori')
            ->selectRaw('COUNT(*) as jumlah_orang')
            ->groupBy('kategori')
            ->get();
            
        foreach ($result as $item) {
            // Semua kategori lainnya mendapat 2 hak per orang
            $item->hak_per_orang = 2;
            
            // Total hak = jumlah orang × hak per orang
            $item->total_hak = $item->jumlah_orang * $item->hak_per_orang;
        }
        
        return $result;
    }
} 