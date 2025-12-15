<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Manajemen Buku | Buat Penerbit Baru</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @vite('resources/css/app.css')
</head>

<body class="bg-neutral-secondary-soft">
    @include('layout.header')
    <div class="container mx-auto mt-20 max-w-screen-md p-4">

        <h1 class="text-3xl font-bold text-heading mb-6">Manajemen Data Penerbit</h1>
        <h3 class="text-xl font-semibold text-body mb-4">Buat Penerbit Baru</h3>

        <div class="bg-white shadow-lg rounded-xl border border-default p-6">

            <form action="{{ route('penerbit.store') }}" method="POST">
                @csrf

                <div class="mb-4">
                    <label for="nama_penerbit" class="block text-sm font-medium text-heading mb-1">
                        Nama Penerbit
                    </label>
                    <input type="text" name="nama_penerbit" id="nama_penerbit"
                        value="{{ old('nama_penerbit') }}"
                        class="w-full px-3 py-2 border border-default rounded-lg focus:outline-none focus:ring-2 focus:ring-brand-medium"
                        required>
                    {{-- Opsional: Menampilkan error validation jika ada --}}
                    @error('nama_penerbit')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex space-x-3 mt-6">

                    <button type="submit"
                        class="bg-brand text-white border border-transparent hover:bg-brand-strong focus:ring-4 focus:ring-brand-medium shadow-sm font-medium rounded-base text-sm px-4 py-2.5 transition duration-150 ease-in-out">
                        Simpan
                    </button>
                    <a href="{{ route('penerbit.index') }}"
                        class="bg-neutral-secondary text-heading border border-default hover:bg-neutral-tertiary focus:ring-4 focus:ring-neutral-secondary-soft shadow-sm font-medium rounded-base text-sm px-4 py-2.5 focus:outline-none transition duration-150 ease-in-out">
                        Batal
                    </a>
                </div>
            </form>

        </div>

    </div>
    @include('layout.footer')
</body>

</html>