<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fakultas extends Model
{
    use HasFactory;

    // Jika nama tabel kamu 'fakultas' (bukan 'fakultases'), maka tetap pakai protected $table
    protected $table = 'fakultas';

    protected $fillable = [
        'nama_fakultas',
        'dekan',
    ];

    // Relasi One to Many (1 Fakultas punya banyak Prodi)
    public function prodis()
    {
        return $this->hasMany(Prodi::class, 'fakultas_id');
    }
}
