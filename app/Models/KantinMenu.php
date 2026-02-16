<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KantinMenu extends Model
{
    use HasFactory;

    // Nama tabel
    protected $table = 'kantin_menus';
    
    // Primary key
    protected $primaryKey = 'id_menu';
    public $incrementing = true;
    protected $keyType = 'int';

    // Fillable fields
    protected $fillable = [
        'kode_menu',
        'nama_menu',
        'kategori',
        'deskripsi',
        'harga',
        'foto',
        'best_seller',
        'stok',
        'soft_delete'
    ];

    // Casting
    protected $casts = [
        'harga' => 'decimal:2',
        'stok' => 'integer'
    ];

    // Relationship dengan KantinGizi (One to One)
    public function gizi()
    {
        return $this->hasOne(KantinGizi::class, 'id_menu', 'id_menu');
    }

    // Scope untuk data aktif
    public function scopeActive($query)
    {
        return $query->where('soft_delete', 'tidak');
    }

    // Scope untuk best seller
    public function scopeBestSeller($query)
    {
        return $query->where('best_seller', 'ya');
    }

    // Scope untuk search
    public function scopeSearch($query, $keyword)
    {
        return $query->where('nama_menu', 'like', "%{$keyword}%")
                     ->orWhere('kategori', 'like', "%{$keyword}%")
                     ->orWhere('deskripsi', 'like', "%{$keyword}%");
    }
}