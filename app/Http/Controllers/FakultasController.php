<?php

namespace App\Http\Controllers;

use App\Models\Fakultas;
use Illuminate\Http\Request;

class FakultasController extends Controller
{
    public function index()
    {
        $fakultas = Fakultas::withCount('prodis')->get();
        return view('fakultas.index', compact('fakultas'));
    }

    public function create()
    {
        return view('fakultas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_fakultas' => 'required|string|max:100|unique:fakultas,nama_fakultas',
            'dekan' => 'required|string|max:100',
        ]);

        Fakultas::create($request->only(['nama_fakultas', 'dekan']));

        return redirect()->route('fakultas.index')
            ->with('success', 'Fakultas berhasil ditambahkan.');
    }

    public function show(Fakultas $fakultas)
    {
        $fakultas->load('prodis');
        return view('fakultas.show', compact('fakultas'));
    }

    public function edit(Fakultas $fakultas)
    {
        return view('fakultas.edit', compact('fakultas'));
    }

    public function update(Request $request, Fakultas $fakultas)
    {
        $request->validate([
            'nama_fakultas' => 'required|string|max:100|unique:fakultas,nama_fakultas,' . $fakultas->id,
            'dekan' => 'required|string|max:100',
        ]);

        $fakultas->update($request->only(['nama_fakultas', 'dekan']));

        return redirect()->route('fakultas.index')
            ->with('success', 'Data fakultas berhasil diperbarui.');
    }

    public function destroy(Fakultas $fakultas)
    {
        $fakultas->delete();

        return redirect()->route('fakultas.index')
            ->with('success', 'Fakultas berhasil dihapus.');
    }
}
