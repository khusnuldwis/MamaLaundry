<?php

namespace App\Traits;

use App\Models\Transaksi;
use Carbon\Carbon;

trait HandlesTransactions
{
    public function filterTransactions($user, $status, $range)
     // Ambil pengguna yang sedang login{}
     {
     $user = auth()->user();
        
     // Mulai query untuk mengambil data transaksi
     $transaksiQuery = Transaksi::query();
 
     // Jika pengguna bukan admin, filter data transaksi berdasarkan user_id
     if ($user->role !== 'admin') {
         $transaksiQuery->where('user_id', $user->id);
     }
 
     // Filter data transaksi berdasarkan status jika ada
     $status = $request->input('status', 'semua');
     if ($status !== 'semua') {
         $transaksiQuery->where('status_layanan', $status);
     }
 
     // Filter data transaksi berdasarkan range waktu jika ada
     $range = $request->input('range', 'semua');
     if ($range !== 'semua') {
         switch ($range) {
             case 'hari':
                 $transaksiQuery->whereDate('created_at', Carbon::today());
                 break;
             case 'minggu':
                 $transaksiQuery->whereBetween('created_at', [
                     Carbon::now()->startOfWeek(),
                     Carbon::now()->endOfWeek()
                 ]);
                 break;
             case 'bulan':
                 $transaksiQuery->whereMonth('created_at', Carbon::now()->month)
                                ->whereYear('created_at', Carbon::now()->year);
                 break;
         }
     }
 
     // Ambil data transaksi berdasarkan query yang telah difilter
     $order = $transaksiQuery->orderBy('created_at', 'desc')->get();
 
     // Hitung total harga semua transaksi yang diambil
     $totalHarga = $order->sum('total_harga');
 
     // Kirim data ke view
     return view('order.index', compact('order', 'totalHarga', 'status', 'range'));
 }

    public function calculateTotalPrice($transactions)
    {
        return $transactions->sum('total_harga');
    
}
