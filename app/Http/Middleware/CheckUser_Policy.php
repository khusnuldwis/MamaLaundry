<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckUser_Policy
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();

        // Logika untuk memeriksa akses
        if ($user->role_id === 1) {
            return $next($request); // Izinkan akses untuk admin
        }

        // Jika pengguna bukan admin, periksa akses lainnya
        // Misalnya, jika Anda ingin mengizinkan akses untuk pengguna dengan role_id 2 dan 3
        if ($user->role_id === 2 || $user->role_id === 3) {
            return $next($request); // Izinkan akses untuk karyawan
        }

        // Jika tidak memenuhi syarat, batalkan akses
        abort(403, 'Unauthorized action.');
    }
}
