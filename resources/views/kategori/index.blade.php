<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Manajemen Buku | Kategori</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @vite('resources/css/app.css')
</head>

<body class="bg-neutral-secondary-soft">
    {{-- Memanggil komponen header/navbar. --}}
    @include('layout.header')

    {{-- Konten Utama. mt-20 untuk menghindari fixed navbar. --}}
    <div class="container mx-auto mt-20 max-w-screen-xl p-4">

        <h1 class="text-3xl font-bold text-heading mb-6">Manajemen Data Kategori</h1>
        <h3 class="text-xl font-semibold text-body mb-4">Daftar Kategori</h3>

        <div class="mb-6">
            <a href="{{ route('kategori.create') }}"
                class="bg-brand text-white border border-transparent hover:bg-brand-strong focus:ring-4 focus:ring-brand-medium shadow-sm font-medium rounded-base text-sm px-4 py-2.5 focus:outline-none transition duration-150 ease-in-out">
                Tambah Kategori Baru
            </a>
        </div>

        {{-- Table Kategori (Menggunakan Styling Tailwind CSS untuk Tampilan Profesional) --}}
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg border border-default">
            <table id="data-table" class="w-full text-sm text-left text-body">
                <thead class="text-xs text-heading uppercase bg-neutral-tertiary">
                    <tr>
                        <th scope="col" class="px-6 py-3 w-1/12">No</th>
                        <th scope="col" class="px-6 py-3">Nama Kategori</th>
                        <th scope="col" class="px-6 py-3 text-center w-1/3">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($allKategori as $key => $r)
                    <tr class="bg-neutral-primary border-b hover:bg-neutral-secondary-soft">
                        <td class="px-6 py-4 font-medium text-heading whitespace-nowrap">{{ $key + 1 }}</td>
                        <td class="px-6 py-4 font-medium text-heading whitespace-nowrap">{{ $r->nama_kategori }}</td>
                        <td class="px-6 py-4 text-center">
                            {{-- Container Aksi --}}
                            <div class="flex justify-center space-x-2">
                                <a href="{{ route('kategori.show', $r->id) }}"
                                    class="text-xs text-blue-600 hover:text-blue-800 font-semibold py-1 px-3 border border-blue-500 rounded-lg transition duration-150 ease-in-out">
                                    Detail
                                </a>
                                <a href="{{ route('kategori.edit', $r->id) }}"
                                    class="text-xs text-green-600 hover:text-green-800 font-semibold py-1 px-3 border border-green-500 rounded-lg transition duration-150 ease-in-out">
                                    Edit
                                </a>

                                <form action="{{ route('kategori.destroy', $r->id) }}" method="POST"
                                    class="inline-block">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                        class="text-xs text-red-600 hover:text-red-800 font-semibold py-1 px-3 border border-red-500 rounded-lg transition duration-150 ease-in-out"
                                        onclick="return confirm('Yakin ingin menghapus kategori: {{ $r->nama_kategori }}?')">
                                        Hapus
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{-- End Table Kategori --}}

    </div>
    {{-- End Container --}}

    {{-- Memanggil komponen footer --}}
    @include('layout.footer')
</body>

</html>