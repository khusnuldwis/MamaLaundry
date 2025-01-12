<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Durasi;
use App\Models\Layanan;
use App\Models\Metode_Layanan;
use App\Models\Transaksi;
use App\Models\Transaksi_Detail;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use PhpParser\Node\Stmt\TraitUse;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // public function index()
    // {
    //     $order = Transaksi::orderBy('id', 'desc')->get();
    //     $orderdetail = Transaksi_Detail::orderBy('id', 'desc')->get();


    //     return view('order.index', compact('order', 'orderdetail'));
    // }
    public function index(Request $request)
    {
        // Ambil input dari request
        $status = $request->input('status', 'semua'); // Default 'semua'
        $range = $request->input('range', 'semua');   // Default 'hari'
    
        // Mulai query
        $ordersQuery = Transaksi::query();
    
        // Tambahkan filter status pengerjaan
        if ($status !== 'semua') { 
            $ordersQuery->where('status_pengerjaan', $status);
        }
    
        // Tambahkan filter berdasarkan range waktu
        if ($range !== 'semua') {
            switch ($range) {
                case 'hari':
                    $ordersQuery->whereDate('created_at', Carbon::today());
                    break;
                case 'minggu':
                    $ordersQuery->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()]);
                    break;
                case 'bulan':
                    $ordersQuery->whereMonth('created_at', Carbon::now()->month)
                                ->whereYear('created_at', Carbon::now()->year);
                    break;
            }
        }
    
        // Eksekusi query
        $order = $ordersQuery->orderBy('id', 'desc')->get();
    
        // Hitung total harga
        $totalHarga = $order->sum('total_harga');
    
        // Kirim data ke view
        return view('order.index', compact('order', 'totalHarga', 'status', 'range'));
    }
    
    
    

    
    




    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $jenisLayananMapping = [
        1 => 'Reguler',
        2 => 'Kilat',
        3 => 'Express',
        ];
        $layanan = Layanan::orderBy('nama_layanan', 'asc')->get();
        $metode_layanan = Metode_Layanan::orderBy('nama_metode_layanan', 'asc')->get();
        $durasi = Durasi::orderBy('nama', 'asc')->get();

        return view('order.create', compact('layanan','metode_layanan','jenisLayananMapping','durasi'));
    }

    /**
     * Store a newly created resource in storage.
     */

     public function store(Request $request)
     {
         $data = $request->all();
         $user_id = $request->user()->id;
     
         $transaksi = Transaksi::create([
             'kode_transaksi' => 'GS' . substr(uniqid(), -5),
             'total_harga' => 0,
             'status_pembayaran' => $data['status_pembayaran'] ?? 'Belum Dibayar',
             'status_pengerjaan' => $data['status_pengerjaan'] ?? 'Masuk',
             'nama_pelanggan' => $data['nama_pelanggan'] ?? null,
             'no_hp' => $data['no_hp'] ?? null,
             'user_id' => $user_id,
         ]);
     
         $total_harga = 0;
$sub_total = 0;

if (!empty($data['layanan_id'])) {
    foreach ($data['layanan_id'] as $key => $layanan_id) {
        // Ambil data layanan, metode layanan, dan durasi
        $layanan = Layanan::find($layanan_id);
        $berat = $data['berat_item'][$key] ?? 1; // Default berat = 1 jika tidak ada input
        $metode_layanan_id = $data['metode_layanan_id'];
        $metode_layanan = Metode_Layanan::find($metode_layanan_id);
        $durasi_id = $data['durasi_id'];
        $durasi = Durasi::find($durasi_id);

        // Validasi semua data ada dan berat valid
        if ($layanan && $berat >= 1 && $metode_layanan && $durasi) {
            $harga_layanan = $layanan->harga;
            $harga_metode = $metode_layanan->harga;
            $harga_durasi = $durasi->harga;

            // Hitung subtotal dan total harga
            $sub_total = $berat * $harga_layanan;
            $total_item_harga = $sub_total + $harga_metode + $harga_durasi;

            // Buat detail transaksi
            $orderDetail = Transaksi_Detail::create([
                'layanan_id' => $layanan_id,
                'transaksi_id' => $transaksi->id,
                'metode_layanan_id' => $metode_layanan->id,
                'durasi_id' => $durasi->id,
                'berat' => $berat,
                'harga' => $harga_layanan,
                'sub_total' => $sub_total,
                'total_harga' => $total_item_harga
            ]);

            // Tambahkan ke total harga transaksi
            $total_harga += $orderDetail->total_harga;
        }
    }
}

// Update total harga transaksi
$transaksi->total_harga = $total_harga;
$transaksi->save();

     
return redirect()->route('order.pay', $transaksi->id)->with('success', 'Transaksi berhasil dibuat. Silakan lakukan pembayaran.');
}
     
    /**
     * Display the specified resource.
     */
//     public function show(string $id)
// {
//     $jenisLayananMapping = [
//         1 => 'Reguler',
//         2 => 'Kilat',
//         3 => 'Express',
//         ];
//         $satuan = [
//             1 => 'Kg',
//             2 => 'Pcs',
//             ];
//         $layanan = Layanan::orderBy('nama_layanan', 'asc')->get();
//         $metode_layanan = Metode_Layanan::orderBy('nama_metode_layanan', 'asc')->get();
//         $durasi = Durasi ::orderBy('nama', 'asc')->get();
//     $order = Transaksi::find($id);
//     $orderdetail = $order->orderdetail;
    
//     // Kirim data transaksi dan detail transaksi ke view
//     return view('order.show', compact('order', 'orderdetail'));
// }


    public function show(string $id)
    {
        $jenisLayananMapping = [
            1 => 'Reguler',
            2 => 'Kilat',
            3 => 'Express',
            ];
            $satuan = [
                1 => 'Kg',
                2 => 'Pcs',
                ];
            $layanan = Layanan::orderBy('nama_layanan', 'asc')->get();
            $metode_layanan = Metode_Layanan::orderBy('nama_metode_layanan', 'asc')->get();
            $durasi = Durasi ::orderBy('nama', 'asc')->get();
        $order = Transaksi::find($id);
        $orderdetail = $order->orderdetail;
        $bayar = session('bayar', 0); 
        // dd($orderdetail);
        return view('order.nota', compact('order', 'orderdetail','layanan','metode_layanan','jenisLayananMapping','satuan','bayar'));
    }
    public function pay($id)
    {
        $order = Transaksi::findOrFail($id); // Ambil data transaksi berdasarkan ID
        return view('order.pay', compact('order'));
    }
    
    public function processPayment(Request $request, $id) 
{
    $order = Transaksi::findOrFail($id);

    // Validasi input pembayaran
    $validated = $request->validate([
        'bayar' => 'required|numeric|min:0',
    ]);

    // Hitung kembalian
    $kembalian = $validated['bayar'] - $order->total;

    // Update status pembayaran menjadi 'Lunas'
    $order->update([
        'status_pembayaran' => 'Lunas',
    ]);

    // Simpan 'bayar' dalam session
    $request->session()->flash('bayar', $validated['bayar']);
    
    return redirect()->route('order.show', ['order' => $order->id])->with('success', 'Pembayaran berhasil dilakukan.');
}

    
    /**
     * Show the form for editing the specified resource.
     */
  
    public function edit(string $id)
    {
        
        $data = Transaksi::find($id);
        $jenisLayananMapping = [
            1 => 'Reguler',
            2 => 'Kilat',
            3 => 'Express',
            ];
            $layanan = Layanan::orderBy('nama_layanan', 'asc')->get();
            $metode_layanan = Metode_Layanan::orderBy('nama_metode_layanan', 'asc')->get();
            $status = $data->status_pengerjaan; // Ambil status pengerjaan transaksi yang sedang diedit

        $datas = $data->orderdetail;
        return view('order.edit', compact('data', 'datas','jenisLayananMapping','layanan','metode_layanan','status'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateStatus(Request $request, $id)
{
    $request->validate([
        'status_pengerjaan' => 'required|string',
        'status_pembayaran' => 'required|string',
    ]);

    $transaksi = Transaksi::findOrFail($id);
    $transaksi->status_pengerjaan = $request->status_pengerjaan;
    $transaksi->status_pembayaran = $request->status_pembayaran;
    $transaksi->save();

    // Log perubahan status
    \Log::info('Status updated for transaksi ID: ' . $id);

    return redirect()->route('order.index')->with('success', 'Lakukan Pembayaran Terlebih Dahulu');
}
    public function update(Request $request, $id)
{
    try {
        // Validasi hanya untuk status_pengerjaan dan status_pembayaran
        $validated = $request->validate([
            'status_pengerjaan' => 'required|in:masuk,proses,selesai',
            'status_pembayaran' => 'required|in:belum_dibayar,sudah_dibayar',
        ]);

        // Cari transaksi berdasarkan ID
        $transaksi = Transaksi::findOrFail($id);

        // Update hanya status
        $transaksi->update($validated);

        return response()->json([
            'status' => true,
            'message' => 'Status transaksi berhasil diperbarui!',
        ]);
    } catch (\Throwable $th) {
        return response()->json([
            'status' => false,
            'message' => 'Gagal memperbarui status transaksi!',
        ]);
    }
}

    

    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            \Log::info("Memulai proses penghapusan untuk ID: $id");
    
            $transaksi = Transaksi::find($id);
            if (!$transaksi) {
                \Log::warning("Data dengan ID $id tidak ditemukan di database");
                return response()->json([
                    'status' => false,
                    'message' => 'Data tidak ditemukan!',
                ]);
            }
    
            \Log::info("Data ditemukan, melakukan penghapusan...");
            $transaksi->delete();
    
            \Log::info("Data dengan ID $id berhasil dihapus");
            return response()->json([
                'status' => true,
                'message' => 'Data Berhasil Dihapus!',
            ]);
        } catch (\Throwable $th) {
            \Log::error("Error saat menghapus data: " . $th->getMessage());
            return response()->json([
                'status' => false,
                'message' => 'Data Gagal Dihapus!',
            ]);
        }
    }
    
   
    
}
