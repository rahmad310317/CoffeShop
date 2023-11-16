<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DetailPesanan;
use App\Models\Pesanan;
use App\Models\StatusPembayaran;
use App\Models\StatusPesanan;
use Illuminate\Http\Request;

class PesananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Manajemen Pesanan';
        $pesanan = Pesanan::paginate(10);
        return view('admin.manajemenPesanan.index', compact('pesanan', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Pesanan $pesanan)
    {
        $title = 'Detail Pesanan';
        return view('admin.manajemenPesanan.show', compact('pesanan', 'title'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Pesanan $pesanan)
    {
        $title = 'Edit Status Pesanan';
        $status = StatusPesanan::all();
        $pembayaran = StatusPembayaran::all();
        return view('admin.manajemenPesanan.edit', compact('pesanan', 'status', 'title', 'pembayaran'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pesanan $pesanan)
    {
        $updateStatus = $request->validate([
            'status_pesanan_id' => 'required',
            'status_pembayaran_id' => 'required',
        ]);

        $pesanan->update($updateStatus);
        return redirect()->route('pesanan.index')->with('success', 'Data berhasil Di Edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
