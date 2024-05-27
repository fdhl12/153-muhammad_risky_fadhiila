<?php 
// app/Http/AppMiddleware.php

namespace App\Http;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AppMiddleware
{
    public function __invoke(Request $request, Closure $next)
    {
        // Cek apakah pengguna sudah terautentikasi
        if (Auth::check()) {
            // Cek peran pengguna
            if (Auth::user()->role === 'admin') {
                // Jika pengguna memiliki peran 'admin', arahkan ke rute admin.dashboard
                return redirect()->route('admin.dashboard');
            }
        }

        // Jika pengguna bukan admin atau belum terautentikasi, lanjutkan ke middleware berikutnya
        return $next($request);
    }
}
