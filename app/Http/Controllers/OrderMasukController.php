<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use Illuminate\Http\Request;
use App\Models\OrderMasuk; // Pastikan Anda memiliki model yang sesuai
use App\Models\Transaksi;
use App\Models\Transaksi_Detail;

class OrderMasukController extends Controller
{
    public function index()
    {
        $transaksis = Transaksi::all(); 
        $layanans = Layanan::get();  
 
        return view('orderMasuk', compact('transaksis','layanans'));  
    }
    public function belumDiambil()
{
    $transaksis = Transaksi::with('layanan')
        ->where('status_barang', 'Belum Diambil')
        ->get();

    return view('belum_diambil', compact('transaksis'));
}




    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'namaPelanggan' => 'required',
            'noHp' => 'required',
            'alamat' => 'required',
            'layanan_id' => 'required',
            'berat' => 'required|numeric',
            'tanggalPemesanan' => 'required|date',
            'tanggalSelesai' => 'required|date',
            'statusBarang' => 'required',
            'statusPembayaran' => 'required',
        ]);
    
        Transaksi::create([
            'nama_pelanggan' => $validatedData['namaPelanggan'],
            'no_hp' => $validatedData['noHp'],
            'alamat' => $validatedData['alamat'],
            'layanan_id' => $validatedData['layanan_id'],
            'berat' => $validatedData['berat'],
            'tanggal_pemesanan' => $validatedData['tanggalPemesanan'],
            'tanggal_selesai' => $validatedData['tanggalSelesai'],
            'status_barang' => $validatedData['statusBarang'],
            'status_pembayaran' => $validatedData['statusPembayaran'],
        ]);
    
        return redirect()->route('orderMasuk.index')->with('success', 'Data berhasil ditambahkan!');
    }
    
    public function addDetail(Request $request, $transaksiId)
    {
        $request->validate([
            'layanan' => 'required|string',
            'berat' => 'required|numeric',
            'total_pembayaran' => 'required|numeric',
        ]);

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
    $request->validate([
        'layanan' => 'required|string',
        'berat' => 'required|numeric',
        'total_pembayaran' => 'required|numeric',
    ]);

    $transaksiDetail = Transaksi_Detail::findOrFail($id);
    
    $transaksiDetail->update([
        'layanan' => $request->layanan,
        'berat' => $request->berat,
        'total_pembayaran' => $request->total_pembayaran,
    ]);

    return redirect()->route('transaksi.show', $transaksiDetail->transaksi_id)->with('success', 'Detail transaksi berhasil diperbarui');
}

public function destroyDetail($id)
{
    $transaksiDetail = Transaksi_Detail::findOrFail($id);
    
    $transaksiDetail->delete();

    return redirect()->route('transaksi.show', $transaksiDetail->transaksi_id)->with('success', 'Detail transaksi berhasil dihapus');
}


}
