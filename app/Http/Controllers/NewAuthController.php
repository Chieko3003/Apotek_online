<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class NewAuthController extends Controller
{
    public function newshowRegistration()
    {
        return view('newregister');
    }

       
    public function newsubmitRegistration(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();
        // dd('$user');
        return redirect()->route('newlogin.show')->with('success', 'Registrasi berhasil!');
    }

    public function newshowLogin()
    {
        return view('frontend.authpelanggan.newauth.login');
    }


    public function newsubmitLogin(Request $request)
    {
        $data = $request->only('email', 'password');

        if (auth()->attempt($data)) {
            $request->session()->regenerate();
            return redirect()->route('homelogin')->with('success', 'Login berhasil!');
        } else {
            return redirect()->back()->with('error', 'Username atau password salah!');
        }
    }

    public function newshowRegistrationForm()
    {
        return view('frontend.authpelanggan.newauth.register'); // pastikan view ini ada juga ya
    }

    public function Newlogout(Request $request)
    {
        Auth::Newlogout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('newlogin.show')->with('success', 'Logout berhasil!');
    }

    // public function newshowLoginForm()
    // {
    //     return view('frontend.authpelanggan.newauth.login'); // pastikan view ini ada juga ya
    // }
}
