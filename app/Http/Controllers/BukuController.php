<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Penerbit;
use App\Models\Kategori;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index(Request $request)
    {
        // 1. Logika Search (yang sudah kita buat sebelumnya)
        $search = $request->input('search');

        $query = Buku::with(['penerbit', 'kategori']);

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('judul_buku', 'LIKE', "%{$search}%")
                    ->orWhere('pengarang', 'LIKE', "%{$search}%")
                    ->orWhere('tahun_terbit', 'LIKE', "%{$search}%");
            });
        }

        $allbuku = $query->latest()->get();

        // 2. TAMBAHKAN INI: Ambil data master untuk Dropdown di Modal Create/Edit
        $penerbit = Penerbit::all();
        $kategori = Kategori::all();

        // 3. Kirim semua variabel ke view (allbuku, penerbit, kategori)
        return view('buku.index', compact('allbuku', 'penerbit', 'kategori'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $penerbit = Penerbit::all();
        $kategori = Kategori::all();
        return view('buku.create', compact('penerbit', 'kategori'));
    }

    /**
     * Store a newly created resource in storage.
     */
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

        return redirect()->route('buku.index')
            ->with('success', 'Buku berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Buku $buku)
    {
        return view('buku.show', compact('buku'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Buku $buku)
    {
        $penerbit = Penerbit::all();
        $kategori = Kategori::all();
        return view('buku.edit', compact('buku', 'penerbit', 'kategori'));
    }

    /**
     * Update the specified resource in storage.
     */
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

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Buku $buku)
    {
        $buku->delete();
        return redirect()->route('buku.index')
            ->with('success', 'Buku berhasil dihapus.');
    }
}
