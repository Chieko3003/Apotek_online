<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Jabatan
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next, $role)
    {
        // Periksa apakah pengguna sudah login
        if (!Auth::check()) {
            return redirect()->route('login')->with('gagal', 'Anda harus login terlebih dahulu.');
        }

        // Periksa apakah jabatan pengguna sesuai
        $user = Auth::user();
        if ($user->jabatan !== $role) {
            return redirect()->route('login')->with('gagal', 'Anda tidak memiliki akses ke halaman ini.');
        }

        return $next($request);
    }
}