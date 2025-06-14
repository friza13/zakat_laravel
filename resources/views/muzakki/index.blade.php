@extends('layouts.app')

@section('title', 'Data Muzakki')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Daftar Muzakki</h5>
        <a href="{{ route('muzakki.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Tambah Muzakki
        </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Muzakki</th>
                        <th>Jumlah Tanggungan</th>
                        <th>Keterangan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($muzakkis as $muzakki)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $muzakki->nama_muzakki }}</td>
                        <td>{{ $muzakki->jumlah_tanggungan }}</td>
                        <td>{{ $muzakki->keterangan ?? '-' }}</td>
                        <td>
                            <div class="btn-group" role="group">
                                <a href="{{ route('muzakki.show', $muzakki->id_muzakki) }}" class="btn btn-info btn-sm">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('muzakki.edit', $muzakki->id_muzakki) }}" class="btn btn-warning btn-sm">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('muzakki.destroy', $muzakki->id_muzakki) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
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
                        <td colspan="5" class="text-center">Tidak ada data muzakki</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection 