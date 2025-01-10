<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LayananController extends Controller
{
    // Menampilkan semua data layanan
    public function index()
    {
        $layanans = Layanan::with('category')->get();
        return response()->json($layanans);
        return view('layanan.index');
    }

    // Menampilkan detail layanan berdasarkan ID
    public function show($id)
    {
        $layanan = Layanan::with('category')->find($id);
        if (!$layanan) {
            return response()->json(['message' => 'Layanan tidak ditemukan'], 404);
        }
        return response()->json(['data' => $layanan]);
    }

    // Menyimpan layanan baru
    public function store(Request $request)
    {
        try {
            $data = $request->all();

            if ($request->hasFile('thumbnail')) {
                $file = $data['thumbnail']->store('thumbnail', 'public');
                $data['thumbnail'] = $file;
            }


            $create = Layanan::create($data);

            return response()->json(['pesan' => "Layanan berhasil ditambahkan"], 200);
        } catch (\Throwable $th) {
            return response()->json(['pesan' => "Layanan berhasil ditambahkan"], 200);
        }
    }

    // Mengupdate data layanan
    public function update(Request $request, $id)
    {
        $layanan = Layanan::find($id);
        if (!$layanan) {
            return response()->json(['message' => 'Layanan tidak ditemukan'], 404);
        }

        $validatedData = $request->validate([
            'nama_layanan' => 'required|string|max:255',
            'unit' => 'required',
            'harga' => 'required|numeric',
            'category_id' => 'required|exists:categories,id',
            'thumbnail' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        if ($request->hasFile('thumbnail')) {
            if ($layanan->thumbnail) {
                Storage::delete($layanan->thumbnail);
            }
            $path = $request->file('thumbnail')->store('thumbnails');
            $validatedData['thumbnail'] = $path;
        }

        $layanan->update($validatedData);
        return response()->json(['data' => $layanan, 'message' => 'Layanan berhasil diperbarui']);
    }

    // Menghapus layanan
    public function destroy($id)
    {
        $layanan = Layanan::find($id);
        if (!$layanan) {
            return response()->json(['message' => 'Layanan tidak ditemukan'], 404);
        }

        if ($layanan->thumbnail) {
            Storage::delete($layanan->thumbnail);
        }

        $layanan->delete();
        return response()->json(['message' => 'Layanan berhasil dihapus']);
    }
}
