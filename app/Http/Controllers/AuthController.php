<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Menampilkan halaman registrasi.
     */
    public function Registrasi()
    {
        // return view('login.index');
        
    }

    /**
     * Menangani proses registrasi.
     */
    public function submitRegistrasi(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->jabatan = 'pemilik'; // Default jabatan untuk registrasi
        $user->save();

        return redirect()->route('login')->with('sukses', 'Registration successful as owner. Please log in.');
    }

    /**
     * Menampilkan halaman login.
     */
    public function Login()
    {
        return view('login.index');
        // $jabatan = Auth::user()->jabatan;
        // dd($jabatan); // debug
    }

    /**
     * Menangani proses login.
     */
    public function submitLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $data = $request->only('email', 'password');
        if (Auth::attempt($data)) {
            $request->session()->regenerate();

            $user = Auth::user(); // Dapatkan user yang sedang login

            // Arahkan berdasarkan jabatan
            if ($user->jabatan === 'admin') {
                return redirect()->route('Admin.index');
            } elseif ($user->jabatan === 'apoteker') {
                return redirect()->route('Apoteker.index');
            } elseif ($user->jabatan === 'karyawan') {
                return redirect()->route('Karyawan.index');
            } elseif ($user->jabatan === 'kasir') {
                return redirect()->route('Kasir.index');
            } elseif ($user->jabatan === 'pemilik') {
                return redirect()->route('Pemilik.index');
            } else {
                return redirect()->route('login')->with('gagal', 'Unauthorized access.');
            }
        } else {
            return redirect()->back()->with('gagal', 'Email or Password is incorrect.');
        }
    }

    /**
     * Menangani proses logout.
     */
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

    /**
     * Menampilkan halaman profil pengguna.
     */
    public function profile()
    {
        $user = Auth::user(); // Mengambil data pengguna yang sedang login
        return view('profile.index', compact('user'));
    }
}