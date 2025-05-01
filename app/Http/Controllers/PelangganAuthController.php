<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PelangganAuthController extends Controller
{
    public function showRegisterform()
    {
        return view('frontend.newauth.register');
    }

    public function newshowLogin(Request $request)
    {
        $request->validate([
            'nama_pelanggan' => 'required',
            'email' => 'required|',
            'kata_kunci' => 'required|max:35',
            'no_telp' => 'required',
            'alamat1' => 'required',
            'kota1' => 'required',
            'propinsi1' => 'required',
            'kodepos1' => 'required',
        ]);

        Pelanggan::create([
            'nama_pelanggan' => $request->nama_pelanggan,
            'email' => $request->email,
            'kata_kunci' => bcrypt($request->kata_kunci),
            'no_telp' => $request->no_telp,
            'alamat1' => $request->alamat1,
            'kota1' => $request->kota1,
            'propinsi1' => $request->propinsi1,
            'kodepos1' => $request->kodepos1,
        ]);
         return redirect()->route('newlogin.show')->with('success', 'Registrasi berhasil!');
    }
    public function logout(Request $request)
    {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('newlogin.show')->with('success', 'Logout berhasil!');
    }
}
