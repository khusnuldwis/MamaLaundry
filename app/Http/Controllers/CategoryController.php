<?php

namespace App\Http\Controllers;

use App\Models\CategoriLayanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    // Menampilkan semua data category
    public function index()
    {
        $categorys = CategoriLayanan::with('category')->get();
        return response()->json($categorys);
    }

    // Menampilkan detail category berdasarkan ID
    public function show($id)
    {
        $category = CategoriLayanan::with('category')->find($id);
        if (!$category) {
            return response()->json(['message' => 'category tidak ditemukan'], 404);
        }
        return response()->json(['data' => $category]);
    }

    // Menyimpan category baru
    public function store(Request $request)
    {
        try {
            $data = $request->all();

            if ($request->hasFile('thumbnail')) {
                $file = $data['thumbnail']->store('thumbnail', 'public');
                $data['thumbnail'] = $file;
            }


            $create = CategoriLayanan::create($data);

            return response()->json(['pesan' => "category berhasil ditambahkan"], 200);
        } catch (\Throwable $th) {
            return response()->json(['pesan' => "category berhasil ditambahkan"], 200);
        }
    }

    // Mengupdate data category
    public function update(Request $request, $id)
    {
        $category = CategoriLayanan::find($id);
        if (!$category) {
            return response()->json(['message' => 'category tidak ditemukan'], 404);
        }

        // $validatedData = $request->validate([
        //     'nama_category' => 'required|string|max:255',
        //     'jenis_category' => 'required',
        //     'unit' => 'required',
        //     'harga' => 'required|numeric',
        //     'category_id' => 'required|exists:categories,id',
        //     'thumbnail' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        // ]);

        if ($request->hasFile('thumbnail')) {
            if ($category->thumbnail) {
                Storage::delete($category->thumbnail);
            }
            $path = $request->file('thumbnail')->store('thumbnails');
            $validatedData['thumbnail'] = $path;
        }

        $category->update($validatedData);
        return response()->json(['data' => $category, 'message' => 'category berhasil diperbarui']);
    }

    // Menghapus category
    public function destroy($id)
    {
        $category = CategoriLayanan::find($id);
        if (!$category) {
            return response()->json(['message' => 'category tidak ditemukan'], 404);
        }

        if ($category->thumbnail) {
            Storage::delete($category->thumbnail);
        }

        $category->delete();
        return response()->json(['message' => 'category berhasil dihapus']);
    }
}
