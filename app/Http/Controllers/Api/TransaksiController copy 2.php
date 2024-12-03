<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Transaksi;
use App\Models\Transaksi_Detail;
use App\Models\TransaksiDetail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
class TransaksiController extends Controller
{
    // Menampilkan semua data transaksi
    public function index()
    {
        $data = Transaksi::with("layanan")->get();
        return response()->json($data, 200);
    }

    // Menampilkan form untuk membuat transaksi baru
    public function create()
    {
    }

    // Menyimpan data transaksi baru ke database
    public function store(Request $request)
    {
        // Validate incoming request
        $validatedData = $request->validate([
            'nama_pelanggan' => 'required',
            'no_hp' => 'required',
            'alamat' => 'required',
            'layanan_id' => 'required',
            'berat' => 'required|numeric',
            'tanggal_pemesanan' => 'required|date',
            'tanggal_selesai' => 'required|date',
            'status_barang' => 'required',
            'status_pembayaran' => 'required',
        ]);

        // Create a new transaction
        Transaksi::create([
            'nama_pelanggan' => $validatedData['nama_pelanggan'],
            'no_hp' => $validatedData['no_hp'],
            'alamat' => $validatedData['alamat'],
            'layanan_id' => $validatedData['layanan_id'],
            'berat' => $validatedData['berat'],
            'tanggal_pemesanan' => $validatedData['tanggal_pemesanan'],
            'tanggal_selesai' => $validatedData['tanggal_selesai'],
            'status_barang' => $validatedData['status_barang'],
            'status_pembayaran' => $validatedData['status_pembayaran'],
        ]);

        return redirect()->route('orderMasuk.index')->with('success', 'Data berhasil ditambahkan!');
    }
    

    // Menampilkan detail transaksi
    public function show($id)
    {
        $transaksi = Transaksi::with('layanan')->find($id);

        if (!$transaksi) {
            return response()->json(['error' => 'Layanan tidak ditemukan'], 404);
        }

        return response()->json($transaksi);
    }

    // Menampilkan form edit transaksi
    public function edit($id)
    {
        
    }

    // Mengupdate data transaksi
    public function update(Request $request, $id)
    {
        // Validasi input
        $validatedData = $request->validate([
            'nama_pelanggan' => 'required',
            'no_hp' => 'required',
            'alamat' => 'required',
            'layanan_id' => 'required',
            'berat' => 'required|numeric',
            'tanggal_pemesanan' => 'required|date',
            'tanggal_selesai' => 'required|date',
            'status_barang' => 'required',
            'status_pembayaran' => 'required',
        ]);

        $transaksi = Transaksi::findOrFail($id);
        $transaksi->update($validatedData);

        return response()->json(['pesan' => "Layanan berhasil ditambahkan"], 200);
    }

    // Menghapus data transaksi
    public function destroy(string $id)
    {
        $data = Transaksi::where('id', $id)->delete();
        return response()->json(
            ['data' => $data],
            200
        );
    }
}
