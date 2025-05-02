<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pelanggan;

class PelangganAuthController extends Controller
{

    public function showRegisterform()
    {
        return view('frontend.authpelanggan.newauth.register');
    }

    public function newRegister(Request $request)
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

    public function newshowLogin()
    {
        return view('frontend.authpelanggan.newauth.login');
    }


    public function newsubmitLogin(Request $request)
    {
        $request->validate([
            'nama_pelanggan' => 'required',
            'email' => 'required|',
            'kata_kunci' => 'required|max:35'
        ]);

        // dd($request->all());
        $pelanggan = Pelanggan::where('nama_pelanggan',$request->nama_pelanggan)->orWhere('email',$request->email)->orWhere('kata_kunci',$request->kata_kunci)->first();
        if ($pelanggan) {
            return redirect()->route('homelogin.index')->with('success', 'Login berhasil!');
        }

        return redirect()->back()->withErrors(['email' => 'Email atau kata kunci salah.']);
    }
    
    public function logout(Request $request)
    {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('newlogin.show')->with('success', 'Logout berhasil!');
    }
}
