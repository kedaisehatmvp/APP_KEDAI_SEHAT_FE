<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('kantin_gizi', function (Blueprint $table) {
            $table->id('id_gizi');
            $table->unsignedBigInteger('id_menu')->unique();
            $table->decimal('kalori', 8, 2)->nullable();
            
            $table->decimal('lemak', 8, 2)->nullable();
            $table->decimal('serat', 8, 2)->nullable();
            $table->decimal('protein', 8, 2)->nullable();
            $table->decimal('karbohidrat', 8, 2)->nullable();
            $table->timestamps();

            $table->foreign('id_menu')
                  ->references('id_menu')
                  ->on('kantin_menus')
                  ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('kantin_gizi');
    }
};