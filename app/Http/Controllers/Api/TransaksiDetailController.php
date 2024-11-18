<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\CategoriLayanan;
use App\Models\Transaksi;
use App\Models\Transaksi_Detail;
use Illuminate\Http\Request;

class TransaksiDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Transaksi_Detail::all();
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
            'layanan_id' => 'required|string',
            'metode_layanan_id' => 'required|string',
            'transaksi_id' => 'required|string',
            'user_id' => 'required|string',
        ]);

        $transaksi = Transaksi::create([
            'layanan_id' => $request->layanan_id,
            'metode_layanan_id' => $request->metode_layanan_id,
            'transaksi_id' => $request->transaksi_id,
            'user_id' => $request->user_id,
            
        ]);

        return response()->json(['pesan' => "Transaksi berhasil ditambahkan"], 200);
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
        // Validasi input
        $request->validate([
            'layanan_id' => 'required|string',
            'metode_layanan_id' => 'required|string',
            'transaksi_id' => 'required|string',
            'user_id' => 'required|string',
        ]);
    
        // Cari data berdasarkan ID
        $transaksi = Transaksi::find($id);
    
        // Jika data tidak ditemukan, kembalikan respons error
        if (!$transaksi) {
            return response()->json(['pesan' => 'Kategori Layanan tidak ditemukan'], 404);
        }
    
        // Lakukan update data
        $transaksi->update([
            'layanan_id' => $request->layanan_id,
            'metode_layanan_id' => $request->metode_layanan_id,
            'transaksi_id' => $request->transaksi_id,
            'user_id' => $request->user_id,
        ]);
    
        // Kembalikan respons sukses
        return response()->json(['pesan' => "Data berhasil diperbarui"], 200);
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Transaksi_Detail::where('id', $id)->delete();
        return response()->json(['data' => $data], 200);
    }
}
