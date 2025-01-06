<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use Illuminate\Http\Request;
use App\Models\Transaksi;
use App\Models\Transaksi_Detail;
use Illuminate\Support\Facades\DB;

class TransaksiController extends Controller
{
    // Fungsi untuk mengambil semua transaksi
    public function index()
    {
        $transaksis = Transaksi_Detail::with("layanan")->get();
        return response()->json($transaksis);
    }

    // Fungsi untuk menyimpan transaksi baru
    public function store(Request $request)
{
    DB::transaction(function () use ($request) {
        // Buat kode transaksi otomatis
        $kode_transaksi = 'TRX-' . now()->format('YmdHis');

        // Simpan transaksi
        $transaksi = Transaksi::create([
            'kode_transaksi' => $kode_transaksi,
            'nama_pelanggan' => $request->nama_pelanggan,
            'no_hp' => $request->no_hp,
            'tanggal_pemesanan' => $request->tanggal_pemesanan,
            'tanggal_selesai' => $request->tanggal_selesai,
            'status_pembayaran' => $request->status_pembayaran,
            'total_harga' => 0, // Diupdate setelah menghitung detail
        ]);

        // Simpan detail transaksi
        $total_harga = 0;
        foreach ($request->details as $detail) {
            $layanan = Layanan::findOrFail($detail['layanan_id']);
            $subtotal = $detail['berat'] * $layanan->harga_per_kg;
            $total_harga += $subtotal;

            Transaksi_Detail::create([
                'transaksi_id' => $transaksi->id,
                'layanan_id' => $layanan->id,
                'berat' => $detail['berat'],
                'harga_per_kg' => $layanan->harga_per_kg,
                'subtotal' => $subtotal,
            ]);
        }

        // Update total harga transaksi
        $transaksi->update(['total_harga' => $total_harga]);
    });

    return response()->json(['success' => 'Transaksi berhasil disimpan.']);
}


    
    

    // Fungsi untuk menampilkan detail transaksi
    public function show($id)
    {
        $transaksi = Transaksi::find($id);

        if (!$transaksi) {
            return response()->json(['message' => 'Transaksi tidak ditemukan!'], 404);
        }

        return response()->json($transaksi);
    }

    // Fungsi untuk memperbarui transaksi
    public function update(Request $request, $id)
    {
        $transaksi = Transaksi::find($id);

        if (!$transaksi) {
            return response()->json(['message' => 'Transaksi tidak ditemukan!'], 404);
        }

        $request->validate([
            'nama_pelanggan' => 'required|string|max:255',
            'total_harga' => 'required|numeric|min:0',
        ]);

        $transaksi->update([
            'nama_pelanggan' => $request->nama_pelanggan,
            'total_harga' => $request->total_harga,
        ]);

        return response()->json(['message' => 'Transaksi berhasil diperbarui!', 'data' => $transaksi]);
    }

    // Fungsi untuk menghapus transaksi
    public function destroy($id)
    {
        $transaksi = Transaksi::find($id);

        if (!$transaksi) {
            return response()->json(['message' => 'Transaksi tidak ditemukan!'], 404);
        }

        $transaksi->delete();

        return response()->json(['message' => 'Transaksi berhasil dihapus!']);
    }
}
