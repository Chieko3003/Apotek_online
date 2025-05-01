<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    public function handle(Request $request, Closure $next, $checkrole)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        if(Auth::user()->role !== $checkrole){
            return abort(403, 'Unthorized Action, Login First!');
        }

        return $next($request);
    }
}
// Jika Anda ingin menambahkan pesan kesalahan khusus, Anda dapat melakukannya di sini
//         return redirect()->route('login')->with('gagal', 'Anda tidak memiliki akses ke halaman ini.');

