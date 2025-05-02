<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DetailPembelianController;
use App\Http\Controllers\StoreDetailController;
use App\Http\Controllers\PembelianController;
use App\Http\Controllers\DistributorController;
use App\Http\Controllers\JenisObatController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HomeLoginController;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\NewAuthController;
use App\Http\Controllers\PelangganAuthController;
// use App\Http\Controllers\KeranjangController;




// Pembelian
Route::get('/detailpembelian', [DetailPembelianController::class, 'index'])->name('detailpembelian.index');
// Route::post('/detailpembelian', [DetailPembelianController::class, 'store']);
// Route::get('/detailpembelian/{id}', [DetailPembelianController::class, 'show']);

/*
// Home
Route::get('/', [HomeController::class, 'index'])->name('home');
*/

Route::get('/homelogin', [HomeLoginController::class, 'index'])->name('homelogin.index');
Route::get('/storelogin', [StoreLoginController::class, 'index'])->name('storelogin.index');

// Auth - Login
Route::get('/login', [AuthController::class, 'Login'])->name('login');
Route::post('/login', [AuthController::class, 'submitLogin'])->name('login.submit');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/registrasi', [AuthController::class, 'Registrasi'])->name('registrasi');
Route::post('/registrasi', [AuthController::class, 'submitRegistrasi'])->name('registrasi.submit');


// Auth - Register
// Route::resource('home', HomeController::class);
Route::get('/Home', [HomeController::class, 'index'])->name('Home.index');
Route::get('/Store', [StoreController::class, 'index', 'show' ])->name('Store.index');
Route::get('/storedetail', [StoreDetailController::class, 'show'])->name('StoreDetail.show');
// Route::get('/dashboard', [DashboardController::class, 'showDashboard'])->name('dashboard');
// Route::get('/admin', [AdminController::class, 'dashboard'])->name('admin.dashboard');
// Route::get('/register', [NewAuthController::class, 'newshowRegistrationForm'])->name('newregister');
Route::get('/register', [PelangganAuthController ::class, 'showRegisterform'])->name('newregister');
Route::post('/register/submit', [PelangganAuthController ::class, 'newRegister'])->name('newregister.submit');
Route::post('/newlogout', [PelangganAuthController::class, 'newlogout'])->name('newlogout');
Route::get('/newlogin', [PelangganAuthController::class, 'newshowLogin'])->name('newlogin.show');
Route::post('/newlogin/submit', [PelangganAuthController::class, 'newsubmitLogin'])->name('newlogin.submit');
Route::get('/', [PembelianController::class, 'index']);
Route::resource('pembelian', PembelianController::class);
// Route::resource('keranjang', KeranjangController::class);
Route::resource('distributor', DistributorController::class);
Route::resource('obat', ObatController::class);
Route::resource('jenisobat', JenisObatController::class);
// Route::resource('register', RegisterController::class);

// Admin & Role-based Middleware Routes
Route::middleware(['auth'])->group(function () {
    Route::get('/admin', function () {
        return view('admin.index');
    })->name('Admin.index');

    route::resource('Obat', ObatController::class);
    Route::resource('jenis_obat', JenisObatController::class);

    Route::get('/metode_bayar', function () {
        return view('metode_bayar.index');
    })->name('MetodeBayar.index');

    Route::get('/apoteker', function () {
        return view('apoteker.index');
    })->name('Apoteker.index');

    Route::get('/karyawan', function () {
        return view('karyawan.index');
    })->name('Karyawan.index');

    Route::get('/kasir', function () {
        return view('kasir.index');
    })->name('Kasir.index');

    Route::get('/pemilik', function () {
        return view('pemilik.index');
    })->name('Pemilik.index');
});
