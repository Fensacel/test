<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;


Route::get('/', function () {
    return view('dashboard');
});

Route::resource('kategori', App\Http\Controllers\KategoriController::class);
Route::resource('penerbit', App\Http\Controllers\PenerbitController::class);
Route::resource('buku', App\Http\Controllers\BukuController::class);
Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
