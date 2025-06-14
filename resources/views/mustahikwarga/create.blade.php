@extends('layouts.app')

@section('title', 'Tambah Mustahik Warga')

@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="mb-0">Tambah Mustahik Warga</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('mustahikwarga.store') }}" method="POST">
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
                    <option value="fakir" {{ old('kategori') == 'fakir' ? 'selected' : '' }}>Fakir</option>
                    <option value="miskin" {{ old('kategori') == 'miskin' ? 'selected' : '' }}>Miskin</option>
                    <option value="mampu" {{ old('kategori') == 'mampu' ? 'selected' : '' }}>Mampu</option>
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
                <a href="{{ route('mustahikwarga.index') }}" class="btn btn-secondary">Batal</a>
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
            'fakir': 4, // 4 kg untuk kategori fakir
            'miskin': 3, // 3 kg untuk kategori miskin
            'mampu': 0  // 0 kg untuk kategori mampu
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