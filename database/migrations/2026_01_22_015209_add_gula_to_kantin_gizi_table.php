<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('kantin_gizi', function (Blueprint $table) {
            $table->decimal('gula', 8, 2)
                  ->nullable()
                  ->after('karbohidrat');
            
        });
    }

    public function down(): void
    {
        Schema::table('kantin_gizi', function (Blueprint $table) {
            $table->dropColumn('gula');
        });
    }
};