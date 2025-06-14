@extends('layouts.app')

@section('title', 'Detail Kategori Mustahik')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Detail Kategori Mustahik</h5>
        <div>
            <a href="{{ route('kategori.edit', $kategori->id_kategori) }}" class="btn btn-warning">
                <i class="fas fa-edit"></i> Edit
            </a>
            <a href="{{ route('kategori.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Kembali
            </a>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered">
                <tr>
                    <th style="width: 30%">ID Kategori</th>
                    <td>{{ $kategori->id_kategori }}</td>
                </tr>
                <tr>
                    <th>Nama Kategori</th>
                    <td>{{ $kategori->nama_kategori }}</td>
                </tr>
                <tr>
                    <th>Jumlah Hak</th>
                    <td>{{ $kategori->jumlah_hak }}</td>
                </tr>
                <tr>
                    <th>Tanggal Dibuat</th>
                    <td>{{ $kategori->created_at->format('d F Y H:i') }}</td>
                </tr>
                <tr>
                    <th>Terakhir Diperbarui</th>
                    <td>{{ $kategori->updated_at->format('d F Y H:i') }}</td>
                </tr>
            </table>
        </div>
    </div>
</div>
@endsection 