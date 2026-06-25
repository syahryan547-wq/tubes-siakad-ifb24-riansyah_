<?php

namespace App\Http\Controllers;

use App\Models\Krs;
use App\Models\Matakuliah;
use Illuminate\Http\Request;

class KrsController extends Controller
{
    public function index()
    {
        $npm  = auth()->user()->npm;
        $krs  = Krs::with('matakuliah')->where('npm', $npm)->get();
        return view('mahasiswa.krs.index', compact('krs'));
    }

    public function create()
    {
        $npm            = auth()->user()->npm;
        $sudahAmbil     = Krs::where('npm', $npm)->pluck('kode_matakuliah');
        $matakuliah     = Matakuliah::whereNotIn('kode_matakuliah', $sudahAmbil)->get();
        return view('mahasiswa.krs.create', compact('matakuliah'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_matakuliah' => 'required|exists:matakuliah,kode_matakuliah',
        ]);

        $npm = auth()->user()->npm;

        $sudah = Krs::where('npm', $npm)
                    ->where('kode_matakuliah', $request->kode_matakuliah)
                    ->exists();

        if ($sudah) {
            return back()->with('error', 'Mata kuliah sudah diambil.');
        }

        Krs::create([
            'npm'             => $npm,
            'kode_matakuliah' => $request->kode_matakuliah,
        ]);

        return redirect()->route('mahasiswa.krs.index')->with('success', 'Mata kuliah berhasil diambil.');
    }

    public function destroy(string $id)
    {
        $npm = auth()->user()->npm;
        $krs = Krs::where('id', $id)->where('npm', $npm)->firstOrFail();
        $krs->delete();
        return redirect()->route('mahasiswa.krs.index')->with('success', 'Mata kuliah berhasil di-drop.');
    }

    // Untuk admin lihat semua KRS
    public function adminIndex()
    {
        $krs = Krs::with(['mahasiswa', 'matakuliah'])->paginate(10);
        return view('admin.krs.index', compact('krs'));
    }
}