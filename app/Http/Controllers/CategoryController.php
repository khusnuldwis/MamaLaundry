<?php

namespace App\Http\Controllers;

use App\Models\CategoriLayanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CategoriController extends Controller
{
    // Menampilkan daftar kategori
    public function index()
    {
        $categorys = CategoriLayanan::all(); // Ambil semua data kategori
        return view('category', compact('categorys'));
    }

    // Menyimpan kategori baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_kategori' => 'required|string|max:255', // Validasi nama kategori
        ]);

        try {
            CategoriLayanan::create($validated); // Simpan data ke database
            return redirect()->back()->with('success', 'Kategori berhasil ditambahkan!');
        } catch (\Exception $e) {
            Log::error('Error saat menyimpan kategori: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menambahkan kategori.');
        }
    }

    // Menampilkan form edit kategori
    public function edit($id)
    {
        $kategori = CategoriLayanan::findOrFail($id); // Ambil data kategori berdasarkan ID
        return view('category', compact('kategori'));
    }

    // Memperbarui data kategori
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama_kategori' => 'required|string|max:255', // Validasi nama kategori
        ]);

        try {
            $kategori = CategoriLayanan::findOrFail($id);
            $kategori->update($validated); // Update data di database
            return redirect()->back()->with('success', 'Kategori berhasil diperbarui!');
        } catch (\Exception $e) {
            Log::error('Error saat memperbarui kategori: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Terjadi kesalahan saat memperbarui kategori.');
        }
    }

    // Menghapus kategori
    public function destroy($id)
    {
        try {
            $kategori = CategoriLayanan::findOrFail($id);
            $kategori->delete();
            return redirect()->back()->with('success', 'Kategori berhasil dihapus!');
        } catch (\Exception $e) {
            Log::error('Error saat menghapus kategori: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menghapus kategori.');
        }
    }
}
