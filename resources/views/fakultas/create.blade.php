@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4 text-primary">Tambah Fakultas</h2>

    <form action="{{ route('fakultas.store') }}" method="POST" class="card p-4 shadow-sm">
        @csrf

        <div class="mb-3">
            <label class="form-label">Nama Fakultas</label>
            <input type="text" name="nama_fakultas" class="form-control" value="{{ old('nama_fakultas') }}" required>
            @error('nama_fakultas')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Nama Dekan</label>
            <input type="text" name="dekan" class="form-control" value="{{ old('dekan') }}" required>
            @error('dekan')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Jumlah Prodi</label>
            <input type="number" name="jumlah_prodi" class="form-control" value="{{ old('jumlah_prodi') }}">
            @error('jumlah_prodi')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('fakultas.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
