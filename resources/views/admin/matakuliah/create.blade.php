@extends('layouts.app')
@section('title', 'Tambah Mata Kuliah')
@section('content')
<div class="card">
    <div class="card-header bg-primary text-white">
        <i class="bi bi-plus-circle me-2"></i>Tambah Mata Kuliah
    </div>
    <div class="card-body">
        <form action="{{ route('admin.matakuliah.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label fw-bold">Kode Mata Kuliah</label>
                <input type="text" name="kode_matakuliah" class="form-control @error('kode_matakuliah') is-invalid @enderror"
                    value="{{ old('kode_matakuliah') }}" placeholder="Contoh: IF001">
                @error('kode_matakuliah')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Nama Mata Kuliah</label>
                <input type="text" name="nama_matakuliah" class="form-control @error('nama_matakuliah') is-invalid @enderror"
                    value="{{ old('nama_matakuliah') }}" placeholder="Masukkan nama mata kuliah">
                @error('nama_matakuliah')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">SKS</label>
                <input type="number" name="sks" class="form-control @error('sks') is-invalid @enderror"
                    value="{{ old('sks') }}" placeholder="Masukkan jumlah SKS" min="1" max="6">
                @error('sks')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-save me-1"></i>Simpan
                </button>
                <a href="{{ route('admin.matakuliah.index') }}" class="btn btn-secondary">
                    <i class="bi bi-arrow-left me-1"></i>Kembali
                </a>
            </div>
        </form>
    </div>
</div>
@endsection