<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;

    protected $table = 'tbl_admin';
    protected $primaryKey = 'id_admin';
    
    protected $fillable = [
        'nis',
        'nama_siswa',
        'kelas',
        'jurusan',
        'role',
        'nama_ibu',
        'nama_ayah',
        'tempat_lahir',
        'tgl_lahir',
        'pin',
        'gender'
    ];

    protected $casts = [
        'tgl_lahir' => 'date',
    ];

    public function user()
    {
        return $this->hasOne(User::class, 'id_admin');
    }
}