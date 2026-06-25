@extends('layouts.app')
@section('title', 'Tambah Dosen')
@section('content')
<div class="card">
    <div class="card-header bg-primary text-white">
        <i class="bi bi-plus-circle me-2"></i>Tambah Dosen
    </div>
    <div class="card-body">
        <form action="{{ route('admin.dosen.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label fw-bold">NIDN</label>
                <input type="text" name="nidn" class="form-control @error('nidn') is-invalid @enderror"
                    value="{{ old('nidn') }}" placeholder="Masukkan NIDN (10 digit)">
                @error('nidn')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Nama Dosen</label>
                <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror"
                    value="{{ old('nama') }}" placeholder="Masukkan nama dosen">
                @error('nama')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-save me-1"></i>Simpan
                </button>
                <a href="{{ route('admin.dosen.index') }}" class="btn btn-secondary">
                    <i class="bi bi-arrow-left me-1"></i>Kembali
                </a>
            </div>
        </form>
    </div>
</div>
@endsection