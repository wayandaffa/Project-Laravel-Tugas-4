@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Detail Fakultas</h2>

    <table class="table table-striped">
        <tr>
            <th>Nama Fakultas</th>
            <td>{{ $fakulta->nama_fakultas }}</td>
        </tr>
        <tr>
            <th>Dekan</th>
            <td>{{ $fakulta->dekan }}</td>
        </tr>
        <tr>
            <th>Jumlah Prodi</th>
            <td>{{ $fakulta->prodis->count() }}</td>
        </tr>
    </table>

    <a href="{{ route('fakultas.index') }}" class="btn btn-secondary">Kembali</a>
</div>
@endsection
