<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Admin;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    /**
     * Dashboard berdasarkan role admin
     */
    public function dashboardRpl(Request $request)
    {
        $user = $request->user();
        
        return response()->json([
            'success' => true,
            'message' => 'Dashboard RPL',
            'user' => [
                'nama_lengkap' => $user->nama_lengkap,
                'role' => $user->role,
                'jurusan' => 'RPL'
            ],
            'dashboard_data' => [
                'statistics' => $this->getStatistics('RPL'),
                'recent_activities' => $this->getRecentActivities('RPL'),
                'quick_links' => $this->getQuickLinks('RPL')
            ]
        ]);
    }

    public function dashboardKuliner(Request $request)
    {
        $user = $request->user();
        
        return response()->json([
            'success' => true,
            'message' => 'Dashboard Kuliner',
            'user' => [
                'nama_lengkap' => $user->nama_lengkap,
                'role' => $user->role,
                'jurusan' => 'Kuliner'
            ],
            'dashboard_data' => [
                'statistics' => $this->getStatistics('Kuliner'),
                'recent_activities' => $this->getRecentActivities('Kuliner'),
                'quick_links' => $this->getQuickLinks('Kuliner')
            ]
        ]);
    }

    public function dashboardFarmasi(Request $request)
    {
        $user = $request->user();
        
        return response()->json([
            'success' => true,
            'message' => 'Dashboard Farmasi',
            'user' => [
                'nama_lengkap' => $user->nama_lengkap,
                'role' => $user->role,
                'jurusan' => 'Farmasi'
            ],
            'dashboard_data' => [
                'statistics' => $this->getStatistics('Farmasi'),
                'recent_activities' => $this->getRecentActivities('Farmasi'),
                'quick_links' => $this->getQuickLinks('Farmasi')
            ]
        ]);
    }

    public function dashboardAkuntansi(Request $request)
    {
        $user = $request->user();
        
        return response()->json([
            'success' => true,
            'message' => 'Dashboard Akuntansi',
            'user' => [
                'nama_lengkap' => $user->nama_lengkap,
                'role' => $user->role,
                'jurusan' => 'Akuntansi'
            ],
            'dashboard_data' => [
                'statistics' => $this->getStatistics('Akuntansi'),
                'recent_activities' => $this->getRecentActivities('Akuntansi'),
                'quick_links' => $this->getQuickLinks('Akuntansi')
            ]
        ]);
    }

    public function dashboardAdmin(Request $request)
    {
        $user = $request->user();
        
        return response()->json([
            'success' => true,
            'message' => 'Dashboard Admin',
            'user' => [
                'nama_lengkap' => $user->nama_lengkap,
                'role' => $user->role,
                'jurusan' => $user->admin ? $user->admin->jurusan : 'General'
            ],
            'dashboard_data' => [
                'total_siswa' => Siswa::count(),
                'total_admin' => Admin::count(),
                'total_users' => User::count(),
                'admin_by_role' => Admin::select('role', DB::raw('count(*) as total'))
                    ->groupBy('role')
                    ->get(),
                'recent_logins' => User::orderBy('last_login_at', 'desc')
                    ->limit(10)
                    ->get(['username', 'nama_lengkap', 'role', 'last_login_at'])
            ]
        ]);
    }

    /**
     * Get siswa berdasarkan jurusan (untuk admin jurusan)
     */
    public function getSiswaByJurusan(Request $request, $jurusan)
    {
        $user = $request->user();
        
        // Verifikasi bahwa admin memiliki akses ke jurusan ini
        if ($user->role !== $jurusan && $user->role !== 'superadmin') {
            return response()->json([
                'success' => false,
                'message' => 'Akses ditolak'
            ], 403);
        }

        $siswa = Siswa::where('jurusan', $jurusan)
            ->orderBy('kelas')
            ->orderBy('nama_siswa')
            ->get();

        return response()->json([
            'success' => true,
            'jurusan' => $jurusan,
            'total' => $siswa->count(),
            'data' => $siswa
        ]);
    }

    /**
     * Update data siswa
     */
    public function updateSiswa(Request $request, $id)
    {
        $user = $request->user();
        $siswa = Siswa::find($id);

        if (!$siswa) {
            return response()->json([
                'success' => false,
                'message' => 'Siswa tidak ditemukan'
            ], 404);
        }

        // Verifikasi bahwa admin memiliki akses ke jurusan siswa ini
        if ($user->role !== $siswa->jurusan && $user->role !== 'superadmin') {
            return response()->json([
                'success' => false,
                'message' => 'Akses ditolak'
            ], 403);
        }

        $validated = $request->validate([
            'nama_siswa' => 'sometimes|string|max:255',
            'kelas' => 'sometimes|string|max:255',
            'nama_ibu' => 'sometimes|string|max:255',
            'nama_ayah' => 'sometimes|string|max:255',
            'tempat_lahir' => 'sometimes|string|max:255',
            'tgl_lahir' => 'sometimes|date',
            'pin' => 'sometimes|string|min:6|max:6',
            'gender' => 'sometimes|in:L,P'
        ]);

        $siswa->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Data siswa berhasil diupdate',
            'data' => $siswa
        ]);
    }

    /**
     * Helper methods
     */
    private function getStatistics($jurusan)
    {
        return [
            'total_siswa' => Siswa::where('jurusan', $jurusan)->count(),
            'active_users' => User::whereHas('siswa', function($query) use ($jurusan) {
                $query->where('jurusan', $jurusan);
            })->where('last_login_at', '>=', now()->subDays(7))->count(),
            'new_registrations' => Siswa::where('jurusan', $jurusan)
                ->where('created_at', '>=', now()->subMonth())
                ->count(),
            'gender_distribution' => [
                'L' => Siswa::where('jurusan', $jurusan)->where('gender', 'L')->count(),
                'P' => Siswa::where('jurusan', $jurusan)->where('gender', 'P')->count()
            ]
        ];
    }

    private function getRecentActivities($jurusan)
    {
        return User::whereHas('siswa', function($query) use ($jurusan) {
                $query->where('jurusan', $jurusan);
            })
            ->with('siswa')
            ->orderBy('last_login_at', 'desc')
            ->limit(5)
            ->get(['username', 'nama_lengkap', 'last_login_at'])
            ->map(function($user) {
                return [
                    'nama' => $user->nama_lengkap,
                    'nis' => $user->username,
                    'last_login' => $user->last_login_at ? $user->last_login_at->diffForHumans() : 'Belum login',
                    'kelas' => $user->siswa ? $user->siswa->kelas : '-'
                ];
            });
    }

    private function getQuickLinks($jurusan)
    {
        $links = [
            'RPL' => [
                ['title' => 'Manage Siswa RPL', 'url' => '/admin/rpl/siswa', 'icon' => 'users'],
                ['title' => 'Laporan Transaksi', 'url' => '/admin/rpl/transactions', 'icon' => 'file-text'],
                ['title' => 'Settings', 'url' => '/admin/rpl/settings', 'icon' => 'settings']
            ],
            'Kuliner' => [
                ['title' => 'Manage Siswa Kuliner', 'url' => '/admin/kuliner/siswa', 'icon' => 'users'],
                ['title' => 'Menu Management', 'url' => '/admin/kuliner/menu', 'icon' => 'coffee'],
                ['title' => 'Order Reports', 'url' => '/admin/kuliner/orders', 'icon' => 'shopping-cart']
            ],
            'Farmasi' => [
                ['title' => 'Manage Siswa Farmasi', 'url' => '/admin/farmasi/siswa', 'icon' => 'users'],
                ['title' => 'Inventory', 'url' => '/admin/farmasi/inventory', 'icon' => 'package'],
                ['title' => 'Prescriptions', 'url' => '/admin/farmasi/prescriptions', 'icon' => 'file-text']
            ],
            'Akuntansi' => [
                ['title' => 'Manage Siswa Akuntansi', 'url' => '/admin/akuntansi/siswa', 'icon' => 'users'],
                ['title' => 'Financial Reports', 'url' => '/admin/akuntansi/reports', 'icon' => 'dollar-sign'],
                ['title' => 'Budget Planning', 'url' => '/admin/akuntansi/budget', 'icon' => 'pie-chart']
            ]
        ];

        return $links[$jurusan] ?? [];
    }
}