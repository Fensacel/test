<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Manajemen Buku | Dashboard</title>
    @vite('resources/css/app.css')
</head>

<body class="flex flex-col min-h-screen bg-neutral-secondary-soft">

    @include('layout.header')


    <main class="flex-grow container mx-auto mt-20 max-w-screen-xl p-4">

        <h1 class="text-3xl font-bold text-heading mb-8">Dashboard Manajemen Buku</h1>


        <h2 class="text-xl font-semibold text-body mb-4">Statistik Total</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">
            {{-- Total Buku --}}
            <div class="bg-white shadow-lg rounded-xl p-6 border flex items-center justify-between">
                <div>
                    <p class="text-sm text-body uppercase font-medium">Total Buku</p>
                    <p class="text-4xl font-bold text-brand mt-1">{{ $totalBuku }}</p>
                </div>
            </div>


            <div class="bg-white shadow-lg rounded-xl p-6 border flex items-center justify-between">
                <div>
                    <p class="text-sm text-body uppercase font-medium">Total Kategori</p>
                    <p class="text-4xl font-bold text-yellow-600 mt-1">{{ $totalKategori }}</p>
                </div>
            </div>

            <div class="bg-white shadow-lg rounded-xl p-6 border flex items-center justify-between">
                <div>
                    <p class="text-sm text-body uppercase font-medium">Total Penerbit</p>
                    <p class="text-4xl font-bold text-indigo-600 mt-1">{{ $totalPenerbit }}</p>
                </div>
            </div>
        </div>

        <h2 class="text-xl font-semibold text-body mb-4">5 Buku Terbaru</h2>
        <ul class="bg-white shadow-lg rounded-xl p-6 border divide-y divide-default mb-10">
            @foreach ($bukuTerbaru as $buku)
            <li class="py-2 flex justify-between items-center">
                <span>{{ $buku->judul_buku }}</span>
                <a href="{{ route('buku.show', $buku->id) }}" class="text-xs text-blue-500 hover:underline">Lihat Detail</a>
            </li>
            @endforeach
        </ul>
        <h2 class="text-xl font-semibold text-body mb-4">Akses Cepat</h2>
        <div class="flex flex-wrap gap-4 mb-10">
            <a href="{{ route('buku.create') }}" class="bg-green-500 text-white px-4 py-2 rounded-lg shadow-md hover:bg-green-600">+ Tambah Buku</a>
            <a href="{{ route('kategori.create') }}" class="bg-yellow-500 text-white px-4 py-2 rounded-lg shadow-md hover:bg-yellow-600">+ Tambah Kategori</a>
            <a href="{{ route('penerbit.create') }}" class="bg-indigo-500 text-white px-4 py-2 rounded-lg shadow-md hover:bg-indigo-600">+ Tambah Penerbit</a>
        </div>

    </main>

    @include('layout.footer')

</body>

</html>