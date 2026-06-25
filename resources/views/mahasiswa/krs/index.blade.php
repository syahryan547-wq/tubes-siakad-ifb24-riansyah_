@extends('layouts.app')
@section('title', 'KRS Saya')
@section('content')
<div class="card">
    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
        <span><i class="bi bi-journal-check me-2"></i>KRS Saya</span>
        <a href="{{ route('mahasiswa.krs.create') }}" class="btn btn-light btn-sm">
            <i class="bi bi-plus-circle me-1"></i>Ambil Mata Kuliah
        </a>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead class="table-light">
                    <tr>
                        <th>No</th>
                        <th>Kode</th>
                        <th>Nama Mata Kuliah</th>
                        <th>SKS</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($krs as $k)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $k->kode_matakuliah }}</td>
                        <td>{{ $k->matakuliah->nama_matakuliah }}</td>
                        <td><span class="badge bg-info">{{ $k->matakuliah->sks }} SKS</span></td>
                        <td>
                            <form action="{{ route('mahasiswa.krs.destroy', $k->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin drop mata kuliah ini?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm">
                                    <i class="bi bi-trash me-1"></i>Drop
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr><td colspan="5" class="text-center text-muted py-3">Belum ada mata kuliah yang diambil.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection