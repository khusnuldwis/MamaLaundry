<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Layanan;
use App\Models\Metode_Layanan;
use App\Models\Transaksi;
use App\Models\Transaksi_Detail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    // Ambil semua transaksi beserta detailnya, diurutkan berdasarkan ID secara menurun
    $orders = Transaksi::with('orderdetail')->orderBy('id', 'desc')->get();

    // Format data untuk respons JSON
    $data = [
        'orders' => $orders
    ];

    return response()->json($data, 200);
}



    /**
     * Show the form for creating a new resource.
     */
    public function create() {}

    /**
     * Store a newly created resource in storage.
     */
    
     
        //  public function store(Request $request)
        //  {
        //      try {
        //          // Validasi data
        //          $request->validate([
        //              'nama_pelanggan' => 'required|string|max:255',
        //              'no_hp' => 'required|string|max:15',
        //              'tanggal_selesai' => 'required|date',
        //              'status_pembayaran' => 'required|string',
        //              'layanan_id[]' => 'required|array',
        //              'berat[]' => 'required|array',
        //              'metode_layanan_id[]' => 'required|array',
        //          ]);
     
        //          // Simpan data transaksi
        //          $order = Transaksi::create([
        //              'nama_pelanggan' => $request->nama_pelanggan,
        //              'no_hp' => $request->no_hp,
        //              'tanggal_selesai' => $request->tanggal_selesai,
        //              'status_pembayaran' => $request->status_pembayaran,
        //          ]);
     
        //          // Simpan detail transaksi
        //          foreach ($request->layanan_id as $index => $layanan_id) {
        //              Transaksi_Detail::create([
        //                  'order_id[]' => $order->id,
        //                  'layanan_id[]' => $layanan_id,
        //                  'berat_item[]' => $request->berat_item[$index],
        //                  'unit[]' => $request->unit[$index] ?? 'kg',
        //                  'metode_layanan_id[]' => $request->metode_layanan_id[$index],
        //              ]);
        //          }
     
        //          return response()->json(['message' => 'Order berhasil disimpan!'], 201);
        //      } catch (\Exception $e) {
        //          return response()->json(['error' => $e->getMessage()], 500);
        //      }
        //  }
//         public function store(Request $request)
// {
//     $data = $request->all();
//     $user_id = $request->user()->id;

//     $transaksi = Transaksi::create([
//         'number' => 'GS' . now()->format('YmdHis') . rand(100, 999),
//         'total_harga' => 0,
//         'status_pembayaran' => $data['status_pembayaran'] ?? 'Belum Dibayar',
//         'nama_pelanggan' => $data['nama_pelanggan'] ?? null,
//         'no_hp' => $data['no_hp'] ?? null,
//         'tanggal_selesai' => $data['tanggal_selesai'] ?? null,
//         'user_id' => $user_id,
//     ]);

//     $total_harga = 0;

//     if (isset($data['layanan_id'])) {
//         foreach ($data['layanan_id'] as $key => $layanan_id) {
//             $layanan = Layanan::find($layanan_id);
//             $berat = $data['berat_item'][$key] ?? 1;
//             $metode_layanan_id = $data['metode_layanan_id'];
//             $metode_layanan = Metode_Layanan::find($metode_layanan_id);

//             if ($layanan && $berat >= 1 && $metode_layanan) {
//                 $harga_layanan = $layanan->harga;
//                 $harga_metode = $metode_layanan->harga;

//                 $orderDetail = Transaksi_Detail::create([
//                     'layanan_id' => $layanan_id,
//                     'transaksi_id' => $transaksi->id,
//                     'metode_layanan_id' => $metode_layanan->id,
//                     'berat' => $berat,
//                     'harga' => $harga_layanan,
//                     'total_harga' => ($berat * $harga_layanan) + $harga_metode,
//                 ]);

//                 $total_harga += $orderDetail->total_harga;
//             }
//         }
//     }

//     $transaksi->total_harga = $total_harga;
//     $transaksi->save();

//     return response()->json(['success' => true, 'message' => 'Transaksi berhasil disimpan!', 'transaksi_id' => $transaksi->id]);
// }
public function store(Request $request)
{
    $validatedData = $request->validate([
        'nama_pelanggan' => 'required|string|max:255',
        'no_hp' => 'required|string|max:15',
        'tanggal_selesai' => 'nullable|date',
        'status_pembayaran' => 'required|in:Belum Dibayar,Lunas',
        'layanan_id' => 'required|array',
        'layanan_id.*' => 'required|exists:layanans,id',
        'berat_item' => 'required|array',
        'berat_item.*' => 'nullable|numeric|min:1',
        'metode_layanan_id' => 'required|exists:metode_layanans,id',
    ]);

    DB::beginTransaction();
    try {
        $user_id = $request->user()->id;

        // Simpan transaksi
        $transaksi = Transaksi::create([
            'number' => 'GS' . now()->format('YmdHis') . rand(100, 999),
            'total_harga' => 0,
            'status_pembayaran' => $validatedData['status_pembayaran'],
            'nama_pelanggan' => $validatedData['nama_pelanggan'],
            'no_hp' => $validatedData['no_hp'],
            'tanggal_selesai' => $validatedData['tanggal_selesai'],
            'user_id' => $user_id,
        ]);

        $total_harga = 0;

        // Simpan detail transaksi
        foreach ($validatedData['layanan_id'] as $key => $layanan_id) {
            $layanan = Layanan::findOrFail($layanan_id);
            $berat = $validatedData['berat_item'][$key];
            $metode_layanan = Metode_Layanan::findOrFail($validatedData['metode_layanan_id']);

            $harga_layanan = $layanan->harga;
            $harga_metode = $metode_layanan->harga;

            $total_harga_detail = ($berat * $harga_layanan) + $harga_metode;

            Transaksi_Detail::create([
                'transaksi_id' => $transaksi->id,
                'layanan_id' => $layanan_id,
                'metode_layanan_id' => $metode_layanan->id,
                'berat' => $berat,
                'harga' => $harga_layanan,
                'total_harga' => $total_harga_detail,
            ]);

            $total_harga += $total_harga_detail;
        }

        // Update total harga transaksi
        $transaksi->update(['total_harga' => $total_harga]);

        DB::commit();

        return response()->json(['message' => 'Transaksi berhasil disimpan!']);
    } catch (\Exception $e) {
        DB::rollBack();
        return response()->json(['error' => $e->getMessage()], 500);
    }
}


     

     
    /**
     * Display the specified resource.
     */
    public function show($id)
{
    // Ambil data transaksi berdasarkan ID
    $order = Transaksi::with('orderdetail')->find($id);

    // Jika transaksi tidak ditemukan, kembalikan respons error
    if (!$order) {
        return response()->json([
            'error' => 'Transaksi tidak ditemukan',
            'message' => 'Transaksi dengan ID ' . $id . ' tidak ditemukan.'
        ], 404);
    }

    // Format data untuk respons JSON
    $response = [
        'order' => $order,
        'order_details' => $order->orderdetail
    ];

    return response()->json($response, 200);
}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {try {
        $data = $request->all();
        // dd($data);
        $this->creatOrder($request);


        // return $this->atomic(function () use ($data, $id) {
        $update = Transaksi::find($id)->update($data);

        return response()->json(['pesan' => "Transaksi berhasil diubah"], 200);
        // });
    } catch (\Throwable $th) {
        return response()->json(['pesan' => "Transaksi gagal diubah"], 500);
    }}
    
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
