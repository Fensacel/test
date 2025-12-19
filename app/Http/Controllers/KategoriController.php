<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $query = Kategori::query();

        if ($search) {
            $query->where('nama_kategori', 'LIKE', "%{$search}%");
        }

        $allkategori = $query->latest()->get();

        return view('kategori.index', compact('allkategori'));
    }

    public function create()
    {
        return view('kategori.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_kategori' => 'required|max:100',
        ]);
        Kategori::create($validatedData);
        if ($request->input('redirect_to') == 'dashboard') {
            return redirect('/')->with('success', 'Kategori berhasil ditambahkan dari Dashboard!');
        }
        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil ditambahkan.');
    }

    public function show(Kategori $kategori)
    {
        return view('kategori.show', compact('kategori'));
    }

    public function edit(Kategori $kategori)
    {
        return view('kategori.edit', compact('kategori'));
    }

    public function update(Request $request, Kategori $kategori)
    {
        $validatedData = $request->validate([
            'nama_kategori' => 'required|max:100',
        ]);
        $kategori->update($validatedData);
        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil diupdate.');
    }

    public function destroy(Kategori $kategori)
    {
        $kategori->delete();
        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil dihapus.');
    }
}
