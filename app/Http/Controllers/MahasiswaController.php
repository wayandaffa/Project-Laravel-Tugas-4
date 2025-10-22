<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Prodi;
use App\Models\Fakultas;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function index(Request $request)
    {
        $fakultas = Fakultas::all();
        $prodi = Prodi::all();

        $query = Mahasiswa::with(['prodi.fakultas']);

        if ($request->filled('fakultas_id')) {
            $query->whereHas('prodi.fakultas', function ($q) use ($request) {
                $q->where('id', $request->fakultas_id);
            });
        }

        if ($request->filled('prodi_id')) {
            $query->where('prodi_id', $request->prodi_id);
        }

        if ($request->filled('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('nama', 'like', '%' . $request->search . '%')
                  ->orWhere('nim', 'like', '%' . $request->search . '%');
            });
        }

        $mahasiswa = $query->paginate(10);
        return view('mahasiswa.index', compact('mahasiswa', 'fakultas', 'prodi'));
    }

    public function create()
    {
        $prodi = Prodi::with('fakultas')->get();
        return view('mahasiswa.create', compact('prodi'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nim' => 'required|min:4|unique:mahasiswas,nim',
            'nama' => 'required',
            'prodi_id' => 'required|exists:prodis,id',
        ]);

        Mahasiswa::create($request->all());

        return redirect()->route('mahasiswa.index')
                         ->with('success', 'Mahasiswa berhasil ditambahkan.');
    }

    public function edit(Mahasiswa $mahasiswa)
    {
        $prodi = Prodi::all();
        return view('mahasiswa.edit', compact('mahasiswa', 'prodi'));
    }

    public function update(Request $request, Mahasiswa $mahasiswa)
    {
        $request->validate([
            'nim' => 'required|min:4|unique:mahasiswas,nim,' . $mahasiswa->id,
            'nama' => 'required',
            'prodi_id' => 'required|exists:prodis,id',
        ]);

        $mahasiswa->update($request->all());

        return redirect()->route('mahasiswa.index')
                         ->with('success', 'Data mahasiswa berhasil diperbarui.');
    }

    public function destroy(Mahasiswa $mahasiswa)
    {
        $mahasiswa->delete();

        return redirect()->route('mahasiswa.index')
                         ->with('success', 'Mahasiswa berhasil dihapus.');
    }
}
