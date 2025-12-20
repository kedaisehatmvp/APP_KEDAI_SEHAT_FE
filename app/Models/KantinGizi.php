<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KantinGizi extends Model
{
    use HasFactory;

    // Nama tabel
    protected $table = 'kantin_gizi';
    
    // Primary key
    protected $primaryKey = 'id_gizi';
    public $incrementing = true;
    protected $keyType = 'int';

    // Fillable fields
    protected $fillable = [
        'id_menu',
        'kalori',
        'lemak',
        'serat',
        'protein',
        'karbohidrat'
    ];

    // Casting
    protected $casts = [
        'kalori' => 'decimal:2',
        'lemak' => 'decimal:2',
        'serat' => 'decimal:2',
        'protein' => 'decimal:2',
        'karbohidrat' => 'decimal:2'
    ];

    // Relationship dengan KantinMenu (Belongs To)
    public function menu()
    {
        return $this->belongsTo(KantinMenu::class, 'id_menu', 'id_menu');
    }
}