<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

    // Tambahkan ini jika nama tabel di database adalah "mahasiswa"
    protected $table = 'mahasiswas';

    // Kolom yang boleh diisi (mass assignment)
    protected $fillable = [
        'nim',
        'nama',
        'prodi_id',
    ];

    // Relasi ke tabel prodi (many-to-one)
    public function prodi()
    {
        return $this->belongsTo(Prodi::class);
    }
}
