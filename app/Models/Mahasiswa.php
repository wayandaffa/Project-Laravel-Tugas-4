<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

    // Nama tabel
    protected $table = 'mahasiswa';

    // Field yang boleh diisi
    protected $fillable = [
        'nim',
        'nama',
        'prodi',
    ];
}
