<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('kantin_menus', function (Blueprint $table) {
            $table->id('id_menu');
            $table->string('kode_menu', 20)->unique();
            $table->string('nama_menu', 100);
            $table->string('kategori', 50);
            $table->text('deskripsi')->nullable();
            $table->decimal('harga', 10, 2);
            $table->string('foto')->nullable();
            $table->enum('best_seller', ['ya', 'tidak'])->default('tidak');
            $table->integer('stok')->default(0);
            $table->enum('soft_delete', ['ya', 'tidak'])->default('tidak');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('kantin_menus');
    }
};