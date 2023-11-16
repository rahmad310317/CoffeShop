<?php
namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $menu = Menu::orderBy('created_at', 'desc')->limit(2)->get();
        return view('user.home', compact('menu'));
    }

}
