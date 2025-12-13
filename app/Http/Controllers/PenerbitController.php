<?php

namespace App\Http\Controllers;

use App\Models\Penerbit;
use Illuminate\Http\Request;

class PenerbitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $allpenerbit = penerbit::all();
        return view('penerbit.index', compact('allpenerbit'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('penerbit.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //buat validasi
        $validatedData = $request->validate([
            'nama_penerbit' => 'required|max:100',
        ]);
        //simpan ke database
        penerbit::create($validatedData);
        //redirect ke halaman index dengan pesan sukses
        return redirect()->route('penerbit.index')->with('success', 'penerbit berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(penerbit $penerbit)
    {
        return view('penerbit.show', compact('penerbit'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(penerbit $penerbit)
    {
        return view('penerbit.edit', compact('penerbit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, penerbit $penerbit)
    {
        //buat validasi
        $validatedData = $request->validate([
            'nama_penerbit' => 'required|max:100',
        ]);
        //update ke database
        $penerbit->update($validatedData);
        //redirect ke halaman index dengan pesan sukses
        return redirect()->route('penerbit.index')->with('success', 'penerbit berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(penerbit $penerbit)
    {
        $penerbit->delete();
        return redirect()->route('penerbit.index')->with('success', 'penerbit berhasil dihapus.');
    }
}
