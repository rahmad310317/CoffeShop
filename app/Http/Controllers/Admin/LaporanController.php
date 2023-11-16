<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Laporan;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function index()
    {
        $title = 'Manajemen Laporan';
        $laporan = Laporan::paginate(10);
        return view('admin.manajemenLaporan.index', compact('laporan', 'title'));
    }
}
