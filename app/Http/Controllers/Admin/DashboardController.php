<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Meja;
use App\Models\Menu;
use App\Models\Pesanan;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $pelanggan = User::where('role', '0')->count();
        $kasir = User::where('role', '2')->count();
        $meja = Meja::count();
        $pesanan = Pesanan::count();
        $makanan = Menu::where('kategori_id', '1')->count();
        $minuman = Menu::where('kategori_id', '2')->count();
        $pendapatan = Pesanan::where('status_pesanan_id', '4')->sum('total_harga_pesanan');
        $title = 'Dashboard';
        // dd($pendapatan);
        return view('admin.index', compact('pelanggan', 'kasir', 'meja', 'pesanan', 'makanan', 'minuman', 'pendapatan', 'title'));
    }
}
