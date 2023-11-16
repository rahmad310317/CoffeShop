<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Manajemen Akun';
        $akun = User::where('role', '0')->paginate(10);
        $jenisAkun = 'Pelanggan';

        $uri = [
            'create' => 'pelanggan.create',
            'show' => 'pelanggan.show',
            'edit' => 'pelanggan.edit',
            'destroy' => 'pelanggan.destroy',
        ];
        return view('admin.manajemenAkun.index', compact('akun', 'title', 'jenisAkun', 'uri'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jenisAkun = 'Pelanggan';
        $title = "Tambah Pelanggan";
        return view('admin.manajemenAkun.create', compact('title', 'jenisAkun'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'nomor_hp' => $request['nomor_hp'],
            'alamat' => $request['alamat'],
            'password' => Hash::make($request['password']),
            'role' => '0',
        ]);

        return redirect()->route('pelanggan.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $pelanggan)
    {
        $jenisAkun = 'Pelanggan';
        $title = "Edit Data Pelanggan";
        $uri = 'pelanggan.update';
        return view('admin.manajemenAkun.edit', [
            'user' => $pelanggan,
            'jenisAkun' => $jenisAkun,
            'uri' => $uri,
            'title' => $title
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $pelanggan)
    {
        $pelangganUpdate = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'nomor_hp' => 'required',
            'alamat' => 'required',
            'password' => 'required',
        ]);

        $pelanggan->update($pelangganUpdate);
        return redirect()->route('pelanggan.index')->with('success', 'Data berhasil Di Edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        User::destroy($user->id);
        return redirect()->back()->with('success', 'Data berhasil Di Hapus');
    }
}
