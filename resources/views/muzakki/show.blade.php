@extends('layouts.app')

@section('title', 'Detail Muzakki')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Detail Muzakki</h5>
        <div class="btn-group" role="group">
            <a href="{{ route('muzakki.edit', $muzakki->id_muzakki) }}" class="btn btn-warning">
                <i class="fas fa-edit"></i> Edit
            </a>
            <a href="{{ route('muzakki.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Kembali
            </a>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <th style="width: 30%">ID Muzakki</th>
                        <td>{{ $muzakki->id_muzakki }}</td>
                    </tr>
                    <tr>
                        <th>Nama Muzakki</th>
                        <td>{{ $muzakki->nama_muzakki }}</td>
                    </tr>
                    <tr>
                        <th>Jumlah Tanggungan</th>
                        <td>{{ $muzakki->jumlah_tanggungan }} orang</td>
                    </tr>
                    <tr>
                        <th>Keterangan</th>
                        <td>{{ $muzakki->keterangan ?? '-' }}</td>
                    </tr>
                    <tr>
                        <th>Tanggal Dibuat</th>
                        <td>{{ $muzakki->created_at->format('d-m-Y H:i:s') }}</td>
                    </tr>
                    <tr>
                        <th>Tanggal Diperbarui</th>
                        <td>{{ $muzakki->updated_at->format('d-m-Y H:i:s') }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="row mt-4">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Riwayat Pembayaran Zakat</h5>
            </div>
            <div class="card-body">
                @if($muzakki->bayarZakat->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal</th>
                                    <th>Jenis Bayar</th>
                                    <th>Jumlah</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($muzakki->bayarZakat as $zakat)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $zakat->created_at->format('d-m-Y') }}</td>
                                    <td>{{ ucfirst($zakat->jenis_bayar) }}</td>
                                    <td>
                                        @if($zakat->jenis_bayar == 'beras')
                                            {{ $zakat->bayar_beras }} kg
                                        @else
                                            Rp {{ number_format($zakat->bayar_uang, 0, ',', '.') }}
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <p class="text-center">Belum ada riwayat pembayaran zakat</p>
                @endif
            </div>
        </div>
    </div>
    
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Status Mustahik</h5>
            </div>
            <div class="card-body">
                @if($muzakki->mustahikWarga->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kategori</th>
                                    <th>Hak</th>
                                    <th>Tanggal</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($muzakki->mustahikWarga as $mustahik)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ ucfirst($mustahik->kategori) }}</td>
                                    <td>{{ $mustahik->hak }} kg</td>
                                    <td>{{ $mustahik->created_at->format('d-m-Y') }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <p class="text-center">Belum ada status mustahik</p>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection 