@extends('layouts.app')
@section('title', 'Dashboard Admin')
@section('content')
<div class="row g-4 mb-4">
    <div class="col-md-4">
        <div class="stat-card" style="background: linear-gradient(135deg, #667eea, #764ba2)">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <div class="fs-4 fw-bold">{{ $totalDosen }}</div>
                    <div>Total Dosen</div>
                </div>
                <i class="bi bi-person-badge fs-1 opacity-50"></i>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="stat-card" style="background: linear-gradient(135deg, #f093fb, #f5576c)">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <div class="fs-4 fw-bold">{{ $totalMahasiswa }}</div>
                    <div>Total Mahasiswa</div>
                </div>
                <i class="bi bi-people fs-1 opacity-50"></i>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="stat-card" style="background: linear-gradient(135deg, #4facfe, #00f2fe)">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <div class="fs-4 fw-bold">{{ $totalMatakuliah }}</div>
                    <div>Total Mata Kuliah</div>
                </div>
                <i class="bi bi-book fs-1 opacity-50"></i>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="stat-card" style="background: linear-gradient(135deg, #43e97b, #38f9d7)">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <div class="fs-4 fw-bold">{{ $totalJadwal }}</div>
                    <div>Total Jadwal</div>
                </div>
                <i class="bi bi-calendar3 fs-1 opacity-50"></i>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="stat-card" style="background: linear-gradient(135deg, #fa709a, #fee140)">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <div class="fs-4 fw-bold">{{ $totalKrs }}</div>
                    <div>Total KRS</div>
                </div>
                <i class="bi bi-journal-check fs-1 opacity-50"></i>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header bg-primary text-white">
        <i class="bi bi-lightning me-2"></i>Akses Cepat
    </div>
    <div class="card-body">
        <div class="row g-3">
            <div class="col-md-3">
                <a href="{{ route('admin.dosen.create') }}" class="btn btn-outline-primary w-100">
                    <i class="bi bi-plus-circle me-2"></i>Tambah Dosen
                </a>
            </div>
            <div class="col-md-3">
                <a href="{{ route('admin.mahasiswa.create') }}" class="btn btn-outline-danger w-100">
                    <i class="bi bi-plus-circle me-2"></i>Tambah Mahasiswa
                </a>
            </div>
            <div class="col-md-3">
                <a href="{{ route('admin.matakuliah.create') }}" class="btn btn-outline-info w-100">
                    <i class="bi bi-plus-circle me-2"></i>Tambah Mata Kuliah
                </a>
            </div>
            <div class="col-md-3">
                <a href="{{ route('admin.jadwal.create') }}" class="btn btn-outline-success w-100">
                    <i class="bi bi-plus-circle me-2"></i>Tambah Jadwal
                </a>
            </div>
        </div>
    </div>
</div>
@endsection