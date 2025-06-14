@extends('layouts.app')

@section('title', 'Detail Mustahik Warga')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Detail Mustahik Warga</h5>
        <div>
            <a href="{{ route('mustahikwarga.edit', $mustahik->id_mustahikwarga) }}" class="btn btn-warning">
                <i class="fas fa-edit"></i> Edit
            </a>
            <a href="{{ route('mustahikwarga.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Kembali
            </a>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered">
                <tr>
                    <th style="width: 30%">ID Mustahik</th>
                    <td>{{ $mustahik->id_mustahikwarga }}</td>
                </tr>
                <tr>
                    <th>Nama</th>
                    <td>{{ $mustahik->nama }}</td>
                </tr>
                <tr>
                    <th>Kategori</th>
                    <td>{{ ucfirst($mustahik->kategori) }}</td>
                </tr>
                <tr>
                    <th>Hak</th>
                    <td>{{ $mustahik->hak }}</td>
                </tr>
                <tr>
                    <th>Tanggal Dibuat</th>
                    <td>{{ $mustahik->created_at->format('d F Y H:i') }}</td>
                </tr>
                <tr>
                    <th>Terakhir Diperbarui</th>
                    <td>{{ $mustahik->updated_at->format('d F Y H:i') }}</td>
                </tr>
            </table>
        </div>
    </div>
</div>
@endsection 