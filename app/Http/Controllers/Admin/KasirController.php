<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class KasirController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Manajemen Akun';
        $akun = User::where('role', '2')->paginate(10);
        $jenisAkun = 'Kasir';
        $uri = [
            'create' => 'kasir.create',
            'show' => 'kasir.show',
            'edit' => 'kasir.edit',
            'destroy' => 'kasir.destroy',
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
        $jenisAkun = 'Kasir';
        $title = "Tambah Kasir";
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
        // dd($request);
        User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'nomor_hp' => $request['nomor_hp'],
            'alamat' => $request['alamat'],
            'password' => Hash::make($request['password']),
            'role' => '2',
        ]);

        return redirect()->route('kasir.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        dd($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $kasir)
    {
        $jenisAkun = 'Kasir';
        $title = "Edit Data Kasir";
        $uri = 'kasir.update';
        return view('admin.manajemenAkun.edit', [
            'user' => $kasir,
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
    public function update(Request $request, User $kasir)
    {
        $kasirUpdate = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'nomor_hp' => 'required',
            'alamat' => 'required',
            'password' => 'required',
        ]);

        $kasir->update($kasirUpdate);
        return redirect()->route('kasir.index')->with('success', 'Data berhasil Di Edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // dd($id);
        User::destroy($id);
        return redirect()->back()->with('success', 'Data berhasil Di Hapus');
    }
}
