<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\KantinMenu;
use App\Models\KantinGizi;

class KantinSeeder extends Seeder
{
    public function run(): void
    {
        // Data sample untuk menu
        $menus = [
            [
                'kode_menu' => 'MN001',
                'nama_menu' => 'Nasi Goreng Spesial',
                'kategori' => 'Makanan',
                'deskripsi' => 'Nasi goreng dengan telur, ayam, bakso, dan sayuran segar',
                'harga' => 25000,
                'best_seller' => 'ya',
                'stok' => 50,
                'foto' => 'nasi_goreng.jpg'
            ],
            [
                'kode_menu' => 'MN002',
                'nama_menu' => 'Mie Ayam Bakso',
                'kategori' => 'Makanan',
                'deskripsi' => 'Mie ayam dengan bakso urat dan pangsit',
                'harga' => 22000,
                'best_seller' => 'ya',
                'stok' => 40,
                'foto' => 'mie_ayam.jpg'
            ],
            [
                'kode_menu' => 'MN003',
                'nama_menu' => 'Ayam Goreng',
                'kategori' => 'Makanan',
                'deskripsi' => 'Ayam goreng krispi dengan nasi dan lalapan',
                'harga' => 28000,
                'best_seller' => 'tidak',
                'stok' => 30,
                'foto' => 'ayam_goreng.jpg'
            ],
            [
                'kode_menu' => 'MN004',
                'nama_menu' => 'Es Teh Manis',
                'kategori' => 'Minuman',
                'deskripsi' => 'Es teh dengan gula pasir',
                'harga' => 5000,
                'best_seller' => 'ya',
                'stok' => 100,
                'foto' => 'es_teh.jpg'
            ],
            [
                'kode_menu' => 'MN005',
                'nama_menu' => 'Jus Alpukat',
                'kategori' => 'Minuman',
                'deskripsi' => 'Jus alpukat asli tanpa susu',
                'harga' => 15000,
                'best_seller' => 'tidak',
                'stok' => 25,
                'foto' => 'jus_alpukat.jpg'
            ],
            [
                'kode_menu' => 'MN006',
                'nama_menu' => 'Kopi Hitam',
                'kategori' => 'Minuman',
                'deskripsi' => 'Kopi hitam asli tanpa gula',
                'harga' => 8000,
                'best_seller' => 'tidak',
                'stok' => 60,
                'foto' => 'kopi_hitam.jpg'
            ]
        ];

        foreach ($menus as $menuData) {
            $menu = KantinMenu::create($menuData);
            
            // Tambah data gizi untuk beberapa menu
            if (in_array($menu->kode_menu, ['MN001', 'MN002', 'MN003'])) {
                KantinGizi::create([
                    'id_menu' => $menu->id_menu,
                    'kalori' => $this->getRandomCalories(),
                    'lemak' => rand(5, 20) + (rand(0, 99) / 100),
                    'serat' => rand(1, 10) + (rand(0, 99) / 100),
                    'protein' => rand(10, 30) + (rand(0, 99) / 100),
                    'karbohidrat' => rand(30, 70) + (rand(0, 99) / 100),
                    'gula' => $this->getRandomValues(5, 30)
                ]);
            }
        }

        $this->command->info('Seeder kantin berhasil dijalankan!');
        $this->command->info('Total menu: ' . KantinMenu::count());
        $this->command->info('Total data gizi: ' . KantinGizi::count());
    }

    private function getRandomCalories()
    {
        $calories = [
            150.50, 220.75, 320.25, 450.80, 280.30,
            180.90, 350.60, 410.20, 290.45, 380.75
        ];
        
        return $calories[array_rand($calories)];
    }
}