<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;
use App\Models\Kategori;
use App\Models\Penerbit;

class DashboardController extends Controller
{
    public function index()
    {
        $totalBuku = Buku::count();
        $totalKategori = Kategori::count();
        $totalPenerbit = Penerbit::count();

        $bukuTerbaru = Buku::latest()->take(5)->get();

        return view('dashboard', compact('totalBuku', 'totalKategori', 'totalPenerbit', 'bukuTerbaru'));
    }
}
