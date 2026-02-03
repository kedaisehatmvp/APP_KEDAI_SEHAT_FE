<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tbl_siswa', function (Blueprint $table) {
            $table->id('id_siswa');
            $table->string('nis')->unique();
            $table->string('nama_siswa');
            $table->string('kelas');
            $table->string('jurusan');
            $table->string('nama_ibu')->default('');
            $table->string('nama_ayah')->default('');
            $table->string('tempat_lahir')->default('');
            $table->date('tgl_lahir')->nullable();
            $table->enum('gender', ['L', 'P']);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tbl_siswa');
    }
};