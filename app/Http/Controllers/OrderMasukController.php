<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OrderMasuk; // Pastikan Anda memiliki model yang sesuai
use App\Models\Transaksi;
use App\Models\Transaksi_Detail;

class OrderMasukController extends Controller
{
    public function index()
    {
        $transaksis = Transaksi::all();

        return view('orderMasuk', compact('transaksis'));
    }

    public function store(Request $request)
    {
        $transaksi = Transaksi::create([
            'nama_pelanggan' => $request->namaPelanggan,
            'tanggal_pemesanan' => $request->tanggalPemesanan,
            'tanggal_selesai' => $request->tanggalSelesai,
            'status_barang' => $request->statusBarang,
            'status_pembayaran' => $request->statusPembayaran,
        ]);

        Transaksi_Detail::create([
            'transaksi_id' => $transaksi->id,
            'layanan' => $request->layanan,
            'berat' => $request->berat,
            // tambahkan kolom lain jika perlu
        ]);

        return redirect()->route('orderMasuk.index');
    }

    public function addDetail(Request $request, $transaksiId)
    {
        // Validasi input
        $request->validate([
            'layanan' => 'required|string',
            'berat' => 'required|numeric',
            'total_pembayaran' => 'required|numeric',
        ]);

        // Menambah transaksi detail ke transaksi tertentu
        Transaksi_Detail::create([
            'transaksi_id' => $transaksiId,
            'layanan' => $request->layanan,
            'berat' => $request->berat,
            'total_pembayaran' => $request->total_pembayaran,
        ]);

        return redirect()->route('transaksi.show', $transaksiId)->with('success', 'Detail transaksi berhasil ditambahkan');
    }

    public function editDetail(Request $request, $id)
{
    // Validasi input
    $request->validate([
        'layanan' => 'required|string',
        'berat' => 'required|numeric',
        'total_pembayaran' => 'required|numeric',
    ]);

    // Cari transaksi detail berdasarkan ID
    $transaksiDetail = Transaksi_Detail::findOrFail($id);
    
    // Update transaksi detail
    $transaksiDetail->update([
        'layanan' => $request->layanan,
        'berat' => $request->berat,
        'total_pembayaran' => $request->total_pembayaran,
    ]);

    return redirect()->route('transaksi.show', $transaksiDetail->transaksi_id)->with('success', 'Detail transaksi berhasil diperbarui');
}

public function destroyDetail($id)
{
    // Cari transaksi detail berdasarkan ID
    $transaksiDetail = Transaksi_Detail::findOrFail($id);
    
    // Hapus transaksi detail
    $transaksiDetail->delete();

    return redirect()->route('transaksi.show', $transaksiDetail->transaksi_id)->with('success', 'Detail transaksi berhasil dihapus');
}


}
