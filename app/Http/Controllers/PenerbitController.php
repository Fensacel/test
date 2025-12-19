<?php

namespace App\Http\Controllers;

use App\Models\Penerbit;
use Illuminate\Http\Request;

class PenerbitController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $query = Penerbit::query();

        if ($search) {
            $query->where('nama_penerbit', 'LIKE', "%{$search}%")
                  ->orWhere('alamat', 'LIKE', "%{$search}%")
                  ->orWhere('telepon', 'LIKE', "%{$search}%");
        }

        $allpenerbit = $query->latest()->get();

        return view('penerbit.index', compact('allpenerbit'));
    }

    public function create()
    {
        return view('penerbit.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_penerbit' => 'required|max:100',
            'alamat' => 'required|max:255',
            'telepon' => 'required|max:15',
        ]);

        penerbit::create($validatedData);

        if ($request->input('redirect_to') == 'dashboard') {
            return redirect('/')->with('success', 'Penerbit berhasil ditambahkan dari Dashboard!');
        }

        return redirect()->route('penerbit.index')->with('success', 'penerbit berhasil ditambahkan.');
    }

    public function show(penerbit $penerbit)
    {
        return view('penerbit.show', compact('penerbit'));
    }

    public function edit(penerbit $penerbit)
    {
        return view('penerbit.edit', compact('penerbit'));
    }

    public function update(Request $request, penerbit $penerbit)
    {
        $validatedData = $request->validate([
            'nama_penerbit' => 'required|max:100',
        ]);

        $penerbit->update($validatedData);

        return redirect()->route('penerbit.index')->with('success', 'penerbit berhasil diupdate.');
    }

    public function destroy(penerbit $penerbit)
    {
        $penerbit->delete();
        return redirect()->route('penerbit.index')->with('success', 'penerbit berhasil dihapus.');
    }
}
