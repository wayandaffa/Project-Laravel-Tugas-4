@extends('layouts.app')
@section('content')

<h1>Edit Mahasiswa</h1>

<form action="{{ route('mahasiswa.update', $mahasiswa->id) }}" method="POST">
    @csrf
    @method('PUT')

    <label>NIM:</label><br>
    <input type="text" name="nim" value="{{ old('nim', $mahasiswa->nim) }}"><br><br>

    <label>Nama:</label><br>
    <input type="text" name="nama" value="{{ old('nama', $mahasiswa->nama) }}"><br><br>

    <label>Program Studi:</label><br>
    <select name="prodi_id">
        <option value="">-- Pilih Prodi --</option>
        @foreach($prodi as $p)
            <option value="{{ $p->id }}" {{ $mahasiswa->prodi_id == $p->id ? 'selected' : '' }}>
                {{ $p->nama_prodi }}
            </option>
        @endforeach
    </select>
    <br><br>

    <button type="submit">Update</button>
</form>

<br>
<a href="{{ route('mahasiswa.index') }}">Kembali</a>

@endsection
