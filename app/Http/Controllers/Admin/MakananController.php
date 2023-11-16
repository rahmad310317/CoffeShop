<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use App\Models\Menu;
use Illuminate\Http\Request;
use Cviebrock\EloquentSluggable\Services\SlugService;
use phpDocumentor\Reflection\Types\This;

class MakananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
        $daftar = 'Daftar Makanan';
        $uri = 'makanan.create';
        $breadcumb = 'Makanan';
        $title = 'Manajemen Menu';
        $menu = Menu::where('kategori_id', '1')->paginate(5);
        return view('admin.manajemenMenu.index', compact('menu', 'title', 'daftar', 'uri', 'breadcumb'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategori = 'Makanan';
        $uri = 'makanan.store';
        $title = "Tambah Makanan";
        return view('admin.manajemenMenu.create', compact('title', 'kategori', 'uri'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $makanan = $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:menu',
            'harga' => 'required',
            'gambar' => 'image|file|max:1024',
        ]);

        $makanan['kategori_id'] = '1';

        if ($request->file('gambar')) {
            $makanan['gambar'] = $request->file('gambar')->store('image/menu');
        }

        Menu::create($makanan);
        return redirect()->route('makanan.index')->with('success', 'Data berhasil Di Tambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Menu $makanan)
    {
        return view('admin.manajemenMenu.show', ['menu' => $makanan]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Menu $makanan)
    {
        $title = "Edit Data Makanan";
        $uri = 'makanan.update';
        $kategori = 'Makanan';
        return view('admin.manajemenMenu.edit', [
            'menu' => $makanan,
            'kategori' => $kategori,
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
    public function update(Request $request, Menu $makanan)
    {
        $makananUpdate = $request->validate([
            'name' => 'required',
            'slug' => 'required',
            'harga' => 'required',
            'gambar' => 'image|file|max:1024',
        ]);

        $makananUpdate['kategori_id'] = '2';
        if ($request->file('gambar')) {
            $makananUpdate['gambar'] = $request->file('gambar')->store('image/menu');}

        $makanan->update($makananUpdate);
        return redirect()->route('minuman.index')->with('success', 'Data berhasil Di Edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menu $makanan)
    {
        Menu::destroy($makanan->id);
        return redirect()->back()->with('success', 'Data berhasil Di Hapus');
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Menu::class, 'slug', $request->name);
        return response()->json(['slug' => $slug]);
    }
}
