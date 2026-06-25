<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use Illuminate\Http\Request;

class DosenController extends Controller
{
    public function index()
    {
        $dosen = Dosen::paginate(10);
        return view('admin.dosen.index', compact('dosen'));
    }

    public function create()
    {
        return view('admin.dosen.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nidn' => 'required|size:10|unique:dosen,nidn',
            'nama' => 'required|string|max:50',
        ]);

        Dosen::create($request->only('nidn', 'nama'));
        return redirect()->route('admin.dosen.index')->with('success', 'Data dosen berhasil ditambahkan.');
    }

    public function edit(string $nidn)
    {
        $dosen = Dosen::findOrFail($nidn);
        return view('admin.dosen.edit', compact('dosen'));
    }

    public function update(Request $request, string $nidn)
    {
        $request->validate([
            'nama' => 'required|string|max:50',
        ]);

        $dosen = Dosen::findOrFail($nidn);
        $dosen->update($request->only('nama'));
        return redirect()->route('admin.dosen.index')->with('success', 'Data dosen berhasil diupdate.');
    }

    public function destroy(string $nidn)
    {
        Dosen::findOrFail($nidn)->delete();
        return redirect()->route('admin.dosen.index')->with('success', 'Data dosen berhasil dihapus.');
    }
}