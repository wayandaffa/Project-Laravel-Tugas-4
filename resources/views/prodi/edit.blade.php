@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Program Studi</h2>

    <form action="{{ route('prodi.update', $prodi->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Nama Prodi</label>
            <input type="text" name="nama_prodi" class="form-control" value="{{ old('nama_prodi', $prodi->nama_prodi) }}" required>
            @error('nama_prodi') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label>Kaprodi</label>
            <input type="text" name="kaprodi" class="form-control" value="{{ old('kaprodi', $prodi->kaprodi) }}" required>
            @error('kaprodi') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label>Fakultas</label>
            <select name="fakultas_id" class="form-control" required>
                @foreach ($fakultas as $f)
                    <option value="{{ $f->id }}" {{ $prodi->fakultas_id == $f->id ? 'selected' : '' }}>
                        {{ $f->nama_fakultas }}
                    </option>
                @endforeach
            </select>
            @error('fakultas_id') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <button type="submit" class="btn btn-primary">Perbarui</button>
        <a href="{{ route('prodi.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
