@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h3>Daftar Fakultas</h3>
    <a href="{{ route('fakultas.create') }}" class="btn btn-primary mb-3">+ Tambah Fakultas</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Fakultas</th>
                <th>Dekan</th>
                <th>Jumlah Prodi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($fakultas as $f)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $f->nama_fakultas }}</td>
                    <td>{{ $f->dekan }}</td>
                    <td>{{ $f->prodis_count }}</td>
                    <td>
                        <a href="{{ route('fakultas.edit', $f->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('fakultas.destroy', $f->id) }}" method="POST" style="display:inline">
                            @csrf @method('DELETE')
                            <button onclick="return confirm('Yakin?')" class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
