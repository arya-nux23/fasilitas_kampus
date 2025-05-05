<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class MahasiswaMiddleware
{
    public function handle($request, Closure $next)
    {
        if (Auth::guard('mahasiswa')->check()) {
            return $next($request);
        }

        return redirect('/login')->with('error', 'Kamu harus login sebagai mahasiswa.');
    }
}
