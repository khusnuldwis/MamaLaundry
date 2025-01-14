<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        
        return view('home');
    }
    public function dashboard()
    {
        // Data transaksi hari ini
        $totalTransaksiHariIni = Transaksi::whereDate('created_at', Carbon::today())->count();
        $totalPendapatanHariIni = Transaksi::whereDate('created_at', Carbon::today())->sum('total_harga');
    
        // Data grafik pendapatan (7 hari terakhir)
        $transaksiPerHari = Transaksi::selectRaw('DATE(created_at) as tanggal, SUM(total_harga) as total_pendapatan')
            ->groupBy('tanggal')
            ->orderBy('tanggal', 'asc')
            ->whereDate('created_at', '>=', Carbon::today()->subDays(6))
            ->get();
    
        $labels = $transaksiPerHari->pluck('tanggal')->map(function ($tanggal) {
            return Carbon::parse($tanggal)->format('d M');
        });
    
        $data = $transaksiPerHari->pluck('total_pendapatan');
        $user = auth()->user();
    
        // Query default
        $transaksiQuery = Transaksi::query();
    
        // Jika pengguna bukan admin, hanya tampilkan data miliknya
        if ($user->role !== 'admin') {
            $transaksiQuery->where('user_id', $user->id);
        }
    
        // Ambil data berdasarkan query
        $transaksi = $transaksiQuery->orderBy('created_at', 'desc')->get();
    

        // Kirim semua data ke view
        return view('home', compact(
            'totalTransaksiHariIni',
            'totalPendapatanHariIni',
            'labels',
            'data','transaksi','user'
        ));
    }
   
public function getTransaksiHariIni()
{
    // Menghitung total transaksi hari ini
    $transaksi = Transaksi::all();

    $totalTransaksiHariIni = Transaksi::whereDate('created_at', Carbon::today())->count();
    $totalPendapatanHariIni = Transaksi::whereDate('created_at', Carbon::today())->sum('total_harga');

    // Mengirimkan data ke view
    return view('home', compact('totalTransaksiHariIni','totalPendapatanHariIni','transaksi'));
}
}
