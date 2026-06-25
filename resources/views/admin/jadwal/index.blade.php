@extends('layouts.app')
@section('title', 'Data Jadwal')
@section('content')
<div class="card">
    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
        <span><i class="bi bi-calendar3 me-2"></i>Data Jadwal</span>
        <a href="{{ route('admin.jadwal.create') }}" class="btn btn-light btn-sm">
            <i class="bi bi-plus-circle me-1"></i>Tambah Jadwal
        </a>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead class="table-light">
                    <tr>
                        <th>No</th>
                        <th>Mata Kuliah</th>
                        <th>Dosen</th>
                        <th>Kelas</th>
                        <th>Hari</th>
                        <th>Jam</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($jadwal as $j)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $j->matakuliah->nama_matakuliah }}</td>
                        <td>{{ $j->dosen->nama }}</td>
                        <td><span class="badge bg-primary">{{ $j->kelas }}</span></td>
                        <td>{{ $j->hari }}</td>
                        <td>{{ \Carbon\Carbon::parse($j->jam)->format('H:i') }}</td>
                        <td>
                            <a href="{{ route('admin.jadwal.edit', $j->id) }}" class="btn btn-warning btn-sm">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <form action="{{ route('admin.jadwal.destroy', $j->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin hapus data ini?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr><td colspan="7" class="text-center text-muted py-3">Belum ada data jadwal.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="p-3">
            {{ $jadwal->links() }}
        </div>
    </div>
</div>
@endsection