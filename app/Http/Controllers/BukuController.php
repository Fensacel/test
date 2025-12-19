<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Penerbit;
use App\Models\Kategori;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        
        // Eager load relasi agar query lebih efisien
        $query = Buku::with(['penerbit', 'kategori']);

        if ($search) {
            $query->where(function($q) use ($search) {
                $q->where('judul_buku', 'LIKE', "%{$search}%")
                  ->orWhere('pengarang', 'LIKE', "%{$search}%")
                  ->orWhere('tahun_terbit', 'LIKE', "%{$search}%")
                  // Pencarian ke tabel relasi (Penerbit & Kategori)
                  ->orWhereHas('penerbit', function($p) use ($search) {
                      $p->where('nama_penerbit', 'LIKE', "%{$search}%");
                  })
                  ->orWhereHas('kategori', function($k) use ($search) {
                      $k->where('nama_kategori', 'LIKE', "%{$search}%");
                  });
            });
        }

        $allbuku = $query->latest()->get();
        
        // Data untuk dropdown di modal create/edit
        $penerbit = Penerbit::all();
        $kategori = Kategori::all();

        return view('buku.index', compact('allbuku', 'penerbit', 'kategori'));
    }

    public function create()
    {
        $penerbit = Penerbit::all();
        $kategori = Kategori::all();
        return view('buku.create', compact('penerbit', 'kategori'));
    }

    public function store(Request $request)
    {
        // VALIDASI INPUT (Tambahkan Stok disini)
        $validatedData = $request->validate([
            'judul_buku' => 'required|max:100',
            'pengarang' => 'required|max:100',
            'tahun_terbit' => 'required|digits:4',
            'stok' => 'required|integer|min:0', // <--- WAJIB ADA
            'kategori_id' => 'required|exists:kategoris,id',
            'penerbit_id' => 'required|exists:penerbits,id',
        ]);

        Buku::create($validatedData);

        // Cek jika request datang dari Dashboard (Akses Cepat)
        if ($request->input('redirect_to') == 'dashboard') {
            return redirect('/')->with('success', 'Buku berhasil ditambahkan dari Dashboard!');
        }

        return redirect()->route('buku.index')
            ->with('success', 'Buku berhasil ditambahkan.');
    }

    public function show(Buku $buku)
    {
        return view('buku.show', compact('buku'));
    }

    public function edit(Buku $buku)
    {
        $penerbit = Penerbit::all();
        $kategori = Kategori::all();
        return view('buku.edit', compact('buku', 'penerbit', 'kategori'));
    }

    public function update(Request $request, Buku $buku)
    {
        // VALIDASI UPDATE (Tambahkan Stok disini juga)
        $validatedData = $request->validate([
            'judul_buku' => 'required|max:100',
            'pengarang' => 'required|max:100',
            'tahun_terbit' => 'required|digits:4',
            'stok' => 'required|integer|min:0', // <--- WAJIB ADA
            'kategori_id' => 'required|exists:kategoris,id',
            'penerbit_id' => 'required|exists:penerbits,id',
        ]);

        $buku->update($validatedData);

        return redirect()->route('buku.index')
            ->with('success', 'Buku berhasil diperbarui.');
    }

    public function destroy(Buku $buku)
    {
        $buku->delete();
        return redirect()->route('buku.index')
            ->with('success', 'Buku berhasil dihapus.');
    }
}