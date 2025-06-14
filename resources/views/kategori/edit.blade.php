@extends('layouts.app')

@section('title', 'Edit Kategori Mustahik')

@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="mb-0">Edit Kategori Mustahik</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('kategori.update', $kategori->id_kategori) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="mb-3">
                <label for="nama_kategori" class="form-label">Nama Kategori</label>
                <input type="text" class="form-control @error('nama_kategori') is-invalid @enderror" id="nama_kategori" name="nama_kategori" value="{{ old('nama_kategori', $kategori->nama_kategori) }}" required>
                @error('nama_kategori')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            
            <div class="mb-3">
                <label for="jumlah_hak" class="form-label">Jumlah Hak</label>
                <input type="number" step="0.01" class="form-control @error('jumlah_hak') is-invalid @enderror" id="jumlah_hak" name="jumlah_hak" value="{{ old('jumlah_hak', $kategori->jumlah_hak) }}" required>
                @error('jumlah_hak')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <a href="{{ route('kategori.index') }}" class="btn btn-secondary">Batal</a>
                <button type="submit" class="btn btn-primary">Perbarui</button>
            </div>
        </form>
    </div>
</div>
@endsection 