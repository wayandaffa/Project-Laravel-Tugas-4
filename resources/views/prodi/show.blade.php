@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Detail Program Studi</h2>

    <table class="table table-striped">
        <tr>
            <th>Nama Prodi</th>
            <td>{{ $prodi->nama_prodi }}</td>
        </tr>
        <tr>
            <th>Kaprodi</th>
            <td>{{ $prodi->kaprodi }}</td>
        </tr>
        <tr>
            <th>Jumlah Mahasiswa</th>
            <td>{{ $prodi->jumlah_mahasiswa }}</td>
        </tr>
        <tr>
            <th>Fakultas</th>
            <td>{{ $prodi->fakultas->nama_fakultas ?? '-' }}</td>
        </tr>
    </table>

    <a href="{{ route('prodi.index') }}" class="btn btn-secondary">Kembali</a>
</div>
@endsection
