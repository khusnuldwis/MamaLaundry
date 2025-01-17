<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use App\Models\Transaksi;
use App\Models\User;
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
    
    public function dashboard(Request $request)
    {
        $user = auth()->user();
    
        // Start transaction query
        $transaksiQuery = Transaksi::query();
    
        
        $cabang = $request->input('cabang', 'semua');
        if ($cabang !== 'semua') {
            $transaksiQuery->whereHas('user', fn($query) => $query->where('cabang', $cabang));
        }
    
        $transaksi = $transaksiQuery->with('user')->orderBy('created_at', 'desc')->get();
    
        return view('home', [
            'user' => $user,
            'transaksi' => $transaksi,
            'totalTransaksiHariIni' => Transaksi::whereDate('created_at', Carbon::today())->count(),
            'totalPendapatanHariIni' => Transaksi::whereDate('created_at', Carbon::today())->sum('total_harga'),
            'totalLayanan' => Layanan::count(),
            'laundryBelumDiambil' => Transaksi::where('status_layanan', 'belum_diambil')->count(),
            'cabang' => $cabang,
        ]);
    }
    
    public function getByRole(Request $request)
    {
        try {
            $role = $request->input('role');
    
            // Validasi jika role kosong
            if (!$role) {
                return response()->json(['error' => 'Role is required'], 400);
            }
    
            // Ambil data transaksi berdasarkan role
            $transaksi = Transaksi::whereHas('user', function ($query) use ($role) {
                $query->where('role', $role);
            })->get();
    
            // Kembalikan data dalam format JSON
            return response()->json(['data' => $transaksi], 200);
    
        } catch (\Exception $e) {
            // Log error dan kembalikan respons error
            \Log::error('Error in getByRole: ' . $e->getMessage());
            return response()->json(['error' => 'Internal Server Error'], 500);
        }
    }
    
    
    public function getTransaksiHariIni()
    {
        // Menghitung total transaksi hari ini
        $transaksi = Transaksi::all();

        $totalTransaksiHariIni = Transaksi::whereDate('created_at', Carbon::today())->count();
        $totalPendapatanHariIni = Transaksi::whereDate('created_at', Carbon::today())->sum('total_harga');

        // Mengirimkan data ke view
        return view('home', compact('totalTransaksiHariIni', 'totalPendapatanHariIni', 'transaksi'));
    }
}
