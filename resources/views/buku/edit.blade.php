<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Manajemen Buku | Edit Buku</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @vite('resources/css/app.css')
</head>

<body class="bg-neutral-secondary-soft">
    {{-- Memanggil komponen header/navbar. Asumsi header memiliki fixed position. --}}
    @include('layout.header')

    {{-- Konten Utama Form Edit Buku (mt-20 untuk menghindari fixed navbar) --}}
    <div class="container mx-auto mt-20 max-w-screen-lg p-4">

        <h1 class="text-3xl font-bold text-heading mb-6">Manajemen Data Buku</h1>
        <h3 class="text-xl font-semibold text-body mb-4">Update Buku</h3>

        {{-- Kartu Form --}}
        <div class="bg-white shadow-lg rounded-xl border border-default p-6">

            <form action="{{ route('buku.update', $buku->id) }}" method="POST">
                @csrf
                @method('PUT')

                {{-- Judul Buku --}}
                <div class="mb-4">
                    <label for="judul_buku" class="block text-sm font-medium text-heading mb-1">Judul Buku</label>
                    <input type="text" name="judul_buku" id="judul_buku"
                        value="{{ old('judul_buku', $buku->judul_buku) }}"
                        class="w-full px-3 py-2 border border-default rounded-lg focus:outline-none focus:ring-2 focus:ring-brand-medium"
                        required>
                    @error('judul_buku')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Pengarang --}}
                <div class="mb-4">
                    <label for="pengarang" class="block text-sm font-medium text-heading mb-1">Pengarang</label>
                    <input type="text" name="pengarang" id="pengarang"
                        value="{{ old('pengarang', $buku->pengarang) }}"
                        class="w-full px-3 py-2 border border-default rounded-lg focus:outline-none focus:ring-2 focus:ring-brand-medium"
                        required>
                    @error('pengarang')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Tahun Terbit --}}
                <div class="mb-4">
                    <label for="tahun_terbit" class="block text-sm font-medium text-heading mb-1">Tahun Terbit</label>
                    <input type="text" name="tahun_terbit" id="tahun_terbit"
                        value="{{ old('tahun_terbit', $buku->tahun_terbit) }}"
                        class="w-full px-3 py-2 border border-default rounded-lg focus:outline-none focus:ring-2 focus:ring-brand-medium"
                        required>
                    @error('tahun_terbit')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Penerbit (Dropdown) --}}
                <div class="mb-4">
                    <label for="penerbit_id" class="block text-sm font-medium text-heading mb-1">Penerbit</label>
                    <select name="penerbit_id" id="penerbit_id"
                        class="w-full px-3 py-2 border border-default rounded-lg focus:outline-none focus:ring-2 focus:ring-brand-medium appearance-none"
                        required>
                        <option value="" disabled>Pilih Penerbit</option>
                        @foreach ($penerbit as $p)
                            <option value="{{ $p->id }}" {{ old('penerbit_id', $buku->penerbit_id) == $p->id ? 'selected' : '' }}>
                                {{ $p->nama_penerbit }}
                            </option>
                        @endforeach
                    </select>
                    @error('penerbit_id')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Kategori (Dropdown) --}}
                <div class="mb-6">
                    <label for="kategori_id" class="block text-sm font-medium text-heading mb-1">Kategori</label>
                    <select name="kategori_id" id="kategori_id"
                        class="w-full px-3 py-2 border border-default rounded-lg focus:outline-none focus:ring-2 focus:ring-brand-medium appearance-none"
                        required>
                        <option value="" disabled>Pilih Kategori</option>
                        @foreach ($kategori as $k)
                            <option value="{{ $k->id }}" {{ old('kategori_id', $buku->kategori_id) == $k->id ? 'selected' : '' }}>
                                {{ $k->nama_kategori }}
                            </option>
                        @endforeach
                    </select>
                    @error('kategori_id')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex space-x-3 mt-6">
                    {{-- Tombol Update --}}
                    <button type="submit"
                        class="bg-brand text-white border border-transparent hover:bg-brand-strong focus:ring-4 focus:ring-brand-medium shadow-sm font-medium rounded-base text-sm px-4 py-2.5 transition duration-150 ease-in-out">
                        Update Buku
                    </button>

                    {{-- Tombol Kembali --}}
                    <a href="{{ route('buku.index') }}"
                        class="bg-neutral-secondary text-heading border border-default hover:bg-neutral-tertiary focus:ring-4 focus:ring-neutral-secondary-soft shadow-sm font-medium rounded-base text-sm px-4 py-2.5 focus:outline-none transition duration-150 ease-in-out">
                        Batal
                    </a>
                </div>
            </form>

        </div>
        {{-- End Kartu Form --}}

    </div>
    {{-- End Konten Utama --}}

    {{-- Memanggil komponen footer --}}
    @include('layout.footer')
</body>

</html>