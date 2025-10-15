<!DOCTYPE html>
<html>
<head>
  <title>Tambah Mahasiswa</title>
</head>
<body>
  <h1>Tambah Mahasiswa</h1>

  <form action="/mahasiswa" method="POST">
    @csrf
    <label>NIM:</label><br>
    <input type="text" name="nim"><br>
    <label>Nama:</label><br>
    <input type="text" name="nama"><br>
    <label>Prodi:</label><br>
    <input type="text" name="prodi"><br><br>
    <button type="submit">Simpan</button>
  </form>

  <a href="/mahasiswa">Kembali</a>
</body>
</html>
