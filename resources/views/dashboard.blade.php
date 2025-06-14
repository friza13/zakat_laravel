@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="row">
    <div class="col-md-4 mb-4">
        <div class="card border-primary">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h5 class="card-title">Total Muzakki</h5>
                        <h2 class="mb-0">{{ $totalMuzakki }}</h2>
                    </div>
                    <div class="bg-primary rounded p-3">
                        <i class="fas fa-users fa-2x text-white"></i>
                    </div>
                </div>
                <a href="{{ route('muzakki.index') }}" class="btn btn-sm btn-outline-primary mt-3">Lihat Detail</a>
            </div>
        </div>
    </div>
    
    <div class="col-md-4 mb-4">
        <div class="card border-success">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h5 class="card-title">Zakat Terkumpul</h5>
                        <h2 class="mb-0">{{ $totalZakatTerkumpul }}</h2>
                    </div>
                    <div class="bg-success rounded p-3">
                        <i class="fas fa-money-bill-wave fa-2x text-white"></i>
                    </div>
                </div>
                <a href="{{ route('bayarzakat.index') }}" class="btn btn-sm btn-outline-success mt-3">Lihat Detail</a>
            </div>
        </div>
    </div>
    
    <div class="col-md-4 mb-4">
        <div class="card border-info">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h5 class="card-title">Total Mustahik</h5>
                        <h2 class="mb-0">{{ $totalMustahikWarga + $totalMustahikLainnya }}</h2>
                    </div>
                    <div class="bg-info rounded p-3">
                        <i class="fas fa-hands-helping fa-2x text-white"></i>
                    </div>
                </div>
                <div class="d-flex justify-content-between mt-3">
                    <a href="{{ route('mustahikwarga.index') }}" class="btn btn-sm btn-outline-info">Mustahik Warga</a>
                    <a href="{{ route('mustahiklainnya.index') }}" class="btn btn-sm btn-outline-info">Mustahik Lainnya</a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6 mb-4">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">Pengumpulan Zakat</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-borderless">
                        <tr>
                            <td>Total Beras</td>
                            <td>:</td>
                            <td>{{ number_format($totalBeras, 2) }} kg</td>
                        </tr>
                        <tr>
                            <td>Total Uang</td>
                            <td>:</td>
                            <td>Rp {{ number_format($totalUang, 0, ',', '.') }}</td>
                        </tr>
                    </table>
                </div>
                <a href="{{ route('laporan.pengumpulan') }}" class="btn btn-primary mt-2">Lihat Laporan Pengumpulan</a>
            </div>
        </div>
    </div>
    
    <div class="col-md-6 mb-4">
        <div class="card">
            <div class="card-header bg-success text-white">
                <h5 class="mb-0">Distribusi Zakat</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-borderless">
                        <tr>
                            <td>Mustahik Warga</td>
                            <td>:</td>
                            <td>{{ $totalMustahikWarga }} orang</td>
                        </tr>
                        <tr>
                            <td>Mustahik Lainnya</td>
                            <td>:</td>
                            <td>{{ $totalMustahikLainnya }} orang</td>
                        </tr>
                    </table>
                </div>
                <a href="{{ route('laporan.distribusi') }}" class="btn btn-success mt-2">Lihat Laporan Distribusi</a>
            </div>
        </div>
    </div>
</div>
@endsection 