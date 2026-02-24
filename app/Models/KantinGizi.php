<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KantinGizi extends Model
{
    use HasFactory;

    protected $table = 'tbl_gizi';
    
    protected $primaryKey = 'id_gizi';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'id_menu',
        'kalori',
        'protein',
        'lemak',
        'karbohidrat',
        'serat',
        'gula'
    ];

    protected $casts = [
        'kalori' => 'decimal:2',
        'protein' => 'decimal:2',
        'lemak' => 'decimal:2',
        'karbohidrat' => 'decimal:2',
        'serat' => 'decimal:2',
        'gula' => 'decimal:2'
    ];

    // Relationship dengan KantinMenu (Many to One)
    public function menu()
    {
        return $this->belongsTo(KantinMenu::class, 'id_menu', 'id_menu');
    }
}
