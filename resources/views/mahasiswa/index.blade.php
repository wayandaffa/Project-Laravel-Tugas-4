@extends('layouts.app')
@section('content')
<h1>Daftar Mahasiswa</h1>

<form method="GET">
  <input type="text" name="search" placeholder="Cari NIM/Nama" value="{{ request('search') }}">
  <select name="fakultas_id">
    <option value="">-- Semua Fakultas --</option>
    @foreach($fakultas as $f)
      <option value="{{ $f->id }}" {{ request('fakultas_id') == $f->id ? 'selected' : '' }}>
        {{ $f->nama_fakultas }}
      </option>
    @endforeach
  </select>
  <select name="prodi_id">
    <option value="">-- Semua Prodi --</option>
    @foreach($prodi as $p)
      <option value="{{ $p->id }}" {{ request('prodi_id') == $p->id ? 'selected' : '' }}>
        {{ $p->nama_prodi }}
      </option>
    @endforeach
  </select>
  <button type="submit">Filter</button>
</form>

<a href="{{ route('mahasiswa.create') }}">+ Tambah Mahasiswa</a>

<ul>
  @foreach($mahasiswa as $m)
    <li>
      {{ $m->nim }} - {{ $m->nama }} 
      ({{ $m->prodi->nama_prodi }} - {{ $m->prodi->fakultas->nama_fakultas }})
      <a href="{{ route('mahasiswa.edit', $m->id) }}">Edit</a>
      <form action="{{ route('mahasiswa.destroy', $m->id) }}" method="POST" style="display:inline;">
        @csrf @method('DELETE')
        <button onclick="return confirm('Hapus?')">Hapus</button>
      </form>
    </li>
  @endforeach
</ul>
@endsection
