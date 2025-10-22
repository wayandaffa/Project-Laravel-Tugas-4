@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Tambah Program Studi</h2>

    <form action="{{ route('prodi.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Nama Prodi</label>
            <input type="text" name="nama_prodi" class="form-control" value="{{ old('nama_prodi') }}" required>
            @error('nama_prodi') 
                <div class="text-danger">{{ $message }}</div> 
            @enderror
        </div>

        <div class="mb-3">
            <label>Kaprodi</label>
            <input type="text" name="kaprodi" class="form-control" value="{{ old('kaprodi') }}" required>
            @error('kaprodi') 
                <div class="text-danger">{{ $message }}</div> 
            @enderror
        </div>

        <div class="mb-3">
            <label>Fakultas</label>
            <select name="fakultas_id" class="form-control" required>
                <option value="">-- Pilih Fakultas --</option>
                @foreach ($fakultas as $f)
                    <option value="{{ $f->id }}" {{ old('fakultas_id') == $f->id ? 'selected' : '' }}>
                        {{ $f->nama_fakultas }}
                    </option>
                @endforeach
            </select>
            @error('fakultas_id') 
                <div class="text-danger">{{ $message }}</div> 
            @enderror
        </div>

        <div class="mb-3">
            <label>Jumlah Mahasiswa</label>
            <input type="number" name="jumlah_mahasiswa" class="form-control" value="{{ old('jumlah_mahasiswa') }}" required>
            @error('jumlah_mahasiswa') 
                <div class="text-danger">{{ $message }}</div> 
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('prodi.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
