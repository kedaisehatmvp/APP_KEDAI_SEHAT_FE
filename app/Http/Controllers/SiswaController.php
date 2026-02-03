<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function index()
    {
        $siswa = Siswa::all();

        return view('admin.siswa.index', compact('siswa'));
    }

    public function create()
    {
        return view('admin.siswa.create');
    }

    public function edit($id)
    {
        $siswa = Siswa::findOrFail($id);

        return view('admin.siswa.edit', compact('siswa'));
    }

    public function update(Request $request, $id)
    {
        $siswa = Siswa::findOrFail($id);

        $siswa->update([
            'nis' => $request->nis,
            'nama_siswa' => $request->nama_siswa,
            'kelas' => $request->kelas,
            'jurusan' => $request->jurusan,
            'nama_ibu' => $request->nama_ibu,
            'nama_ayah' => $request->nama_ayah,
            'tempat_lahir' => $request->tempat_lahir,
            'tgl_lahir' => $request->tgl_lahir,
            'gender' => $request->gender,
        ]);

        return redirect()
        ->route('admin.siswa.index')
        ->with('success', 'Data berhasil diupdate');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nis' => 'required|unique:tbl_siswa,nis',
            'nama_siswa' => 'required',
            'kelas' => 'required',
            'jurusan' => 'required',
            'nama_ibu' => 'required',
            'nama_ayah' => 'required',
            'tempat_lahir' => 'required',
            'tgl_lahir' => 'required|date',
            'gender' => 'required',
        ]);

        $data = $request->all();

        \App\Models\Siswa::create($data);

        // Kirim respon JSON karena kita akan menggunakan AJAX
        return response()->json(['success' => true]);
    }

    public function show($id)
    {
        $siswa = Siswa::findOrFail($id);

        return view('admin.siswa.show', compact('siswa'));
    }

public function destroy($id)
{
    $siswa = Siswa::where('id_siswa', $id)->first();
    
    if ($siswa) {
        $siswa->delete();
        
        // Cek apakah request AJAX
        if (request()->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Data siswa berhasil dihapus!'
            ]);
        }
        
        return redirect()->route('admin.siswa.index')->with('success', 'Data berhasil dihapus!');
    }
    
    if (request()->ajax()) {
        return response()->json([
            'success' => false,
            'message' => 'Data tidak ditemukan!'
        ], 404);
    }
    
    return redirect()->route('admin.siswa.index')->with('error', 'Data tidak ditemukan!');
}
}