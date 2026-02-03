<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Hapus kolom pin dari tbl_siswa
        Schema::table('tbl_siswa', function (Blueprint $table) {
            $table->dropColumn('pin');
        });

        // Hapus kolom pin dari tbl_admin
        Schema::table('tbl_admin', function (Blueprint $table) {
            $table->dropColumn('pin');
        });

        // Tambah kolom pin ke tbl_users
        Schema::table('tbl_users', function (Blueprint $table) {
            $table->string('pin', 6)->nullable()->after('password');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Kembalikan kolom pin ke tbl_siswa
        Schema::table('tbl_siswa', function (Blueprint $table) {
            $table->string('pin', 6)->default('');
        });

        // Kembalikan kolom pin ke tbl_admin
        Schema::table('tbl_admin', function (Blueprint $table) {
            $table->string('pin', 6)->default('');
        });

        // Hapus kolom pin dari tbl_users
        Schema::table('tbl_users', function (Blueprint $table) {
            $table->dropColumn('pin');
        });
    }
};