<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dosen;
use App\Models\Mahasiswa;
use App\Models\Matakuliah;
use App\Models\Jadwal;
use App\Models\Krs;

class DashboardController extends Controller
{
    public function admin()
    {
        $totalDosen      = Dosen::count();
        $totalMahasiswa  = Mahasiswa::count();
        $totalMatakuliah = Matakuliah::count();
        $totalJadwal     = Jadwal::count();
        $totalKrs        = Krs::count();

        return view('admin.dashboard', compact(
            'totalDosen',
            'totalMahasiswa',
            'totalMatakuliah',
            'totalJadwal',
            'totalKrs'
        ));
    }

    public function mahasiswa()
    {
        $npm      = auth()->user()->npm;
        $totalKrs = Krs::where('npm', $npm)->count();
        $jadwal   = Jadwal::with(['matakuliah', 'dosen'])->get();

        return view('mahasiswa.dashboard', compact('totalKrs', 'jadwal'));
    }
}