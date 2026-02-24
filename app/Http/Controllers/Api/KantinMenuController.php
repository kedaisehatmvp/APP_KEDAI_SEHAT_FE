<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\KantinMenu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class KantinMenuController extends Controller
{
    // GET: /api/v1/kantin-menus
    public function index()
    {
        try {
            $menus = KantinMenu::active()->get();

            return response()->json([
                'success' => true,
                'message' => 'Data menu berhasil diambil',
                'data' => $menus,
                'count' => count($menus)
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan server',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    // POST: /api/v1/kantin-menus
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:100',
            'category_id' => 'required|string',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'best_seller' => 'nullable|boolean',
            'discount' => 'nullable|numeric|min:0|max:100',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validasi gagal',
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            // Handle image upload
            $fotoPath = null;
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $filename = time() . '_' . Str::random(10) . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('images/menus'), $filename);
                $fotoPath = 'images/menus/' . $filename;
            }

            // Generate kode_menu
            $kodeMenu = 'MENU' . str_pad(KantinMenu::count() + 1, 5, '0', STR_PAD_LEFT);

            // Create menu
            $menu = KantinMenu::create([
                'kode_menu' => $kodeMenu,
                'nama_menu' => $request->name,
                'kategori' => $request->category_id,
                'deskripsi' => $request->description,
                'harga' => $request->price,
                'foto' => $fotoPath,
                'best_seller' => $request->boolean('best_seller') ? 'ya' : 'tidak',
                'stok' => $request->stock,
                'soft_delete' => 'tidak'
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Menu berhasil ditambahkan',
                'data' => $menu
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal menambahkan menu',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    // GET: /api/v1/kantin-menus/{id}
    public function show($id)
    {
        try {
            $menu = KantinMenu::find($id);

            if (!$menu) {
                return response()->json([
                    'success' => false,
                    'message' => 'Menu tidak ditemukan'
                ], 404);
            }

            return response()->json([
                'success' => true,
                'message' => 'Detail menu berhasil diambil',
                'data' => $menu
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan server',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    // PUT: /api/v1/kantin-menus/{id}
    public function update(Request $request, $id)
    {
        $menu = KantinMenu::find($id);

        if (!$menu) {
            return response()->json([
                'success' => false,
                'message' => 'Menu tidak ditemukan'
            ], 404);
        }

        $validator = Validator::make($request->all(), [
            'name' => 'sometimes|required|string|max:100',
            'category_id' => 'sometimes|required|string',
            'price' => 'sometimes|required|numeric|min:0',
            'stock' => 'sometimes|required|integer|min:0',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'best_seller' => 'nullable|boolean',
            'discount' => 'nullable|numeric|min:0|max:100',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validasi gagal',
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            // Handle image upload
            if ($request->hasFile('image')) {
                // Delete old image
                if ($menu->foto && file_exists(public_path($menu->foto))) {
                    unlink(public_path($menu->foto));
                }

                $image = $request->file('image');
                $filename = time() . '_' . Str::random(10) . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('images/menus'), $filename);
                $menu->foto = 'images/menus/' . $filename;
            }

            // Update fields
            if ($request->has('name')) {
                $menu->nama_menu = $request->name;
            }
            if ($request->has('category_id')) {
                $menu->kategori = $request->category_id;
            }
            if ($request->has('price')) {
                $menu->harga = $request->price;
            }
            if ($request->has('stock')) {
                $menu->stok = $request->stock;
            }
            if ($request->has('description')) {
                $menu->deskripsi = $request->description;
            }
            if ($request->has('best_seller')) {
                $menu->best_seller = $request->boolean('best_seller') ? 'ya' : 'tidak';
            }

            $menu->save();

            return response()->json([
                'success' => true,
                'message' => 'Menu berhasil diperbarui',
                'data' => $menu
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal memperbarui menu',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    // DELETE: /api/v1/kantin-menus/{id}
    public function destroy($id)
    {
        try {
            $menu = KantinMenu::find($id);

            if (!$menu) {
                return response()->json([
                    'success' => false,
                    'message' => 'Menu tidak ditemukan'
                ], 404);
            }

            // Soft delete
            $menu->soft_delete = 'ya';
            $menu->save();

            return response()->json([
                'success' => true,
                'message' => 'Menu berhasil dihapus'
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal menghapus menu',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    // GET: /api/v1/kantin-menus/best-seller
    public function bestSeller()
    {
        try {
            $menus = KantinMenu::active()
                ->where('best_seller', 'ya')
                ->get();

            return response()->json([
                'success' => true,
                'message' => 'Data best seller berhasil diambil',
                'data' => $menus,
                'count' => count($menus)
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan server',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    // GET: /api/v1/kantin-menus/search
    public function search(Request $request)
    {
        try {
            $keyword = $request->get('q', '');

            if (empty($keyword)) {
                return response()->json([
                    'success' => false,
                    'message' => 'Keyword pencarian diperlukan',
                    'data' => []
                ], 400);
            }

            $menus = KantinMenu::active()
                ->where('nama_menu', 'like', '%' . $keyword . '%')
                ->orWhere('deskripsi', 'like', '%' . $keyword . '%')
                ->get();

            return response()->json([
                'success' => true,
                'message' => 'Hasil pencarian menu',
                'data' => $menus,
                'count' => count($menus)
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan server',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    // GET: /api/v1/kantin-menus/kategori/{kategori}
    public function byKategori($kategori)
    {
        try {
            $menus = KantinMenu::active()
                ->where('kategori', $kategori)
                ->get();

            return response()->json([
                'success' => true,
                'message' => 'Menu berdasarkan kategori berhasil diambil',
                'kategori' => $kategori,
                'data' => $menus,
                'count' => count($menus)
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan server',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
