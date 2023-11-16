<?php

namespace App\Http\Controllers;

use App\Models\DetailPesanan;
use App\Models\Keranjang;
use App\Models\Pesanan;
use Illuminate\Http\Request;

class PemesananController extends Controller
{
    public function index()
    {
        $pesanan = Pesanan::where('user_id', auth()->user()->id)->with("detailPesanan")->get();
        // dd($pesanan)
        return view('user.pesanan', compact('pesanan'));
    }

    public function show($id)
    {
        $pesanan = Pesanan::findOrFail($id);
        $detail = DetailPesanan::where('pesanan_id', $id)->get();
        if ($pesanan->user_id == auth()->user()->id) {
            return view('user.detailPesanan', compact('detail'));
        } else {
            return redirect()->back();
        }


    }

    public function store(Request $request)
    {

        // dd($request);
        $inputpesanan['user_id'] = auth()->user()->id;
        $inputpesanan['kode_pesanan'] = 'GKG' . $request->meja_id . auth()->user()->id . date("mdhi");
        $inputpesanan['total_harga_pesanan'] = $request->total_harga_pesanan;
        $inputpesanan['meja_id'] = $request->meja_id;
        $inputpesanan['status_pesanan_id'] = 1;
        $inputpesanan['status_pembayaran_id'] = 1;
        $inputpesanan['atas_nama'] = $request->atas_nama;

        $pesanan = Pesanan::create($inputpesanan);
        $keranjang = Keranjang::where('user_id', auth()->user()->id)->get();
        foreach ($keranjang as $item) {
            $detail_pesanan['pesanan_id'] = $pesanan->id;
            $detail_pesanan['menu_id'] = $item->menu_id;
            $detail_pesanan['qty'] = $item->qty;
            $detail_pesanan['jumlah_harga'] = $item->total_harga;
            DetailPesanan::create($detail_pesanan);
            $item->delete();
        }

        return redirect()->route('user.pesanan');
    }
}
