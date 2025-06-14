<?php

namespace App\Http\Controllers;

use App\Models\BayarZakat;
use App\Models\Muzakki;
use App\Models\MustahikWarga;
use App\Models\MustahikLainnya;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalMuzakki = Muzakki::count();
        $totalZakatTerkumpul = BayarZakat::count();
        $totalMustahikWarga = MustahikWarga::count();
        $totalMustahikLainnya = MustahikLainnya::count();
        $totalBeras = BayarZakat::sum('bayar_beras');
        $totalUang = BayarZakat::sum('bayar_uang');

        return view('dashboard', compact(
            'totalMuzakki',
            'totalZakatTerkumpul',
            'totalMustahikWarga',
            'totalMustahikLainnya',
            'totalBeras',
            'totalUang'
        ));
    }
} 