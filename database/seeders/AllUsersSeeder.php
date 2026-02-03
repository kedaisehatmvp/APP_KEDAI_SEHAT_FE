<?php

namespace Database\Seeders;

use App\Models\Siswa;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class AllUsersSeeder extends Seeder
{
    public function run(): void
    {
        echo "🚀 Memulai seeding data...\n";

        // 1. DATA SISWA
        echo "\n📝 Membuat data siswa...\n";
        $siswaData = [
            ['nis' => '2023RPL001', 'nama' => 'Ahmad Rizki', 'kelas' => '12 RPL 1', 'jurusan' => 'RPL', 'gender' => 'L'],
            ['nis' => '2023RPL002', 'nama' => 'Budi Santoso', 'kelas' => '12 RPL 1', 'jurusan' => 'RPL', 'gender' => 'L'],
            ['nis' => '2023RPL003', 'nama' => 'Citra Dewi', 'kelas' => '12 RPL 2', 'jurusan' => 'RPL', 'gender' => 'P'],
            ['nis' => '2023KUL001', 'nama' => 'Fajar Ramadhan', 'kelas' => '12 Kuliner 1', 'jurusan' => 'Kuliner', 'gender' => 'L'],
            ['nis' => '2023KUL002', 'nama' => 'Gita Maya', 'kelas' => '12 Kuliner 1', 'jurusan' => 'Kuliner', 'gender' => 'P'],
            ['nis' => '2023FAR001', 'nama' => 'Kartika Sari', 'kelas' => '12 Farmasi 1', 'jurusan' => 'Farmasi', 'gender' => 'P'],
            ['nis' => '2023FAR002', 'nama' => 'Luki Hermawan', 'kelas' => '12 Farmasi 1', 'jurusan' => 'Farmasi', 'gender' => 'L'],
            ['nis' => '2023AKU001', 'nama' => 'Putri Anggraini', 'kelas' => '12 Akuntansi 1', 'jurusan' => 'Akuntansi', 'gender' => 'P'],
            ['nis' => '2023AKU002', 'nama' => 'Rizki Fadilah', 'kelas' => '12 Akuntansi 1', 'jurusan' => 'Akuntansi', 'gender' => 'L'],
        ];

        $siswaIds = [];
        foreach ($siswaData as $siswa) {
            $siswaRecord = Siswa::create([
                'nis' => $siswa['nis'],
                'nama_siswa' => $siswa['nama'],
                'kelas' => $siswa['kelas'],
                'jurusan' => $siswa['jurusan'],
                'gender' => $siswa['gender'],
                'pin' => '123456',
                'nama_ibu' => 'Ibu ' . $siswa['nama'],
                'nama_ayah' => 'Ayah ' . $siswa['nama'],
                'tempat_lahir' => 'Jakarta',
                'tgl_lahir' => Carbon::now()->subYears(16)->format('Y-m-d'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);

            $siswaIds[$siswa['nis']] = $siswaRecord->id_siswa;
            echo "✅ Siswa: {$siswa['nama']}\n";
        }

        // 2. DATA ADMIN
        echo "\n👨‍💼 Membuat data admin...\n";
        $adminData = [
            [
                'nis' => 'SUPER001',
                'nama' => 'Super Admin Utama',
                'kelas' => 'Administrator',
                'jurusan' => 'Super',
                'role' => 'superadmin',
                'gender' => 'L',
                'username' => 'superadmin',
                'email' => 'superadmin@kantinsehat.sch.id',
                'password' => 'superadmin123'
            ],
            [
                'nis' => 'ADMRPL001',
                'nama' => 'Admin RPL',
                'kelas' => 'Staff RPL',
                'jurusan' => 'RPL',
                'role' => 'rpl',
                'gender' => 'L',
                'username' => 'adminrpl',
                'email' => 'admin.rpl@kantinsehat.sch.id',
                'password' => 'adminrpl123'
            ],
            [
                'nis' => 'ADMKUL001',
                'nama' => 'Admin Kuliner',
                'kelas' => 'Staff Kuliner',
                'jurusan' => 'Kuliner',
                'role' => 'kuliner',
                'gender' => 'L',
                'username' => 'adminkuliner',
                'email' => 'admin.kuliner@kantinsehat.sch.id',
                'password' => 'adminkuliner123'
            ],
            [
                'nis' => 'ADMFAR001',
                'nama' => 'Admin Farmasi',
                'kelas' => 'Staff Farmasi',
                'jurusan' => 'Farmasi',
                'role' => 'farmasi',
                'gender' => 'P',
                'username' => 'adminfarmasi',
                'email' => 'admin.farmasi@kantinsehat.sch.id',
                'password' => 'adminfarmasi123'
            ],
            [
                'nis' => 'ADMAKU001',
                'nama' => 'Admin Akuntansi',
                'kelas' => 'Staff Akuntansi',
                'jurusan' => 'Akuntansi',
                'role' => 'akuntansi',
                'gender' => 'L',
                'username' => 'adminakuntansi',
                'email' => 'admin.akuntansi@kantinsehat.sch.id',
                'password' => 'adminakuntansi123'
            ]
        ];

        $adminIds = [];
        foreach ($adminData as $admin) {
            $adminRecord = Admin::create([
                'nis' => $admin['nis'],
                'nama_siswa' => $admin['nama'],
                'kelas' => $admin['kelas'],
                'jurusan' => $admin['jurusan'],
                'role' => $admin['role'],
                'gender' => $admin['gender'],
                'pin' => '654321',
                'nama_ibu' => 'Ibu ' . $admin['nama'],
                'nama_ayah' => 'Ayah ' . $admin['nama'],
                'tempat_lahir' => 'Bandung',
                'tgl_lahir' => Carbon::now()->subYears(25)->format('Y-m-d'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);

            $adminIds[$admin['username']] = $adminRecord->id_admin;
            echo "✅ Admin: {$admin['nama']}\n";
        }

        // 3. DATA USER UNTUK SISWA
        echo "\n👤 Membuat user untuk siswa...\n";
        foreach ($siswaData as $siswa) {
            User::create([
                'username' => $siswa['nis'],
                'password' => Hash::make('password123'),
                'nama_lengkap' => $siswa['nama'],
                'role' => 'siswa',
                'id_siswa' => $siswaIds[$siswa['nis']],
                'email' => strtolower(str_replace(' ', '.', $siswa['nama'])) . '@example.com',
                'no_telepon' => '0812' . rand(10000000, 99999999),
                'last_login_at' => Carbon::now()->subDays(rand(1, 30)),
                'login_count' => rand(1, 20),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
            echo "✅ User siswa: {$siswa['nama']}\n";
        }

        // 4. DATA USER UNTUK ADMIN
        echo "\n👨‍💼 Membuat user untuk admin...\n";
        foreach ($adminData as $admin) {
            User::create([
                'username' => $admin['username'],
                'password' => Hash::make($admin['password']),
                'nama_lengkap' => $admin['nama'],
                'role' => $admin['role'],
                'id_admin' => $adminIds[$admin['username']],
                'email' => $admin['email'],
                'no_telepon' => '0813' . rand(10000000, 99999999),
                'last_login_at' => Carbon::now()->subDays(rand(1, 15)),
                'login_count' => rand(5, 50),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
            echo "✅ User admin: {$admin['nama']}\n";
        }

        // 5. DATA GURU
        echo "\n👨‍🏫 Membuat data guru...\n";
        $guruData = [
            ['username' => 'GUR001', 'nama' => 'Dr. Sri Mulyani, M.Pd', 'role' => 'guru'],
            ['username' => 'GUR002', 'nama' => 'Prof. Ahmad Yani, M.Kom', 'role' => 'guru'],
            ['username' => 'GUR003', 'nama' => 'Drs. Budi Santoso', 'role' => 'guru'],
            ['username' => 'GUR004', 'nama' => 'Siti Aminah, S.Pd', 'role' => 'guru'],
            ['username' => 'GUR005', 'nama' => 'Ir. Joko Widodo', 'role' => 'guru'],
        ];

        foreach ($guruData as $guru) {
            User::create([
                'username' => $guru['username'],
                'password' => Hash::make('guru123'),
                'nama_lengkap' => $guru['nama'],
                'role' => $guru['role'],
                'email' => strtolower(str_replace([' ', ',', '.'], '', $guru['nama'])) . '@example.com',
                'no_telepon' => '0814' . rand(10000000, 99999999),
                'last_login_at' => Carbon::now()->subDays(rand(1, 30)),
                'login_count' => rand(10, 100),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
            echo "✅ Guru: {$guru['nama']}\n";
        }

        echo "\n🎯 SEEDING SELESAI!\n";
        echo "=====================\n";
        echo "Total Siswa: " . Siswa::count() . "\n";
        echo "Total Admin: " . Admin::count() . "\n";
        echo "Total User: " . User::count() . "\n";
        echo "=====================\n\n";
        
        echo "🔑 CREDENTIALS FOR TESTING:\n";
        echo "============================\n";
        echo "SUPER ADMIN:\n";
        echo "  Username: superadmin\n";
        echo "  Password: superadmin123\n";
        echo "  PIN: 654321\n\n";
        
        echo "ADMIN RPL:\n";
        echo "  Username: adminrpl\n";
        echo "  Password: adminrpl123\n";
        echo "  PIN: 654321\n\n";
        
        echo "SISWA RPL:\n";
        echo "  Username/NIS: 2023RPL001\n";
        echo "  Password: password123\n";
        echo "  PIN: 123456\n\n";
        
        echo "GURU:\n";
        echo "  Username: GUR001\n";
        echo "  Password: guru123\n";
        echo "============================\n";
    }
}