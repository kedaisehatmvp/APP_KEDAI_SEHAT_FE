<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Siswa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class SuperAdminController extends Controller
{
    /**
     * Get all students
     */
    public function getAllSiswa(Request $request)
    {
        $siswa = Siswa::with('user')
            ->orderBy('jurusan')
            ->orderBy('kelas')
            ->orderBy('nama_siswa')
            ->paginate(20);

        return response()->json([
            'success' => true,
            'data' => $siswa
        ]);
    }

    /**
     * Get all admin
     */
    public function getAllAdmin(Request $request)
    {
        $admin = Admin::with('user')
            ->orderBy('role')
            ->orderBy('nama_siswa')
            ->paginate(20);

        return response()->json([
            'success' => true,
            'data' => $admin
        ]);
    }

    /**
     * Create new admin
     */
    public function createAdmin(Request $request)
    {
        $validated = $request->validate([
            'nis' => 'required|string|unique:tbl_admin,nis',
            'nama_siswa' => 'required|string|max:255',
            'kelas' => 'required|string|max:50',
            'jurusan' => 'required|string|max:100',
            'role' => 'required|in:rpl,kuliner,farmasi,akuntansi',
            'gender' => 'required|in:L,P',
            'nama_ibu' => 'nullable|string|max:255',
            'nama_ayah' => 'nullable|string|max:255',
            'tempat_lahir' => 'nullable|string|max:255',
            'tgl_lahir' => 'nullable|date',
            'pin' => 'nullable|string|min:6|max:6'
        ]);

        // Generate PIN jika tidak disediakan
        if (!isset($validated['pin'])) {
            $validated['pin'] = str_pad(random_int(0, 999999), 6, '0', STR_PAD_LEFT);
        }

        $admin = Admin::create($validated);

        // Create user account
        $user = User::create([
            'username' => $validated['nis'],
            'password' => Hash::make(Str::random(12)), // Random password
            'nama_lengkap' => $validated['nama_siswa'],
            'role' => $validated['role'],
            'id_admin' => $admin->id_admin
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Admin berhasil dibuat',
            'data' => [
                'admin' => $admin,
                'user' => $user,
                'login_credentials' => [
                    'username' => $user->username,
                    'pin' => $validated['pin'],
                    'note' => 'Silakan login dengan NIS dan PIN, kemudian lakukan wizard OTP'
                ]
            ]
        ]);
    }

    /**
     * Delete admin
     */
    public function deleteAdmin(Request $request, $id)
    {
        $admin = Admin::find($id);
        
        if (!$admin) {
            return response()->json([
                'success' => false,
                'message' => 'Admin tidak ditemukan'
            ], 404);
        }

        // Delete associated user
        User::where('id_admin', $id)->delete();
        
        // Delete admin
        $admin->delete();

        return response()->json([
            'success' => true,
            'message' => 'Admin berhasil dihapus'
        ]);
    }
}