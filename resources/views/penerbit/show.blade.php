<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Manajemen Buku | Detail Penerbit</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @vite('resources/css/app.css')
</head>

<body class="bg-neutral-secondary-soft">
    @include('layout.header')
    <div class="container mx-auto mt-20 max-w-screen-md p-4">

        <h1 class="text-3xl font-bold text-heading mb-6">Manajemen Data Penerbit</h1>
        <h3 class="text-xl font-semibold text-body mb-4">Detail Penerbit</h3>

        <div class="bg-white shadow-lg rounded-xl overflow-hidden border border-default p-6">

            <table class="w-full text-body text-sm">
                <tbody>
                    <tr class="border-b border-default">
                        <td class="py-3 font-medium text-heading w-1/3">Nama Penerbit</td>
                        <td class="py-3 font-medium text-heading w-[2px]">:</td>
                        <td class="py-3">{{ $penerbit->nama_penerbit }}</td>
                    </tr>
                    <tr class="border-b border-default">
                        <td class="py-3 font-medium text-heading w-1/3">Alamat Penerbit</td>
                        <td class="py-3 font-medium text-heading w-[2px]">:</td>
                        <td class="py-3">{{ $penerbit->alamat }}</td>
                    </tr>
                    <tr class="border-b border-default">
                        <td class="py-3 font-medium text-heading w-1/3"> Nomor Telepon Penerbit</td>
                        <td class="py-3 font-medium text-heading w-[2px]">:</td>
                        <td class="py-3">{{ $penerbit->telepon }}</td>
                    </tr>
                </tbody>
            </table>
            <div class="mt-6 flex space-x-3">
                <a href="{{ route('penerbit.index') }}"
                    class="bg-neutral-secondary text-heading border border-default hover:bg-neutral-tertiary focus:ring-4 focus:ring-neutral-secondary-soft shadow-sm font-medium rounded-base text-sm px-4 py-2.5 focus:outline-none transition duration-150 ease-in-out">
                    ← Kembali ke Daftar
                </a>

                <a href="{{ route('penerbit.create') }}"
                    class="bg-brand text-white border border-transparent hover:bg-brand-strong focus:ring-4 focus:ring-brand-medium shadow-sm font-medium rounded-base text-sm px-4 py-2.5 focus:outline-none transition duration-150 ease-in-out">
                    Tambah Baru
                </a>
            </div>


        </div>
    </div>
    @include('layout.footer')
</body>

</html>