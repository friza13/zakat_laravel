@extends('layouts.app')

@section('title', 'Tambah Pengumpulan Zakat')

@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="mb-0">Form Tambah Pengumpulan Zakat</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('bayarzakat.store') }}" method="POST">
            @csrf
            
            <div class="mb-3">
                <label for="id_muzakki" class="form-label">Muzakki <span class="text-danger">*</span></label>
                <select class="form-select @error('id_muzakki') is-invalid @enderror" id="id_muzakki" name="id_muzakki" required>
                    <option value="">-- Pilih Muzakki --</option>
                    @foreach($muzakkis as $muzakki)
                        <option value="{{ $muzakki->id_muzakki }}" data-tanggungan="{{ $muzakki->jumlah_tanggungan }}" {{ old('id_muzakki') == $muzakki->id_muzakki ? 'selected' : '' }}>
                            {{ $muzakki->nama_muzakki }} (Tanggungan: {{ $muzakki->jumlah_tanggungan }})
                        </option>
                    @endforeach
                </select>
                @error('id_muzakki')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            
            <div class="mb-3">
                <label for="nama_KK" class="form-label">Nama Kepala Keluarga <span class="text-danger">*</span></label>
                <input type="text" class="form-control @error('nama_KK') is-invalid @enderror" id="nama_KK" name="nama_KK" value="{{ old('nama_KK') }}" required>
                @error('nama_KK')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="jumlah_tanggungan" class="form-label">Jumlah Tanggungan <span class="text-danger">*</span></label>
                        <input type="number" class="form-control @error('jumlah_tanggungan') is-invalid @enderror" id="jumlah_tanggungan" name="jumlah_tanggungan" value="{{ old('jumlah_tanggungan', 1) }}" min="1" required readonly>
                        @error('jumlah_tanggungan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="jumlah_tanggunganyangdibayar" class="form-label">Jumlah Tanggungan yang Dibayar <span class="text-danger">*</span></label>
                        <input type="number" class="form-control @error('jumlah_tanggunganyangdibayar') is-invalid @enderror" id="jumlah_tanggunganyangdibayar" name="jumlah_tanggunganyangdibayar" value="{{ old('jumlah_tanggunganyangdibayar', 1) }}" min="1" required>
                        @error('jumlah_tanggunganyangdibayar')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
            </div>
            
            <div class="mb-3">
                <label for="jenis_bayar" class="form-label">Jenis Pembayaran <span class="text-danger">*</span></label>
                <select class="form-select @error('jenis_bayar') is-invalid @enderror" id="jenis_bayar" name="jenis_bayar" required>
                    <option value="">-- Pilih Jenis Pembayaran --</option>
                    <option value="beras" {{ old('jenis_bayar') == 'beras' ? 'selected' : '' }}>Beras</option>
                    <option value="uang" {{ old('jenis_bayar') == 'uang' ? 'selected' : '' }}>Uang</option>
                </select>
                @error('jenis_bayar')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            
            <div id="bayar_beras_input" class="mb-3" style="{{ old('jenis_bayar') == 'uang' ? 'display: none;' : '' }}">
                <label for="bayar_beras" class="form-label">Jumlah Beras (kg) <span class="text-danger">*</span></label>
                <input type="number" step="0.1" class="form-control @error('bayar_beras') is-invalid @enderror" id="bayar_beras" name="bayar_beras" value="{{ old('bayar_beras', 2.6) }}" min="0" readonly>
                @error('bayar_beras')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
                <small class="form-text text-muted">Standar zakat fitrah adalah 2.6 kg beras per orang</small>
            </div>
            
            <div id="bayar_uang_input" class="mb-3" style="{{ old('jenis_bayar') != 'uang' ? 'display: none;' : '' }}">
                <label for="bayar_uang" class="form-label">Jumlah Uang (Rp) <span class="text-danger">*</span></label>
                <input type="number" class="form-control @error('bayar_uang') is-invalid @enderror" id="bayar_uang" name="bayar_uang" value="{{ old('bayar_uang', 35000) }}" min="0" readonly>
                @error('bayar_uang')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
                <small class="form-text text-muted">Standar zakat fitrah adalah Rp 35.000 per orang</small>
            </div>
            
            <div class="d-flex justify-content-end gap-2">
                <a href="{{ route('bayarzakat.index') }}" class="btn btn-secondary">
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

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Konstanta untuk standar jumlah zakat
        const STANDAR_BERAS_PER_ORANG = 2.6; // kg
        const STANDAR_UANG_PER_ORANG = 35000; // Rupiah
        
        // Handle muzakki selection
        const muzakkiSelect = document.getElementById('id_muzakki');
        const tanggunganInput = document.getElementById('jumlah_tanggungan');
        const tanggunganDibayarInput = document.getElementById('jumlah_tanggunganyangdibayar');
        const bayarBerasInput = document.getElementById('bayar_beras');
        const bayarUangInput = document.getElementById('bayar_uang');
        
        // Fungsi untuk menghitung jumlah beras dan uang berdasarkan tanggungan yang dibayar
        function hitungJumlahZakat() {
            const tanggunganDibayar = parseInt(tanggunganDibayarInput.value) || 0;
            bayarBerasInput.value = (tanggunganDibayar * STANDAR_BERAS_PER_ORANG).toFixed(1);
            bayarUangInput.value = tanggunganDibayar * STANDAR_UANG_PER_ORANG;
        }
        
        muzakkiSelect.addEventListener('change', function() {
            const selectedOption = this.options[this.selectedIndex];
            if (selectedOption.value) {
                const tanggungan = selectedOption.getAttribute('data-tanggungan');
                tanggunganInput.value = tanggungan;
                tanggunganDibayarInput.value = tanggungan;
                tanggunganDibayarInput.max = tanggungan;
                hitungJumlahZakat();
            } else {
                tanggunganInput.value = '';
                tanggunganDibayarInput.value = '';
                tanggunganDibayarInput.max = '';
                bayarBerasInput.value = '';
                bayarUangInput.value = '';
            }
        });
        
        // Handle jenis bayar selection
        const jenisBayarSelect = document.getElementById('jenis_bayar');
        const bayarBerasInputDiv = document.getElementById('bayar_beras_input');
        const bayarUangInputDiv = document.getElementById('bayar_uang_input');
        
        jenisBayarSelect.addEventListener('change', function() {
            if (this.value === 'beras') {
                bayarBerasInputDiv.style.display = 'block';
                bayarUangInputDiv.style.display = 'none';
            } else if (this.value === 'uang') {
                bayarBerasInputDiv.style.display = 'none';
                bayarUangInputDiv.style.display = 'block';
            } else {
                bayarBerasInputDiv.style.display = 'none';
                bayarUangInputDiv.style.display = 'none';
            }
        });
        
        // Update tanggungan yang dibayar value dan hitung ulang zakat
        tanggunganDibayarInput.addEventListener('change', function() {
            const maxTanggungan = parseInt(tanggunganInput.value);
            const value = parseInt(this.value);
            
            if (value > maxTanggungan) {
                this.value = maxTanggungan;
            }
            
            hitungJumlahZakat();
        });
        
        // Hitung nilai awal saat halaman dimuat
        if (tanggunganDibayarInput.value) {
            hitungJumlahZakat();
        }
    });
</script>
@endsection 