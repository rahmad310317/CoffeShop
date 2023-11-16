<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class DaftarMenuController extends Controller
{
    public function index()
    {
        $menu = Menu::orderBy('created_at', 'desc')->get();
        return view('user.daftarmenu', compact('menu'));
    }

    public function detailMenu(Menu $slug)
    {
        return view('user.detailMenu', ['detailmenu' => $slug]);
    }
}
