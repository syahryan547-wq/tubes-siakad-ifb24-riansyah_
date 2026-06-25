<?php

namespace App\Http\Controllers;

use App\Models\Matakuliah;
use Illuminate\Http\Request;

class MatakuliahController extends Controller
{
    public function index()
    {
        $matakuliah = Matakuliah::paginate(10);
        return view('admin.matakuliah.index', compact('matakuliah'));
    }

    public function create()
    {
        return view('admin.matakuliah.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_matakuliah' => 'required|max:8|unique:matakuliah,kode_matakuliah',
            'nama_matakuliah' => 'required|string|max:50',
            'sks'             => 'required|integer|min:1|max:6',
        ]);

        Matakuliah::create($request->only('kode_matakuliah', 'nama_matakuliah', 'sks'));
        return redirect()->route('admin.matakuliah.index')->with('success', 'Data mata kuliah berhasil ditambahkan.');
    }

    public function edit(string $kode)
    {
        $matakuliah = Matakuliah::findOrFail($kode);
        return view('admin.matakuliah.edit', compact('matakuliah'));
    }

    public function update(Request $request, string $kode)
    {
        $request->validate([
            'nama_matakuliah' => 'required|string|max:50',
            'sks'             => 'required|integer|min:1|max:6',
        ]);

        $matakuliah = Matakuliah::findOrFail($kode);
        $matakuliah->update($request->only('nama_matakuliah', 'sks'));
        return redirect()->route('admin.matakuliah.index')->with('success', 'Data mata kuliah berhasil diupdate.');
    }

    public function destroy(string $kode)
    {
        Matakuliah::findOrFail($kode)->delete();
        return redirect()->route('admin.matakuliah.index')->with('success', 'Data mata kuliah berhasil dihapus.');
    }
}