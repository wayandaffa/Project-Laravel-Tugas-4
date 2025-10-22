<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('prodis', function (Blueprint $table) {
            $table->id();
            $table->string('nama_prodi', 100)->unique();
            $table->string('kaprodi', 100);
            $table->integer('jumlah_mahasiswa')->default(0);
            $table->foreignId('fakultas_id')
                  ->constrained('fakultas')
                  ->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('prodis');
    }
};
