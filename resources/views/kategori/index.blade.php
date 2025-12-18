<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Manajemen Buku | Daftar Kategori</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @vite('resources/css/app.css')
</head>

<body class="bg-neutral-secondary-soft">

    @include('layout.header')

    <div class="container mx-auto mt-20 max-w-screen-lg p-4">

        <h1 class="text-3xl font-bold text-heading mb-6">Manajemen Data Kategori</h1>
        <h3 class="text-xl font-semibold text-body mb-4">Daftar Kategori</h3>

        <div class="mb-6">
            <button type="button" data-modal-target="create-kategori-modal" data-modal-toggle="create-kategori-modal"
                class="bg-brand text-white border border-transparent hover:bg-brand-strong focus:ring-4 focus:ring-brand-medium shadow-sm font-medium rounded-base text-sm px-4 py-2.5 focus:outline-none transition duration-150 ease-in-out">
                Tambah Kategori Baru
            </button>
        </div>

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg border border-default">
            <table id="data-table-kategori" class="w-full text-sm text-left text-body">
                <thead class="text-xs text-heading uppercase bg-neutral-tertiary">
                    <tr>
                        <th scope="col" class="px-6 py-3 w-[10%]">No</th>
                        <th scope="col" class="px-6 py-3 w-[60%]">Nama Kategori</th>
                        <th scope="col" class="px-6 py-3 text-center w-[30%]">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($allkategori as $key => $r)
                    <tr class="bg-neutral-primary border-b hover:bg-neutral-secondary-soft">
                        <td class="px-6 py-4 font-medium text-heading whitespace-nowrap">{{ $key + 1 }}</td>
                        <td class="px-6 py-4 font-medium text-heading whitespace-nowrap">{{ $r->nama_kategori }}</td>
                        
                        <td class="px-6 py-4 text-center">
                            <div class="flex justify-center space-x-2">
                                
                                <button type="button" 
                                    data-modal-target="show-kategori-modal-{{ $r->id }}" 
                                    data-modal-toggle="show-kategori-modal-{{ $r->id }}"
                                    class="text-xs text-blue-600 hover:text-blue-800 font-semibold py-1 px-2 border border-blue-500 rounded-lg transition duration-150 ease-in-out">
                                    Detail
                                </button>

                                <button type="button" 
                                    data-modal-target="edit-kategori-modal-{{ $r->id }}" 
                                    data-modal-toggle="edit-kategori-modal-{{ $r->id }}"
                                    class="text-xs text-green-600 hover:text-green-800 font-semibold py-1 px-2 border border-green-500 rounded-lg transition duration-150 ease-in-out">
                                    Edit
                                </button>

                                <form action="{{ route('kategori.destroy', $r->id) }}" method="POST" class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="text-xs text-red-600 hover:text-red-800 font-semibold py-1 px-2 border border-red-500 rounded-lg transition duration-150 ease-in-out"
                                        onclick="return confirm('Yakin ingin menghapus kategori: {{ $r->nama_kategori }}?')">
                                        Hapus
                                    </button>
                                </form>
                            </div>

                            {{-- INCLUDE MODAL EDIT & SHOW DI DALAM LOOP --}}
                            @include('kategori.edit')
                            @include('kategori.show')
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>

    {{-- INCLUDE MODAL CREATE DI LUAR LOOP --}}
    @include('kategori.create')

    @include('layout.footer')
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
</body>

</html>