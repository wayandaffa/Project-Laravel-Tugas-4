@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Fakultas</h2>

    <form action="{{ route('fakultas.update', $fakulta->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Nama Fakultas</label>
            <input type="text" name="nama_fakultas" class="form-control" value="{{ old('nama_fakultas', $fakulta->nama_fakultas) }}" required>
            @error('nama_fakultas') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label>Dekan</label>
            <input type="text" name="dekan" class="form-control" value="{{ old('dekan', $fakulta->dekan) }}" re
