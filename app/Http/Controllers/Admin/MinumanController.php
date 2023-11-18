<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;

class MinumanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $daftar = 'Daftar Minuman';
        $uri = 'minuman.create';
        $breadcumb = 'Minuman';
        $title = 'Manajemen Menu';
        $menu = Menu::where('kategori_id', '2')->paginate(10);
        return view('admin.manajemenMenu.index', compact('menu', 'title', 'daftar', 'uri', 'breadcumb'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategori = 'Minuman';
        $uri = 'minuman.store';
        $title = "Tambah Minuman";
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

        // dd($request);
        $minuman = $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:menu',
            'harga' => 'required',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $minuman['kategori_id'] = '2';
        if ($request->file('gambar')) {
            $minuman['gambar'] = $request->file('gambar')->store('image/menu');
        }

        Menu::create($minuman);
        return redirect()->route('minuman.index')->with('success', 'Data berhasil Di Tambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Menu $minuman)
    {
        return view('admin.manajemenMenu.show', ['menu' => $minuman]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Menu $minuman)
    {
        $title = "Edit Data Minuman";
        $uri = 'minuman.update';
        $kategori = 'Minuman';
        return view('admin.manajemenMenu.edit', [
            'menu' => $minuman,
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
    public function update(Request $request, Menu $minuman)
    {
        $minumanUpdate = $request->validate([
            'name' => 'required',
            'slug' => 'required',
            'harga' => 'required',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $minumanUpdate['kategori_id'] = '2';
        if ($request->file('gambar')) {
            $minumanUpdate['gambar'] = $request->file('gambar')->store('image/menu');}

        $minuman->update($minumanUpdate);
        return redirect()->route('minuman.index')->with('success', 'Data berhasil Di Edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menu $minuman)
    {
    Menu::destroy($minuman->id);
    return redirect()->back()->with('success', 'Data berhasil Di Hapus');
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Menu::class, 'slug', $request->name);
        return response()->json(['slug' => $slug]);
    }
}
