<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\KantinGizi;
use App\Models\KantinMenu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KantinGiziController extends Controller
{
    // GET: /api/kantin-gizi
    public function index()
    {
        try {
            $gizi = KantinGizi::with('menu')->get();

            return response()->json([
                'success' => true,
                'message' => 'Data gizi berhasil diambil',
                'data' => $gizi
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan server',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    // POST: /api/kantin-gizi
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id_menu' => 'required|exists:kantin_menus,id_menu|unique:kantin_gizi,id_menu',
            'kalori' => 'nullable|numeric|min:0',
            'lemak' => 'nullable|numeric|min:0',
            'serat' => 'nullable|numeric|min:0',
            'protein' => 'nullable|numeric|min:0',
            'karbohidrat' => 'nullable|numeric|min:0'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validasi gagal',
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            $gizi = KantinGizi::create($request->all());

            return response()->json([
                'success' => true,
                'message' => 'Data gizi berhasil disimpan',
                'data' => $gizi->load('menu')
            ], 201);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal menyimpan data gizi',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    // GET: /api/kantin-gizi/{id}
    public function show($id)
    {
        try {
            $gizi = KantinGizi::with('menu')->find($id);

            if (!$gizi) {
                return response()->json([
                    'success' => false,
                    'message' => 'Data gizi tidak ditemukan'
                ], 404);
            }

            return response()->json([
                'success' => true,
                'data' => $gizi
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    // PUT: /api/kantin-gizi/{id}
    public function update(Request $request, $id)
    {
        $gizi = KantinGizi::find($id);

        if (!$gizi) {
            return response()->json([
                'success' => false,
                'message' => 'Data gizi tidak ditemukan'
            ], 404);
        }

        $validator = Validator::make($request->all(), [
            'kalori' => 'nullable|numeric|min:0',
            'lemak' => 'nullable|numeric|min:0',
            'serat' => 'nullable|numeric|min:0',
            'protein' => 'nullable|numeric|min:0',
            'karbohidrat' => 'nullable|numeric|min:0'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validasi gagal',
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            $gizi->update($request->all());

            return response()->json([
                'success' => true,
                'message' => 'Data gizi berhasil diperbarui',
                'data' => $gizi->load('menu')
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal memperbarui data gizi',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    // DELETE: /api/kantin-gizi/{id}
    public function destroy($id)
    {
        $gizi = KantinGizi::find($id);

        if (!$gizi) {
            return response()->json([
                'success' => false,
                'message' => 'Data gizi tidak ditemukan'
            ], 404);
        }

        try {
            $gizi->delete();

            return response()->json([
                'success' => true,
                'message' => 'Data gizi berhasil dihapus'
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal menghapus data gizi',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    // GET: /api/kantin-gizi/menu/{id_menu}
    public function byMenu($id_menu)
    {
        try {
            $menu = KantinMenu::with('gizi')->find($id_menu);

            if (!$menu) {
                return response()->json([
                    'success' => false,
                    'message' => 'Menu tidak ditemukan'
                ], 404);
            }

            return response()->json([
                'success' => true,
                'message' => 'Data gizi untuk menu: ' . $menu->nama_menu,
                'menu' => $menu->only(['id_menu', 'kode_menu', 'nama_menu', 'kategori']),
                'gizi' => $menu->gizi
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}