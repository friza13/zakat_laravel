@extends('layouts.app')

@section('title', 'Distribusi Zakat Warga')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Daftar Mustahik Warga</h5>
        <a href="{{ route('mustahikwarga.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Tambah Mustahik Warga
        </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Kategori</th>
                        <th>Hak</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($mustahiks as $mustahik)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $mustahik->nama }}</td>
                        <td>{{ ucfirst($mustahik->kategori) }}</td>
                        <td>{{ $mustahik->hak }}</td>
                        <td>
                            <div class="btn-group" role="group">
                                <a href="{{ route('mustahikwarga.show', $mustahik->id_mustahikwarga) }}" class="btn btn-info btn-sm">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('mustahikwarga.edit', $mustahik->id_mustahikwarga) }}" class="btn btn-warning btn-sm">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('mustahikwarga.destroy', $mustahik->id_mustahikwarga) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
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
                        <td colspan="5" class="text-center">Belum ada data mustahik warga</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection 