<?php

use App\Events\messageCreated;
use App\Http\Controllers\admin\KasirController;
use App\Http\Controllers\admin\LandingPage\ImageCarouselController;
use App\Http\Controllers\Admin\LaporanController;
use App\Http\Controllers\admin\MakananController;
use App\Http\Controllers\admin\MinumanController;
use App\Http\Controllers\admin\PelangganController;
use App\Http\Controllers\Admin\PesananController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\MejaController;
use App\Http\Controllers\DaftarMenuController;
use App\Http\Controllers\KeranjangController;
use App\Http\Controllers\PemesananController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('user.home');
});

// ==== Admin ==== //
Route::group(['middleware' => ['auth', 'role:1']], function () {
    Route::resource('manajemen/image-carousel',ImageCarouselController::class);
    Route::resource('manajemen/akun/pelanggan', PelangganController::class);
    Route::resource('manajemen/akun/kasir', KasirController::class);
});
// ==== ==== //

// ==== Admin & Kasir ==== //
Route::group(['middleware' => ['auth', 'role:1,2']], function () {
    Route::resource('manajemen/menu/makanan', MakananController::class);
    Route::resource('manajemen/menu/minuman', MinumanController::class);
    Route::resource('manajemen/pesanan', PesananController::class);
    Route::resource('manajemen/meja', MejaController::class);
    Route::get('manajemen/laporan',[LaporanController::class, 'index'])->name('admin.laporan');
});


// ==== ==== //


// ==== User ===== //

Route::get('/daftar-menu', [DaftarMenuController::class, 'index'])->name('user.daftarmenu');
Route::get('/daftar-menu/{slug}', [DaftarMenuController::class, 'detailMenu'])->name('user.detailMenu');

Route::get('keranjang', [KeranjangController::class, 'index'])->name('user.Keranjang');
Route::post('keranjang/{id}', [KeranjangController::class, 'store'])->name('user.Keranjang.store');
Route::delete('keranjang/{id}', [KeranjangController::class, 'destroy'])->name('user.Keranjang.destroy');
Route::delete('keranjang', [KeranjangController::class, 'destroyAll'])->name('user.Keranjang.destroyAll');

Route::get('pesanan', [PemesananController::class, 'index'])->name('user.pesanan');
Route::post('pesanan', [PemesananController::class, 'store'])->name('user.pesanan.store');
Route::get('pesanan/{id}', [PemesananController::class, 'show'])->name('user.pesanan.show');
// ==== ==== //

Route::get('/checkSlug', [MakananController::class, 'checkSlug']);


Route::post('notif', [NotificationController::class, 'index']);


require __DIR__.'/auth.php';
