<ul>
  @foreach($mahasiswa as $m)
    <li>
      {{ $m['nim'] }} - {{ $m['nama'] }} ({{ $m['prodi'] }})
      <a href="/mahasiswa/{{ $m['id'] }}/edit">Edit</a>

      <form action="/mahasiswa/{{ $m['id'] }}/delete" method="POST" style="display:inline;">
        @csrf
        <button type="submit" onclick="return confirm('Yakin mau hapus?')">Hapus</button>
      </form>
    </li>
  @endforeach
</ul>
