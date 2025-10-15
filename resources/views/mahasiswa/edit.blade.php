<!DOCTYPE html>
<html>
<head>
  <title>Edit Mahasiswa</title>
</head>
<body>
  <h1>Edit Mahasiswa</h1>

  <!-- Gunakan method PUT -->
  <form action="{{ route('mahasiswa.update', $m->id) }}" method="POST">
    @csrf
    @method('PUT')  <!-- INI PENTING agar Laravel tahu ini request PUT -->

    <label>NIM:</label><br>
    <input type="text" name="nim" value="{{ old('nim', $m->nim) }}"><br>

    <label>Nama:</label><br>
    <input type="text" name="nama" value="{{ old('nama', $m->nama) }}"><br>

    <label>Prodi:</label><br>
    <input type="text" name="prodi" value="{{ old('prodi', $m->prodi) }}"><br><br>

    <button type="submit">Update</button>
  </form>

  <a href="{{ route('mahasiswa.index') }}">Kembali</a>
</body>
</html>
