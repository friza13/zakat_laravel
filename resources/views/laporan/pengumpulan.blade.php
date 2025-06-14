@extends('layouts.app')

@section('title', 'Laporan Pengumpulan Zakat')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Laporan Pengumpulan Zakat</h5>
        <a href="{{ route('laporan.pengumpulan.pdf') }}" class="btn btn-danger" target="_blank">
            <i class="fas fa-file-pdf"></i> Export PDF
        </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <th style="width: 40%">Total Muzakki</th>
                        <td>{{ $totalMuzakki }} orang</td>
                    </tr>
                    <tr>
                        <th>Total Jiwa (Tanggungan)</th>
                        <td>{{ $totalJiwa }} orang</td>
                    </tr>
                    <tr>
                        <th>Total Beras</th>
                        <td>{{ number_format($totalBeras, 2) }} kg</td>
                    </tr>
                    <tr>
                        <th>Total Uang</th>
                        <td>Rp {{ number_format($totalUang, 0, ',', '.') }}</td>
                    </tr>
                    <tr>
                        <th>Total Beras dari Uang</th>
                        <td>{{ number_format($totalBerasDariUang, 2) }} kg</td>
                    </tr>
                    <tr class="table-primary">
                        <th>Total Beras Keseluruhan</th>
                        <td>{{ number_format($totalBerasKeseluruhan, 2) }} kg</td>
                    </tr>
                </tbody>
            </table>
        </div>
        
        <div class="mt-3 alert alert-info">
            <p class="mb-0"><strong>Catatan:</strong> Konversi uang ke beras menggunakan harga Rp 35.000 per 2,5 kg beras (Rp 14.000 per kg)</p>
        </div>
    </div>
</div>
@endsection 