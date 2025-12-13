<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Manajemen Buku | Detail Buku</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @vite('resources/css/app.css')
</head>

<body class="bg-neutral-secondary-soft">
    {{-- Memanggil komponen header/navbar. Asumsi header memiliki fixed position. --}}
    @include('layout.header')

    {{-- Konten Utama Detail Buku (mt-20 untuk menghindari fixed navbar) --}}
    <div class="container mx-auto mt-20 max-w-screen-md p-4">

        <h1 class="text-3xl font-bold text-heading mb-6">Manajemen Data Buku</h1>
        <h3 class="text-xl font-semibold text-body mb-4">Detail Buku: {{ $buku->judul_buku }}</h3>

        {{-- Kartu Detail --}}
        <div class="bg-white shadow-lg rounded-xl overflow-hidden border border-default p-6">

            {{-- Tabel Detail --}}
            <table class="w-full text-body text-sm">
                <tbody>
                    <tr class="border-b border-default">
                        <td class="py-3 font-medium text-heading w-1/3">Judul Buku</td>
                        <td class="py-3 font-medium text-heading w-[2px]">:</td>
                        <td class="py-3">{{ $buku->judul_buku }}</td>
                    </tr>
                    <tr class="border-b border-default">
                        <td class="py-3 font-medium text-heading">Pengarang</td>
                        <td class="py-3 font-medium text-heading">:</td>
                        <td class="py-3">{{ $buku->pengarang }}</td>
                    </tr>
                    <tr class="border-b border-default">
                        <td class="py-3 font-medium text-heading">Tahun Terbit</td>
                        <td class="py-3 font-medium text-heading">:</td>
                        <td class="py-3">{{ $buku->tahun_terbit }}</td>
                    </tr>
                    <tr class="border-b border-default">
                        <td class="py-3 font-medium text-heading">Penerbit</td>
                        <td class="py-3 font-medium text-heading">:</td>
                        <td class="py-3">{{ $buku->penerbit->nama_penerbit }}</td>
                    </tr>
                    <tr>
                        <td class="py-3 font-medium text-heading">Kategori</td>
                        <td class="py-3 font-medium text-heading">:</td>
                        <td class="py-3">{{ $buku->kategori->nama_kategori }}</td>
                    </tr>
                </tbody>
            </table>
            {{-- End Tabel Detail --}}

            {{-- Tombol Aksi --}}
            <div class="mt-6 flex space-x-3">
                {{-- Tombol Kembali ke Daftar --}}
                <a href="{{ route('buku.index') }}"
                    class="bg-neutral-secondary text-heading border border-default hover:bg-neutral-tertiary focus:ring-4 focus:ring-neutral-secondary-soft shadow-sm font-medium rounded-base text-sm px-4 py-2.5 focus:outline-none transition duration-150 ease-in-out">
                    ← Kembali ke Daftar
                </a>
                {{-- Tombol Tambah yang Anda minta --}}
                <a href="{{ route('buku.create') }}"
                    class="bg-brand text-white border border-transparent hover:bg-brand-strong focus:ring-4 focus:ring-brand-medium shadow-sm font-medium rounded-base text-sm px-4 py-2.5 focus:outline-none transition duration-150 ease-in-out">
                    Tambah Baru
                </a>
            </div>
            {{-- End Tombol Aksi --}}

        </div>
        {{-- End Kartu Detail --}}

    </div>
    {{-- End Konten Utama --}}

    {{-- Memanggil komponen footer --}}
    @include('layout.footer')
</body>

</html>