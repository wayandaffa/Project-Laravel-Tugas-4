<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\ProdiController;
use App\Http\Controllers\FakultasController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| File ini berisi route utama untuk aplikasi kampus.
| Setiap model (Mahasiswa, Prodi, Fakultas) memiliki route resource
| yang otomatis menyediakan route CRUD:
| index, create, store, show, edit, update, destroy
|
*/

// Arahkan root ke halaman mahasiswa
Route::get('/', function () {
    return redirect()->route('mahasiswa.index');
});

// Route resource untuk setiap entitas
Route::resource('mahasiswa', MahasiswaController::class);
Route::resource('prodi', ProdiController::class);
Route::resource('fakultas', FakultasController::class);
