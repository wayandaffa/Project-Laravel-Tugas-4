<?php

namespace App\Http\Controllers;

use App\Models\Prodi;
use App\Models\Fakultas;
use Illuminate\Http\Request;

class ProdiController extends Controller
{
    public function index()
    {
        $prodis = Prodi::with('fakultas')->paginate(10);
        return view('prodi.index', compact('prodis'));
    }

    public function create()
    {
        $fakultas = Fakultas::all();
        return view('prodi.create', compact('fakultas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_prodi' => 'required|unique:prodis,nama_prodi',
            'kaprodi' => 'required',
            'fakultas_id' => 'required|exists:fakultas,id',
        ]);

        Prodi::create($request->all());

        return redirect()->route('prodi.index')->with('success', 'Prodi berhasil ditambahkan.');
    }

    public function edit(Prodi $prodi)
    {
        $fakultas = Fakultas::all();
        return view('prodi.edit', compact('prodi', 'fakultas'));
    }

    public function update(Request $request, Prodi $prodi)
    {
        $request->validate([
            'nama_prodi' => 'required|unique:prodis,nama_prodi,' . $prodi->id,
            'kaprodi' => 'required',
            'fakultas_id' => 'required|exists:fakultas,id',
        ]);

        $prodi->update($request->all());
        return redirect()->route('prodi.index')->with('success', 'Data prodi berhasil diperbarui.');
    }

    public function destroy(Prodi $prodi)
    {
        $prodi->delete();
        return redirect()->route('prodi.index')->with('success', 'Prodi berhasil dihapus.');
    }
}
