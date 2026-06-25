@extends('layouts.app')
@section('title', 'Data Mahasiswa')
@section('content')
<div class="card">
    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
        <span><i class="bi bi-people me-2"></i>Data Mahasiswa</span>
        <a href="{{ route('admin.mahasiswa.create') }}" class="btn btn-light btn-sm">
            <i class="bi bi-plus-circle me-1"></i>Tambah Mahasiswa
        </a>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead class="table-light">
                    <tr>
                        <th>No</th>
                        <th>NPM</th>
                        <th>Nama</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($mahasiswa as $m)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $m->npm }}</td>
                        <td>{{ $m->nama }}</td>
                        <td>
                            <a href="{{ route('admin.mahasiswa.edit', $m->npm) }}" class="btn btn-warning btn-sm">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <form action="{{ route('admin.mahasiswa.destroy', $m->npm) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin hapus data ini?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr><td colspan="4" class="text-center text-muted py-3">Belum ada data mahasiswa.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="p-3">
            {{ $mahasiswa->links() }}
        </div>
    </div>
</div>
@endsection