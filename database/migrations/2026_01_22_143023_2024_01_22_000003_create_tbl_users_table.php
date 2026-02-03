<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tbl_users', function (Blueprint $table) {
            $table->id('id_user');
            $table->string('username')->unique(); // Diisi dengan nama user (untuk login)
            $table->string('nis')->nullable(); // TAMBAH KOLOM NIS DISINI
            $table->string('password');
            $table->string('pin', 6)->nullable();
            $table->string('nama_lengkap');
            $table->string('role');
            $table->string('foto')->nullable();
            $table->string('email')->nullable();
            $table->timestamp('last_login_at')->nullable();
            $table->integer('login_count')->default(0);
            $table->string('no_telepon')->nullable();
            $table->unsignedBigInteger('id_siswa')->nullable();
            $table->unsignedBigInteger('id_admin')->nullable();
            $table->timestamp('last_login')->nullable();
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('id_siswa')->references('id_siswa')->on('tbl_siswa')->onDelete('set null');
            $table->foreign('id_admin')->references('id_admin')->on('tbl_admin')->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tbl_users');
    }
};