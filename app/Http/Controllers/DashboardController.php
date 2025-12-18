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
    // 1. Data Statistik (Yang sudah ada)
    $totalBuku = Buku::count();
    $totalKategori = Kategori::count();
    $totalPenerbit = Penerbit::count();
    $bukuTerbaru = Buku::latest()->take(5)->get();

    // 2. TAMBAHAN PENTING: Data untuk Dropdown di Modal
    // Tanpa ini, form 'Tambah Buku' di modal bakal error "Undefined variable"
    $allkategori = Kategori::all(); 
    $allpenerbit = Penerbit::all();

    return view('dashboard', compact(
        'totalBuku', 
        'totalKategori', 
        'totalPenerbit', 
        'bukuTerbaru',
        'allkategori', // <-- Kirim ini
        'allpenerbit'  // <-- Kirim ini
    ));
}
}
