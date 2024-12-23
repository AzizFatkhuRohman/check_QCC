<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role)
    {
        // Periksa apakah user sudah login dan memiliki role yang sesuai
        if (!auth()->check()) {
            return redirect()->route('login'); // Redirect ke login jika belum login
        }

        // Ambil role pengguna
        $userRole = auth()->user()->role;

        // Bandingkan role pengguna dengan role yang diberikan
        if ($userRole != $role) {
            // Jika role tidak cocok, tampilkan pesan error atau redirect
            abort(403, 'Unauthorized action.');
        }

        // Lanjutkan request jika role cocok
        return $next($request);
    }
}
