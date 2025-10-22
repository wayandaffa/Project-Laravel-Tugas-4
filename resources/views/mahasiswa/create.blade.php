@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Tambah Mahasiswa</h2>

    {{-- Tampilkan error jika validasi gagal --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('mahasiswa.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nim" class="form-label">NIM:</label>
            <input type="text" name="nim" id="nim" class="form-control" value="{{ old('nim') }}">
        </div>

        <div class="mb-3">
            <label for="nama" class="form-label">Nama:</label>
            <input type="text" name="nama" id="nama" class="form-control" value="{{ old('nama') }}">
        </div>

        <div class="mb-3">
            <label for="prodi_id" class="form-label">Program Studi:</label>
            <select name="prodi_id" id="prodi_id" class="form-select">
                <option value="">-- Pilih Prodi --</option>
                @foreach ($prodi as $p)
                    <option value="{{ $p->id }}" {{ old('prodi_id') == $p->id ? 'selected' : '' }}>
                        {{ $p->nama_prodi }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('mahasiswa.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
