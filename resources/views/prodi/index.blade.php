@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h3>Daftar Program Studi</h3>
    <a href="{{ route('prodi.create') }}" class="btn btn-primary mb-3">+ Tambah Prodi</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Prodi</th>
                <th>Kaprodi</th>
                <th>Fakultas</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($prodis as $p)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $p->nama_prodi }}</td>
                    <td>{{ $p->kaprodi }}</td>
                    <td>{{ $p->fakultas->nama_fakultas ?? '-' }}</td>
                    <td>
                        <a href="{{ route('prodi.edit', $p->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('prodi.destroy', $p->id) }}" method="POST" style="display:inline">
                            @csrf @method('DELETE')
                            <button onclick="return confirm('Yakin hapus?')" class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $prodis->links() }}
</div>
@endsection
