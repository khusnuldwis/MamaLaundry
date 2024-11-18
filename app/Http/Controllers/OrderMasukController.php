<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OrderMasuk; // Pastikan Anda memiliki model yang sesuai

class OrderMasukController extends Controller
{
    // Menampilkan halaman daftar pesanan masuk
    public function index()
    {
        // Ambil data dari database
        $transaksis = OrderMasuk::all();

        // Kirim data ke view
        return view('orderMasuk', compact('transaksis'));
    }

    // Menambahkan data pelanggan baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'namaPelanggan' => 'required|string|max:255',
            'noHP' => 'required|string|max:15',
            'alamat' => 'required|string|max:255',
            'layanan' => 'required|string',
            'berat' => 'required|numeric|min:0',
            'tanggalPemesanan' => 'required|date',
            'tanggalSelesai' => 'required|date|after_or_equal:tanggalPemesanan',
            'statusBarang' => 'required|string',
            'statusPembayaran' => 'required|string',
        ]);

        // Simpan ke database
        OrderMasuk::create($validated);

        return redirect()->route('orderMasuk.index')->with('success', 'Data pelanggan berhasil ditambahkan!');
    }
}
