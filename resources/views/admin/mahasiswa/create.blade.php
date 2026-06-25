@extends('layouts.app')
@section('title', 'Tambah Mahasiswa')
@section('content')
<div class="card">
    <div class="card-header bg-primary text-white">
        <i class="bi bi-plus-circle me-2"></i>Tambah Mahasiswa
    </div>
    <div class="card-body">
        <form action="{{ route('admin.mahasiswa.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label fw-bold">NPM</label>
                <input type="text" name="npm" class="form-control @error('npm') is-invalid @enderror"
                    value="{{ old('npm') }}" placeholder="Masukkan NPM (10 digit)">
                @error('npm')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Nama Mahasiswa</label>
                <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror"
                    value="{{ old('nama') }}" placeholder="Masukkan nama mahasiswa">
                @error('nama')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-save me-1"></i>Simpan
                </button>
                <a href="{{ route('admin.mahasiswa.index') }}" class="btn btn-secondary">
                    <i class="bi bi-arrow-left me-1"></i>Kembali
                </a>
            </div>
        </form>
    </div>
</div>
@endsection