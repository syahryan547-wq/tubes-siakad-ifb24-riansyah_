@extends('layouts.app')
@section('title', 'Jadwal Perkuliahan')
@section('content')
<div class="card">
    <div class="card-header bg-primary text-white">
        <i class="bi bi-calendar3 me-2"></i>Jadwal Perkuliahan
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
                    </tr>
                    @empty
                    <tr><td colspan="6" class="text-center text-muted py-3">Belum ada jadwal.</td></tr>
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