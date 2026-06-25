@extends('layouts.app')
@section('title', 'Data Mata Kuliah')
@section('content')
<div class="card">
    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
        <span><i class="bi bi-book me-2"></i>Data Mata Kuliah</span>
        <a href="{{ route('admin.matakuliah.create') }}" class="btn btn-light btn-sm">
            <i class="bi bi-plus-circle me-1"></i>Tambah Mata Kuliah
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
                    @forelse($matakuliah as $mk)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $mk->kode_matakuliah }}</td>
                        <td>{{ $mk->nama_matakuliah }}</td>
                        <td><span class="badge bg-info">{{ $mk->sks }} SKS</span></td>
                        <td>
                            <a href="{{ route('admin.matakuliah.edit', $mk->kode_matakuliah) }}" class="btn btn-warning btn-sm">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <form action="{{ route('admin.matakuliah.destroy', $mk->kode_matakuliah) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin hapus data ini?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr><td colspan="5" class="text-center text-muted py-3">Belum ada data mata kuliah.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="p-3">
            {{ $matakuliah->links() }}
        </div>
    </div>
</div>
@endsection