@extends('layouts.app')
@section('title', 'Edit Dosen')
@section('content')
<div class="card">
    <div class="card-header bg-warning text-dark">
        <i class="bi bi-pencil me-2"></i>Edit Dosen
    </div>
    <div class="card-body">
        <form action="{{ route('admin.dosen.update', $dosen->nidn) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label class="form-label fw-bold">NIDN</label>
                <input type="text" class="form-control" value="{{ $dosen->nidn }}" disabled>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Nama Dosen</label>
                <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror"
                    value="{{ old('nama', $dosen->nama) }}" placeholder="Masukkan nama dosen">
                @error('nama')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-warning">
                    <i class="bi bi-save me-1"></i>Update
                </button>
                <a href="{{ route('admin.dosen.index') }}" class="btn btn-secondary">
                    <i class="bi bi-arrow-left me-1"></i>Kembali
                </a>
            </div>
        </form>
    </div>
</div>
@endsection