@extends('layouts.app')
@section('title', 'Data KRS')
@section('content')
<div class="card">
    <div class="card-header bg-primary text-white">
        <i class="bi bi-journal-check me-2"></i>Data KRS Mahasiswa
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead class="table-light">
                    <tr>
                        <th>No</th>
                        <th>NPM</th>
                        <th>Nama Mahasiswa</th>
                        <th>Mata Kuliah</th>
                        <th>SKS</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($krs as $k)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $k->npm }}</td>
                        <td>{{ $k->mahasiswa->nama }}</td>
                        <td>{{ $k->matakuliah->nama_matakuliah }}</td>
                        <td><span class="badge bg-info">{{ $k->matakuliah->sks }} SKS</span></td>
                    </tr>
                    @empty
                    <tr><td colspan="5" class="text-center text-muted py-3">Belum ada data KRS.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="p-3">
            {{ $krs->links() }}
        </div>
    </div>
</div>
@endsection