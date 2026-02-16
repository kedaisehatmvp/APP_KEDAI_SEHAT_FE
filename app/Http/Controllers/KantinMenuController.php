<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\KantinMenu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class KantinMenuController extends Controller
{
    // GET: /api/kantin-menus
    public function index()
    {
        try {
            $menus = KantinMenu::with('gizi')
                ->active()
                ->orderBy('created_at', 'desc')
                ->get();

            return response()->json([
                'success' => true,
                'message' => 'Daftar menu kantin berhasil diambil',
                'data' => $menus,
                'total' => $menus->count()
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan server',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    // POST: /api/kantin-menus
    public function store(Request $request)
    {
        // Validasi
        $validator = Validator::make($request->all(), [
            'kode_menu' => 'required|unique:kantin_menus,kode_menu|max:20',
            'nama_menu' => 'required|max:100',
            'kategori' => 'required|max:50',
            'deskripsi' => 'nullable|string',
            'harga' => 'required|numeric|min:0',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'best_seller' => 'in:ya,tidak',
            'stok' => 'integer|min:0'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validasi gagal',
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            $data = $request->all();
            
            // Handle upload foto
            if ($request->hasFile('foto')) {
                $file = $request->file('foto');
                $fileName = time() . '_' . $file->getClientOriginalName();
                $file->storeAs('public/kantin/menus', $fileName);
                $data['foto'] = $fileName;
            }

            // Set default values
            $data['best_seller'] = $data['best_seller'] ?? 'tidak';
            $data['stok'] = $data['stok'] ?? 0;

            $menu = KantinMenu::create($data);

            return response()->json([
                'success' => true,
                'message' => 'Menu kantin berhasil ditambahkan',
                'data' => $menu->load('gizi')
            ], 201);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal menambahkan menu',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    // GET: /api/kantin-menus/{id}
    public function show($id)
    {
        try {
            $menu = KantinMenu::with('gizi')->find($id);

            if (!$menu) {
                return response()->json([
                    'success' => false,
                    'message' => 'Menu kantin tidak ditemukan'
                ], 404);
            }

            return response()->json([
                'success' => true,
                'data' => $menu
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    // PUT: /api/kantin-menus/{id}
    public function update(Request $request, $id)
    {
        $menu = KantinMenu::find($id);

        if (!$menu) {
            return response()->json([
                'success' => false,
                'message' => 'Menu kantin tidak ditemukan'
            ], 404);
        }

        $validator = Validator::make($request->all(), [
            'kode_menu' => 'sometimes|required|unique:kantin_menus,kode_menu,' . $id . ',id_menu|max:20',
            'nama_menu' => 'sometimes|required|max:100',
            'kategori' => 'sometimes|required|max:50',
            'deskripsi' => 'nullable|string',
            'harga' => 'sometimes|required|numeric|min:0',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'best_seller' => 'in:ya,tidak',
            'stok' => 'integer|min:0',
            'soft_delete' => 'in:ya,tidak'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validasi gagal',
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            $data = $request->all();
            
            // Handle upload foto baru
            if ($request->hasFile('foto')) {
                // Hapus foto lama jika ada
                if ($menu->foto && Storage::exists('public/kantin/menus/' . $menu->foto)) {
                    Storage::delete('public/kantin/menus/' . $menu->foto);
                }
                
                $file = $request->file('foto');
                $fileName = time() . '_' . $file->getClientOriginalName();
                $file->storeAs('public/kantin/menus', $fileName);
                $data['foto'] = $fileName;
            }

            $menu->update($data);

            return response()->json([
                'success' => true,
                'message' => 'Menu kantin berhasil diperbarui',
                'data' => $menu->load('gizi')
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal memperbarui menu',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    // DELETE: /api/kantin-menus/{id}
    public function destroy($id)
    {
        $menu = KantinMenu::find($id);

        if (!$menu) {
            return response()->json([
                'success' => false,
                'message' => 'Menu kantin tidak ditemukan'
            ], 404);
        }

        try {
            // Soft delete
            $menu->delete(['soft_delete' => 'ya']);

            return response()->json([
                'success' => true,
                'message' => 'Menu kantin berhasil dihapus (soft delete)'
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal menghapus menu',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    // GET: /api/kantin-menus/best-seller
    public function bestSeller()
    {
        try {
            $menus = KantinMenu::with('gizi')
                ->bestSeller()
                ->active()
                ->get();

            return response()->json([
                'success' => true,
                'message' => 'Daftar menu best seller',
                'data' => $menus
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    // GET: /api/kantin-menus/search?q=keyword
    public function search(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'q' => 'required|string|min:2'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Kata kunci pencarian minimal 2 karakter',
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            $keyword = $request->get('q');
            
            $menus = KantinMenu::with('gizi')
                ->search($keyword)
                ->active()
                ->get();

            return response()->json([
                'success' => true,
                'message' => 'Hasil pencarian untuk: ' . $keyword,
                'data' => $menus,
                'total' => $menus->count()
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan pencarian',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    // GET: /api/kantin-menus/kategori/{kategori}
    public function byKategori($kategori)
    {
        try {
            $menus = KantinMenu::with('gizi')
                ->where('kategori', $kategori)
                ->active()
                ->get();

            return response()->json([
                'success' => true,
                'message' => 'Menu berdasarkan kategori: ' . $kategori,
                'data' => $menus,
                'total' => $menus->count()
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