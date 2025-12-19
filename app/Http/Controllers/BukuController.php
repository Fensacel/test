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
        $query = Buku::with(['penerbit', 'kategori']);

        if ($search) {
            $query->where(function($q) use ($search) {
                $q->where('judul_buku', 'LIKE', "%{$search}%")
                  ->orWhere('pengarang', 'LIKE', "%{$search}%")
                  ->orWhere('tahun_terbit', 'LIKE', "%{$search}%")
                  ->orWhereHas('penerbit', function($p) use ($search) {
                      $p->where('nama_penerbit', 'LIKE', "%{$search}%");
                  })
                  ->orWhereHas('kategori', function($k) use ($search) {
                      $k->where('nama_kategori', 'LIKE', "%{$search}%");
                  });
            });
        }

        $allbuku = $query->latest()->get();
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
        $validatedData = $request->validate([
            'judul_buku' => 'required|max:100',
            'pengarang' => 'required|max:100',
            'tahun_terbit' => 'required|digits:4',
            'kategori_id' => 'required|exists:kategoris,id',
            'penerbit_id' => 'required|exists:penerbits,id',
        ]);

        Buku::create($validatedData);

        if ($request->input('redirect_to') == 'dashboard') {
            return redirect('/')->with('success', 'Penerbit berhasil ditambahkan dari Dashboard!');
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
        $validatedData = $request->validate([
            'judul_buku' => 'required|max:100',
            'pengarang' => 'required|max:100',
            'tahun_terbit' => 'required|digits:4',
            'kategori_id' => 'required|exists:kategoris,id',
            'penerbit_id' => 'required|exists:penerbits,id',
        ]);

        $buku->update($validatedData);

        return redirect()->route('buku.index')
            ->with('success', 'Buku berhasil diupdate.');
    }

    public function destroy(Buku $buku)
    {
        $buku->delete();
        return redirect()->route('buku.index')
            ->with('success', 'Buku berhasil dihapus.');
    }
}
