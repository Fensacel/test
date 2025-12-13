<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Manajemen Buku | Daftar Penerbit</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @vite('resources/css/app.css')
</head>

<body class="bg-neutral-secondary-soft">
    {{-- Memanggil komponen header/navbar. Asumsi header memiliki fixed position. --}}
    @include('layout.header')

    {{-- Konten Utama Daftar Penerbit (mt-20 untuk menghindari fixed navbar) --}}
    <div class="container mx-auto mt-20 max-w-screen-lg p-4">

        <h1 class="text-3xl font-bold text-heading mb-6">Manajemen Data Penerbit</h1>
        <h3 class="text-xl font-semibold text-body mb-4">Daftar Penerbit</h3>

        <div class="mb-6">
            {{-- Tombol Tambah --}}
            <a href="{{ route('penerbit.create') }}"
                class="bg-brand text-white border border-transparent hover:bg-brand-strong focus:ring-4 focus:ring-brand-medium shadow-sm font-medium rounded-base text-sm px-4 py-2.5 focus:outline-none transition duration-150 ease-in-out">
                Tambah Penerbit Baru
            </a>
        </div>

        {{-- Table Penerbit (Menggunakan Styling Tailwind CSS) --}}
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg border border-default">
            <table id="data-table-penerbit" class="w-full text-sm text-left text-body">
                <thead class="text-xs text-heading uppercase bg-neutral-tertiary">
                    <tr>
                        <th scope="col" class="px-6 py-3 w-[10%]">No</th>
                        <th scope="col" class="px-6 py-3 w-[55%]">Nama Penerbit</th>
                        <th scope="col" class="px-6 py-3 text-center w-[35%]">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($allpenerbit as $key => $r)
                    <tr class="bg-neutral-primary border-b hover:bg-neutral-secondary-soft">
                        <td class="px-6 py-4 font-medium text-heading whitespace-nowrap">{{ $key + 1 }}</td>
                        <td class="px-6 py-4 font-medium text-heading whitespace-nowrap">{{ $r->nama_penerbit }}</td>
                        <td class="px-6 py-4 text-center">
                            {{-- Container Aksi --}}
                            <div class="flex justify-center space-x-2">
                                <a href="{{ route('penerbit.show', $r->id) }}"
                                    class="text-xs text-blue-600 hover:text-blue-800 font-semibold py-1 px-3 border border-blue-500 rounded-lg transition duration-150 ease-in-out">
                                    Detail
                                </a>
                                <a href="{{ route('penerbit.edit', $r->id) }}"
                                    class="text-xs text-green-600 hover:text-green-800 font-semibold py-1 px-3 border border-green-500 rounded-lg transition duration-150 ease-in-out">
                                    Edit
                                </a>

                                <form action="{{ route('penerbit.destroy', $r->id) }}" method="POST" class="inline-block">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                        class="text-xs text-red-600 hover:text-red-800 font-semibold py-1 px-3 border border-red-500 rounded-lg transition duration-150 ease-in-out"
                                        onclick="return confirm('Yakin ingin menghapus penerbit: {{ $r->nama_penerbit }}?')">
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
        {{-- End Table Penerbit --}}

    </div>
    {{-- End Konten Utama --}}

    {{-- Memanggil komponen footer --}}
    @include('layout.footer')
</body>

</html>