@extends('layouts.app')

@section('title', 'Pengumpulan Zakat')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Daftar Pengumpulan Zakat</h5>
        <a href="{{ route('bayarzakat.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Tambah Pengumpulan
        </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama KK</th>
                        <th>Muzakki</th>
                        <th>Tanggungan</th>
                        <th>Jenis Bayar</th>
                        <th>Jumlah</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($zakatList as $zakat)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $zakat->nama_KK }}</td>
                        <td>{{ $zakat->muzakki->nama_muzakki }}</td>
                        <td>{{ $zakat->jumlah_tanggungan }} ({{ $zakat->jumlah_tanggunganyangdibayar }} dibayar)</td>
                        <td>{{ ucfirst($zakat->jenis_bayar) }}</td>
                        <td>
                            @if($zakat->jenis_bayar == 'beras')
                                {{ $zakat->bayar_beras }} kg
                            @else
                                Rp {{ number_format($zakat->bayar_uang, 0, ',', '.') }}
                            @endif
                        </td>
                        <td>
                            <div class="btn-group" role="group">
                                <a href="{{ route('bayarzakat.show', $zakat->id_zakat) }}" class="btn btn-info btn-sm">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('bayarzakat.edit', $zakat->id_zakat) }}" class="btn btn-warning btn-sm">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('bayarzakat.destroy', $zakat->id_zakat) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center">Tidak ada data pengumpulan zakat</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection 