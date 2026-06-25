@extends('layouts.app')
@section('title', 'Dashboard Mahasiswa')
@section('content')
<div class="row g-4 mb-4">
    <div class="col-md-6">
        <div class="stat-card" style="background: linear-gradient(135deg, #667eea, #764ba2)">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <div class="fs-4 fw-bold">{{ $totalKrs }}</div>
                    <div>Mata Kuliah Diambil</div>
                </div>
                <i class="bi bi-journal-check fs-1 opacity-50"></i>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="stat-card" style="background: linear-gradient(135deg, #4facfe, #00f2fe)">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <div class="fs-4 fw-bold">{{ $jadwal->count() }}</div>
                    <div>Total Jadwal Tersedia</div>
                </div>
                <i class="bi bi-calendar3 fs-1 opacity-50"></i>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header bg-primary text-white">
        <i class="bi bi-calendar3 me-2"></i>Jadwal Perkuliahan
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead class="table-light">
                    <tr>
                        <th>Mata Kuliah</th>
                        <th>Dosen</th>
                        <th>Kelas</th>
                        <th>Hari</th>
                        <th>Jam</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($jadwal as $j)
                    <tr>
                        <td>{{ $j->matakuliah->nama_matakuliah }}</td>
                        <td>{{ $j->dosen->nama }}</td>
                        <td><span class="badge bg-primary">{{ $j->kelas }}</span></td>
                        <td>{{ $j->hari }}</td>
                        <td>{{ \Carbon\Carbon::parse($j->jam)->format('H:i') }}</td>
                    </tr>
                    @empty
                    <tr><td colspan="5" class="text-center text-muted py-3">Belum ada jadwal.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection