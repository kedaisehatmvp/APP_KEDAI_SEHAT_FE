<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    protected $table = 'tbl_siswa';
    protected $primaryKey = 'id_siswa';
    
    protected $fillable = [
        'nis',
        'nama_siswa',
        'kelas',
        'jurusan',
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
        return $this->hasOne(User::class, 'id_siswa');
    }
}