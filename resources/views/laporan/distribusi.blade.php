@extends('layouts.app')

@section('title', 'Laporan Distribusi Zakat')

@section('content')
<div class="card mb-4">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Laporan Distribusi Zakat</h5>
        <a href="{{ route('laporan.distribusi.pdf') }}" class="btn btn-danger" target="_blank">
            <i class="fas fa-file-pdf"></i> Export PDF
        </a>
    </div>
    <div class="card-body">
        <div class="alert alert-info mb-4">
            <p class="mb-0"><strong>Zakat per Hak:</strong> {{ number_format($zakatPerHak, 2) }} kg beras</p>
        </div>
        
        <h5 class="border-bottom pb-2 mb-3">A. Distribusi Ke Mustahik Warga</h5>
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kategori Mustahik</th>
                        <th>Jumlah Orang</th>
                        <th>Hak per Orang</th>
                        <th>Total Hak</th>
                        <th>Beras yang Diterima</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($mustahikWarga as $mustahik)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ ucfirst($mustahik->kategori) }}</td>
                            <td>{{ $mustahik->jumlah_orang }}</td>
                            <td>{{ $mustahik->hak_per_orang }}</td>
                            <td>{{ $mustahik->total_hak }}</td>
                            <td>{{ number_format($mustahik->total_hak * $zakatPerHak, 2) }} kg</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">Tidak ada data distribusi mustahik warga</td>
                        </tr>
                    @endforelse
                    @if($mustahikWarga->count() > 0)
                        <tr class="table-primary">
                            <th colspan="2">Total</th>
                            <th>{{ $mustahikWarga->sum('jumlah_orang') }}</th>
                            <th>-</th>
                            <th>{{ $mustahikWarga->sum('total_hak') }}</th>
                            <th>{{ number_format($mustahikWarga->sum('total_hak') * $zakatPerHak, 2) }} kg</th>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
        
        <h5 class="border-bottom pb-2 mb-3 mt-4">B. Distribusi Ke Mustahik Lainnya</h5>
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kategori Mustahik</th>
                        <th>Jumlah Orang</th>
                        <th>Hak per Orang</th>
                        <th>Total Hak</th>
                        <th>Beras yang Diterima</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($mustahikLainnya as $mustahik)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ ucfirst($mustahik->kategori) }}</td>
                            <td>{{ $mustahik->jumlah_orang }}</td>
                            <td>{{ $mustahik->hak_per_orang }}</td>
                            <td>{{ $mustahik->total_hak }}</td>
                            <td>{{ number_format($mustahik->total_hak * $zakatPerHak, 2) }} kg</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">Tidak ada data distribusi mustahik lainnya</td>
                        </tr>
                    @endforelse
                    @if($mustahikLainnya->count() > 0)
                        <tr class="table-primary">
                            <th colspan="2">Total</th>
                            <th>{{ $mustahikLainnya->sum('jumlah_orang') }}</th>
                            <th>-</th>
                            <th>{{ $mustahikLainnya->sum('total_hak') }}</th>
                            <th>{{ number_format($mustahikLainnya->sum('total_hak') * $zakatPerHak, 2) }} kg</th>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
        
        <h5 class="border-bottom pb-2 mb-3 mt-4">C. Rekapitulasi Distribusi Zakat</h5>
        <div class="table-responsive">
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <th style="width: 60%">Total Mustahik (Warga + Lainnya)</th>
                        <td>{{ $mustahikWarga->sum('jumlah_orang') + $mustahikLainnya->sum('jumlah_orang') }} orang</td>
                    </tr>
                    <tr>
                        <th>Total Hak Keseluruhan</th>
                        <td>{{ $totalHakKeseluruhan }} hak</td>
                    </tr>
                    <tr>
                        <th>Zakat per Hak</th>
                        <td>{{ number_format($zakatPerHak, 2) }} kg beras</td>
                    </tr>
                    <tr>
                        <th>Total Beras yang Didistribusikan</th>
                        <td>{{ number_format($totalBerasKeseluruhan, 2) }} kg</td>
                    </tr>
                </tbody>
            </table>
        </div>
        
        <div class="mt-3 alert alert-info">
            <h6 class="mb-2 font-weight-bold">Catatan Perhitungan:</h6>
            <ol class="mb-0">
                <li>Hak per orang ditetapkan berdasarkan kategori:
                    <ul>
                        <li>Fakir: 4 hak</li>
                        <li>Miskin: 3 hak</li>
                        <li>Amil, Fisabilillah, dll: 2 hak</li>
                        <li>Mampu: 0 hak</li>
                    </ul>
                </li>
                <li>Total hak = Jumlah orang × Hak per orang</li>
                <li>Zakat per hak = Total beras keseluruhan ÷ Total hak keseluruhan</li>
                <li>Beras yang diterima = Total hak × Zakat per hak</li>
            </ol>
        </div>
    </div>
</div>
@endsection 