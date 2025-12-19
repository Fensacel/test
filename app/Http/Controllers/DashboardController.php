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

    // Ambil 5 buku terbaru
    $bukuTerbaru = Buku::with(['penerbit', 'kategori'])->latest()->take(5)->get();

    // AMBIL DATA UNTUK MODAL
    $allpenerbit = Penerbit::all();
    $allkategori = Kategori::all();

    // TAMBAHAN: Ambil buku yang stoknya kurang dari 5 (Stok Menipis)
    $stokMenipis = Buku::where('stok', '<', 5)->orderBy('stok', 'asc')->take(5)->get();

    return view('dashboard', compact(
        'totalBuku', 
        'totalKategori', 
        'totalPenerbit', 
        'bukuTerbaru', 
        'allpenerbit', 
        'allkategori',
        'stokMenipis' // <-- Kirim variabel ini
    ));
}
}
