<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Manajemen Buku | Kategori</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @vite('resources/css/app.css')
</head>

<body>
    @include('layout.header')
    <div class="container mx-auto mt-20 max-w-screen-md p-4">

        <h1 class="text-3xl font-bold text-heading mb-6">Detail Data Kategori</h1>
        <h3 class="text-xl font-semibold text-body mb-4">Informasi Kategori</h3>
        <div class="bg-white shadow-lg rounded-xl overflow-hidden border border-default p-6">
            <table class="w-full text-body text-sm">
                <tbody>
                    <tr class="border-b border-default">
                        <td class="py-3 font-medium text-heading w-1/3">Nama Kategori</td>
                        <td class="py-3 font-medium text-heading w-[2px]">:</td>
                        <td class="py-3">{{ $kategori->nama_kategori }}</td>
                    </tr>
                </tbody>
            </table>
            <div class="mt-6 flex space-x-3">
                <a href="{{ route('kategori.index') }}"
                    class="bg-neutral-secondary text-heading border border-default hover:bg-neutral-tertiary focus:ring-4 focus:ring-neutral-secondary-soft shadow-sm font-medium rounded-base text-sm px-4 py-2.5 focus:outline-none transition duration-150 ease-in-out">
                    ← Kembali ke Daftar
                </a>
                {{-- Tombol Tambah yang Anda minta (meskipun biasanya diletakkan di daftar) --}}
                <a href="{{ route('kategori.create') }}"
                    class="bg-brand text-white border border-transparent hover:bg-brand-strong focus:ring-4 focus:ring-brand-medium shadow-sm font-medium rounded-base text-sm px-4 py-2.5 focus:outline-none transition duration-150 ease-in-out">
                    Tambah Baru
                </a>
            </div>

        </div>


    </div>
</body>
@include('layout.footer')