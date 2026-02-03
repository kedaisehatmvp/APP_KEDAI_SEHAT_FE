<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Siswa;

class LandingController extends Controller
{
    /**
     * Landing page utama untuk siswa/guru
     */
    public function index(Request $request)
    {
        $user = $request->user();
        
        $siswaData = null;
        if ($user->id_siswa) {
            $siswaData = $user->siswa;
        }

        return response()->json([
            'success' => true,
            'message' => 'Welcome to Kantin Sehat',
            'user' => [
                'nama_lengkap' => $user->nama_lengkap,
                'role' => $user->role,
                'kelas' => $siswaData ? $siswaData->kelas : null,
                'jurusan' => $siswaData ? $siswaData->jurusan : null,
                'last_login' => $user->last_login_at
            ],
            'features' => [
                [
                    'title' => 'Beli Makanan',
                    'description' => 'Pesan makanan dari kantin sekolah',
                    'icon' => 'shopping-cart',
                    'url' => '/menu'
                ],
                [
                    'title' => 'Riwayat Transaksi',
                    'description' => 'Lihat riwayat pembelian Anda',
                    'icon' => 'history',
                    'url' => '/transactions'
                ],
                [
                    'title' => 'Profil Saya',
                    'description' => 'Kelola informasi akun Anda',
                    'icon' => 'user',
                    'url' => '/profile'
                ],
                [
                    'title' => 'Ganti PIN',
                    'description' => 'Ubah PIN untuk keamanan',
                    'icon' => 'lock',
                    'url' => '/change-pin'
                ]
            ]
        ]);
    }

    /**
     * Get profile user
     */
    public function profile(Request $request)
    {
        $user = $request->user();
        
        if ($user->id_siswa) {
            $detail = $user->siswa;
            $type = 'siswa';
        } elseif ($user->id_admin) {
            $detail = $user->admin;
            $type = 'admin';
        } else {
            $detail = null;
            $type = 'user';
        }

        return response()->json([
            'success' => true,
            'data' => [
                'user' => [
                    'id' => $user->id_user,
                    'username' => $user->username,
                    'nama_lengkap' => $user->nama_lengkap,
                    'role' => $user->role,
                    'email' => $user->email,
                    'no_telepon' => $user->no_telepon,
                    'foto' => $user->foto,
                    'last_login_at' => $user->last_login_at,
                    'login_count' => $user->login_count,
                    'created_at' => $user->created_at
                ],
                'detail' => $detail,
                'type' => $type
            ]
        ]);
    }

    /**
     * Update profile
     */
    public function updateProfile(Request $request)
    {
        $user = $request->user();
        
        $validated = $request->validate([
            'nama_lengkap' => 'sometimes|string|max:255',
            'email' => 'sometimes|email|max:255|unique:tbl_users,email,' . $user->id_user . ',id_user',
            'no_telepon' => 'sometimes|string|max:20|unique:tbl_users,no_telepon,' . $user->id_user . ',id_user',
            'foto' => 'sometimes|string|max:500'
        ]);

        $user->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Profile berhasil diupdate',
            'data' => $user
        ]);
    }

    /**
     * Check saldo (contoh)
     */
    public function checkBalance(Request $request)
    {
        $user = $request->user();
        
        // Contoh: Ambil saldo dari tabel lain
        // $saldo = Saldo::where('id_user', $user->id_user)->first();
        
        return response()->json([
            'success' => true,
            'balance' => [
                'saldo' => 50000, // Contoh saldo
                'currency' => 'IDR',
                'last_updated' => now()->toDateTimeString()
            ]
        ]);
    }

    /**
     * Get transactions (contoh)
     */
    public function getTransactions(Request $request)
    {
        $user = $request->user();
        
        // Contoh data transaksi
        $transactions = [
            [
                'id' => 1,
                'date' => '2024-01-15 10:30:00',
                'description' => 'Nasi Goreng + Es Teh',
                'amount' => 25000,
                'type' => 'debit',
                'status' => 'completed'
            ],
            [
                'id' => 2,
                'date' => '2024-01-14 12:15:00',
                'description' => 'Top Up Saldo',
                'amount' => 100000,
                'type' => 'credit',
                'status' => 'completed'
            ],
            [
                'id' => 3,
                'date' => '2024-01-13 08:45:00',
                'description' => 'Mie Ayam + Jeruk',
                'amount' => 20000,
                'type' => 'debit',
                'status' => 'completed'
            ]
        ];

        return response()->json([
            'success' => true,
            'total_transactions' => count($transactions),
            'data' => $transactions
        ]);
    }

    /**
     * Change PIN
     */
    public function changePin(Request $request)
    {
        $request->validate([
            'current_pin' => 'required|string|min:6|max:6',
            'new_pin' => 'required|string|min:6|max:6|different:current_pin',
            'confirm_pin' => 'required|string|min:6|max:6|same:new_pin'
        ]);

        $user = $request->user();
        
        // Cek apakah user adalah siswa
        if ($user->id_siswa) {
            $siswa = $user->siswa;
            
            // Verifikasi PIN lama
            if ($siswa->pin !== $request->current_pin) {
                return response()->json([
                    'success' => false,
                    'message' => 'PIN saat ini salah'
                ], 400);
            }
            
            // Update PIN baru
            $siswa->update(['pin' => $request->new_pin]);
            
            return response()->json([
                'success' => true,
                'message' => 'PIN berhasil diubah'
            ]);
        }
        
        // Cek apakah user adalah admin
        if ($user->id_admin) {
            $admin = $user->admin;
            
            // Verifikasi PIN lama
            if ($admin->pin !== $request->current_pin) {
                return response()->json([
                    'success' => false,
                    'message' => 'PIN saat ini salah'
                ], 400);
            }
            
            // Update PIN baru
            $admin->update(['pin' => $request->new_pin]);
            
            return response()->json([
                'success' => true,
                'message' => 'PIN berhasil diubah'
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'User tidak memiliki data PIN'
        ], 400);
    }
}