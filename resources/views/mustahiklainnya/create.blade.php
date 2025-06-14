@extends('layouts.app')

@section('title', 'Tambah Mustahik Lainnya')

@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="mb-0">Tambah Mustahik Lainnya</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('mustahiklainnya.store') }}" method="POST">
            @csrf
            
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{ old('nama') }}" required>
                @error('nama')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            
            <div class="mb-3">
                <label for="kategori" class="form-label">Kategori</label>
                <select class="form-select @error('kategori') is-invalid @enderror" id="kategori" name="kategori" required>
                    <option value="" selected disabled>Pilih Kategori</option>
                    <option value="amilin" {{ old('kategori') == 'amilin' ? 'selected' : '' }}>Amilin</option>
                    <option value="fisabilillah" {{ old('kategori') == 'fisabilillah' ? 'selected' : '' }}>Fisabilillah</option>
                    <option value="mualaf" {{ old('kategori') == 'mualaf' ? 'selected' : '' }}>Mualaf</option>
                    <option value="ibnu sabil" {{ old('kategori') == 'ibnu sabil' ? 'selected' : '' }}>Ibnu Sabil</option>
                </select>
                @error('kategori')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            
            <div class="mb-3">
                <label for="hak" class="form-label">Hak</label>
                <input type="number" step="0.01" class="form-control @error('hak') is-invalid @enderror" id="hak" name="hak" value="{{ old('hak') }}" required readonly>
                @error('hak')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <a href="{{ route('mustahiklainnya.index') }}" class="btn btn-secondary">Batal</a>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
</div>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Konstanta untuk jumlah hak berdasarkan kategori
        const kategoriHak = {
            'amilin': 2,        // 2 kg untuk amilin
            'fisabilillah': 2,  // 2 kg untuk fisabilillah
            'mualaf': 2,        // 2 kg untuk mualaf
            'ibnu sabil': 2     // 2 kg untuk ibnu sabil
        };
        
        const kategoriSelect = document.getElementById('kategori');
        const hakInput = document.getElementById('hak');
        
        // Fungsi untuk mengupdate nilai hak berdasarkan kategori
        function updateHak() {
            const selectedKategori = kategoriSelect.value;
            if (selectedKategori in kategoriHak) {
                hakInput.value = kategoriHak[selectedKategori];
            } else {
                hakInput.value = '';
            }
        }
        
        // Pasang event listener untuk perubahan kategori
        kategoriSelect.addEventListener('change', updateHak);
        
        // Inisialisasi nilai hak jika kategori sudah terpilih saat load
        if (kategoriSelect.value) {
            updateHak();
        }
    });
</script>
@endsection 