<?php

namespace App\Http\Controllers;

use App\Models\Keranjang;
use App\Models\Meja;
use App\Models\Menu;
use Illuminate\Http\Request;

class KeranjangController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $keranjang = Keranjang::where('user_id', auth()->user()->id)->get();
        $meja = Meja::All();
        return view('user.keranjang', compact('keranjang', 'meja'));
    }

    public function store(Request $request, $id)
    {

        $menuId = Menu::findOrFail($id);
        $masukKeranjang = $request->validate([
            'qty' => 'required',
        ]);

        $masukKeranjang['user_id'] = auth()->user()->id;
        $masukKeranjang['menu_id'] = $id;
        $masukKeranjang['total_harga'] = $menuId->harga * $request->qty;

        // dd($masukKeranjang);

        $keranjang = Keranjang::where('user_id', auth()->user()->id)->where('menu_id', $id)->first();
        if ($keranjang) {
            $tambahqty['qty'] = $keranjang->qty + $masukKeranjang['qty'];
            $tambahqty['total_harga'] = $keranjang->total_harga + $masukKeranjang['total_harga'];
            $keranjang->update($tambahqty);
        } else {
            Keranjang::create($masukKeranjang);
        }
        return redirect()->back()->with('success', 'Data berhasil Di Tambahkan');
    }

    public function destroy($id)
    {
        Keranjang::destroy($id);
        return redirect()->back()->with('success', 'Data berhasil Di Hapus');
    }

    public function destroyAll()
    {
        Keranjang::where('user_id', auth()->user()->id)->delete();
        return redirect()->back()->with('success', 'Data berhasil Di Hapus');
    }
}
