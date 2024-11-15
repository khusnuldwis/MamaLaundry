<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\CategoriLayanan;
use Illuminate\Http\Request;

class CategoryLayananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = CategoriLayanan::all();
        return response()->json($data, 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_kategori' => 'required|string',
        ]);

        $categoriLayanan = CategoriLayanan::create([
            'nama_kategori' => $request->nama_kategori,
            
        ]);

        return response()->json(['pesan' => "Kategori layanan berhasil ditambahkan"], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $categoriLayanan = CategoriLayanan::with(['tim', 'interior'])->find($id);
        if ($categoriLayanan) {
            return view('detail_categoriLayanan', compact('categoriLayanan'));
        } else {
            return response()->json(['message' => 'Kategori layanan tidak ditemukan'], 404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id) {}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $data = $request->all();

            if ($request->hasFile('gambar_kategori_layanan')) {
                $file = $request->file('gambar_kategori_layanan')->store('gambar_kategori_layanan', 'public');
                $data['gambar_kategori_layanan'] = $file;
            }

            $update = CategoriLayanan::find($id)->update($data);

            return response()->json(['pesan' => "Kategori layanan berhasil diubah"], 200);
        } catch (\Throwable $th) {
            return response()->json(['pesan' => "Gagal mengubah kategori layanan"], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = CategoriLayanan::where('id', $id)->delete();
        return response()->json(['data' => $data], 200);
    }
}
