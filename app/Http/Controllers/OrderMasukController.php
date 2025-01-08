<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use Illuminate\Http\Request;
use App\Models\Transaksi;

class OrderMasukController extends Controller
{
    public function index()
    {
        // Retrieve all transactions and services
        $transaksis = Transaksi::all();
        $layanans = Layanan::all();

        return view('orderMasuk', compact('transaksis', 'layanans'));
    }
<<<<<<< HEAD
=======
    public function belumDiambil()
{
    $transaksis = Transaksi::with('layanan')
        ->where('status_barang', 'Belum Diambil')
        ->get();

    return view('belum_diambil', compact('transaksis'));
}



>>>>>>> ac5a93aad188f3e4aa46d4e76834f9df84425dff

    public function store(Request $request)
    {
        // Validate incoming request
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

        // Create a new transaction
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

    public function destroy($id)
    {
        // Find the transaction and delete it
        $transaksi = Transaksi::findOrFail($id);
        $transaksi->delete();

        // Redirect back to the transaction list
        return redirect()->route('orderMasuk.index')->with('success', 'Order berhasil dihapus');
    }
}
