@extends('layouts.app')

@section('title', 'Edit Mustahik Lainnya')

@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="mb-0">Edit Mustahik Lainnya</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('mustahiklainnya.update', $mustahik->id_mustahiklainnya) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{ old('nama', $mustahik->nama) }}" required>
                @error('nama')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            
            <div class="mb-3">
                <label for="kategori" class="form-label">Kategori</label>
                <select class="form-select @error('kategori') is-invalid @enderror" id="kategori" name="kategori" required>
                    <option value="" disabled>Pilih Kategori</option>
                    <option value="amilin" {{ old('kategori', $mustahik->kategori) == 'amilin' ? 'selected' : '' }}>Amilin</option>
                    <option value="fisabilillah" {{ old('kategori', $mustahik->kategori) == 'fisabilillah' ? 'selected' : '' }}>Fisabilillah</option>
                    <option value="mualaf" {{ old('kategori', $mustahik->kategori) == 'mualaf' ? 'selected' : '' }}>Mualaf</option>
                    <option value="ibnu sabil" {{ old('kategori', $mustahik->kategori) == 'ibnu sabil' ? 'selected' : '' }}>Ibnu Sabil</option>
                </select>
                @error('kategori')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            
            <div class="mb-3">
                <label for="hak" class="form-label">Hak</label>
                <input type="number" step="0.01" class="form-control @error('hak') is-invalid @enderror" id="hak" name="hak" value="{{ old('hak', $mustahik->hak) }}" required>
                @error('hak')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <a href="{{ route('mustahiklainnya.index') }}" class="btn btn-secondary">Batal</a>
                <button type="submit" class="btn btn-primary">Perbarui</button>
            </div>
        </form>
    </div>
</div>
@endsection 