<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    protected $table = 'tbl_users';
    protected $primaryKey = 'id_user';
    
    protected $fillable = [
        'username',
        'nis', // TAMBAHKAN NIS
        'password',
        'nama_lengkap',
        'role',
        'foto',
        'email',
        'no_telepon',
        'pin',
        'id_siswa',
        'id_admin'
    ];

    protected $hidden = [
        'password',
    ];

    protected $casts = [
        'last_login_at' => 'datetime',
        'last_login' => 'datetime',
    ];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'id_siswa');
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class, 'id_admin');
    }
}