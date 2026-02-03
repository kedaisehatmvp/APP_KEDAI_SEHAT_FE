<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Siswa;
use Carbon\Carbon;

class SiswaSeeder extends Seeder
{
    public function run(): void
    {
        Siswa::create([
            'nis' => '2023001',
            'nama_siswa' => 'John Doe',
            'kelas' => '12',
            'jurusan' => 'RPL',
            'gender' => 'L',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}