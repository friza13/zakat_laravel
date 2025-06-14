@extends('layouts.app')

@section('title', 'Tambah Muzakki')

@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="mb-0">Form Tambah Muzakki</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('muzakki.store') }}" method="POST">
            @csrf
            
            <div class="mb-3">
                <label for="nama_muzakki" class="form-label">Nama Muzakki <span class="text-danger">*</span></label>
                <input type="text" class="form-control @error('nama_muzakki') is-invalid @enderror" id="nama_muzakki" name="nama_muzakki" value="{{ old('nama_muzakki') }}" required>
                @error('nama_muzakki')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            
            <div class="mb-3">
                <label for="jumlah_tanggungan" class="form-label">Jumlah Tanggungan <span class="text-danger">*</span></label>
                <input type="number" class="form-control @error('jumlah_tanggungan') is-invalid @enderror" id="jumlah_tanggungan" name="jumlah_tanggungan" value="{{ old('jumlah_tanggungan', 1) }}" min="1" required>
                @error('jumlah_tanggungan')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            
            <div class="mb-3">
                <label for="keterangan" class="form-label">Keterangan</label>
                <textarea class="form-control @error('keterangan') is-invalid @enderror" id="keterangan" name="keterangan" rows="3">{{ old('keterangan') }}</textarea>
                @error('keterangan')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            
            <div class="d-flex justify-content-end gap-2">
                <a href="{{ route('muzakki.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Kembali
                </a>
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Simpan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection 