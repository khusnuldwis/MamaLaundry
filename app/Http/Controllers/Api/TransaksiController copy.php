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
        $transaksis = Transaksi::with('details')->get();
        return response()->json($transaksis, 200);
    }

    // Menampilkan form untuk membuat transaksi baru
    public function create()
    {
        return view('transaksi.create');
    }

    // Menyimpan data transaksi baru ke database
    public function store(Request $request)
   
       {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'no_hp' => 'required|string|max:15',
            'services' => 'required|array|min:1', // Pastikan layanan dipilih
            'services.*.layanan_id' => 'required|exists:layanans,id', // Pastikan ID layanan ada
            'services.*.quantity' => 'required|integer|min:1', // Pastikan quantity valid
        ]);
    
        // Jika validasi gagal, kembalikan error
        if ($validator->fails()) {
            Log::error('Validation failed: ', $validator->errors()->toArray());
            return response()->json(['success' => false, 'message' => $validator->errors()->first()]);
        }
    
        DB::beginTransaction();
        try {
            // Simpan data transaksi
            $transaksi = Transaksi::create([
                'nama' => $request->nama,
                'alamat' => $request->alamat,
                'no_hp' => $request->no_hp,
            ]);
    
            // Simpan layanan yang dipilih dengan quantity ke tabel pivot
            foreach ($request->services as $service) {
                // Pastikan ID layanan dan quantity valid
                $transaksi->layanans()->attach($service['layanan_id'], ['quantity' => $service['quantity']]);
            }
    
            // Commit transaksi jika tidak ada error
            DB::commit();
    
            return response()->json(['success' => true, 'message' => 'Transaksi berhasil disimpan!']);
        } catch (\Exception $e) {
            // Rollback jika terjadi error
            DB::rollBack();
            Log::error("Error during transaction: " . $e->getMessage());
            return response()->json(['success' => false, 'message' => 'Terjadi kesalahan saat menyimpan data.']);
        }
    }
    

    // Menampilkan detail transaksi
    public function show($id)
    {
        $transaksi = Transaksi::with('details')->findOrFail($id);
        return view('transaksi.show', compact('transaksi'));
    }

    // Menampilkan form edit transaksi
    public function edit($id)
    {
        $transaksi = Transaksi::with('details')->findOrFail($id);
        return view('transaksi.edit', compact('transaksi'));
    }

    // Mengupdate data transaksi
    public function update(Request $request, $id)
    {
        // Validasi input
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string',
            'no_hp' => 'required|string',
        ]);

        $transaksi = Transaksi::findOrFail($id);
        $transaksi->update($validated);

        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil diperbarui!');
    }

    // Menghapus data transaksi
    public function destroy($id)
    {
        $transaksi = Transaksi::findOrFail($id);
        $transaksi->delete();

        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil dihapus!');
    }
}
