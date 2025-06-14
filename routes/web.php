<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MuzakkiController;
use App\Http\Controllers\KategoriMustahikController;
use App\Http\Controllers\BayarZakatController;
use App\Http\Controllers\MustahikWargaController;
use App\Http\Controllers\MustahikLainnyaController;
use App\Http\Controllers\LaporanController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Auth routes
Route::middleware(['guest'])->group(function () {
    Route::get('/', [AuthController::class, 'showLoginForm'])->name('login.form');
    Route::post('/', [AuthController::class, 'login'])->name('login');
});

Route::middleware(['auth'])->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Muzakki
    Route::resource('muzakki', MuzakkiController::class);

    // Kategori Mustahik
    Route::resource('kategori', KategoriMustahikController::class);

    // Bayar Zakat
    Route::resource('bayarzakat', BayarZakatController::class);

    // Mustahik Warga
    Route::resource('mustahikwarga', MustahikWargaController::class);

    // Mustahik Lainnya
    Route::resource('mustahiklainnya', MustahikLainnyaController::class);

    // Laporan
    Route::get('/laporan/pengumpulan', [LaporanController::class, 'pengumpulanIndex'])->name('laporan.pengumpulan');
    Route::get('/laporan/pengumpulan/pdf', [LaporanController::class, 'pengumpulanPdf'])->name('laporan.pengumpulan.pdf');
    Route::get('/laporan/distribusi', [LaporanController::class, 'distribusiIndex'])->name('laporan.distribusi');
    Route::get('/laporan/distribusi/pdf', [LaporanController::class, 'distribusiPdf'])->name('laporan.distribusi.pdf');
});
