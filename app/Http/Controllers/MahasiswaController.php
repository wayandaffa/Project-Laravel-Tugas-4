<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function index()
    {
        $mahasiswa = Mahasiswa::all();
        return view('mahasiswa.index', compact('mahasiswa'));
    }

    public function create()
    {
        return view('mahasiswa.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nim' => 'required|min:4|unique:mahasiswa,nim',
            'nama' => 'required',
            'prodi' => 'required',
        ]);

        Mahasiswa::create($request->only(['nim', 'nama', 'prodi']));

        return redirect()->route('mahasiswa.index')
                         ->with('success', 'Mahasiswa berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $m = Mahasiswa::findOrFail($id);
        return view('mahasiswa.edit', compact('m'));
    }

   public function update(Request $request, $id)
{
    $request->validate([
        'nim' => 'required|min:4|unique:mahasiswa,nim,' . $id,
        'nama' => 'required',
        'prodi' => 'required',
    ]);

    $m = Mahasiswa::findOrFail($id);
    $m->update($request->only(['nim','nama','prodi']));

    return redirect()->route('mahasiswa.index')->with('success','Data mahasiswa berhasil diperbarui.');
}


    public function destroy($id)
    {
        $mhs = Mahasiswa::findOrFail($id);
        $mhs->delete();

        return redirect()->route('mahasiswa.index')
                         ->with('success', 'Mahasiswa berhasil dihapus.');
    }
}
