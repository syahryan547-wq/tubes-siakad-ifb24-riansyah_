@extends('layouts.app')
@section('title', 'Edit Mahasiswa')
@section('content')
<div class="card">
    <div class="card-header bg-warning text-dark">
        <i class="bi bi-pencil me-2"></i>Edit Mahasiswa
    </div>
    <div class="card-body">
        <form action="{{ route('admin.mahasiswa.update', $mahasiswa->npm) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label class="form-label fw-bold">NPM</label>
                <input type="text" class="form-control" value="{{ $mahasiswa->npm }}" disabled>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Nama Mahasiswa</label>
                <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror"
                    value="{{ old('nama', $mahasiswa->nama) }}" placeholder="Masukkan nama mahasiswa">
                @error('nama')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-warning">
                    <i class="bi bi-save me-1"></i>Update
                </button>
                <a href="{{ route('admin.mahasiswa.index') }}" class="btn btn-secondary">
                    <i class="bi bi-arrow-left me-1"></i>Kembali
                </a>
            </div>
        </form>
    </div>
</div>
@endsection