<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Buku | Daftar Penerbit</title>
    <link rel="icon" href="{{ asset('image/Archie.svg') }}" type="image/x-icon">
    @vite('resources/css/app.css')
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>

<body class="bg-gray-50 text-gray-800">

    @include('layout.header')

    <div class="p-4 sm:ml-64">

        <main class="min-h-screen mt-14 p-4">

            <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8 gap-4">
                
                <div>
                    <h1 class="text-3xl font-bold text-gray-900">Manajemen Penerbit</h1>
                    <p class="text-gray-500 mt-1">Kelola data penerbit, alamat, dan kontak telepon.</p>
                </div>

                <div class="flex flex-col md:flex-row gap-3 w-full md:w-auto">
                    
                    <form action="{{ route('penerbit.index') }}" method="GET" class="w-full md:w-64">
                        <div class="relative">
                            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                                </svg>
                            </div>
                            <input type="search" name="search" value="{{ request('search') }}" 
                                class="block w-full p-2.5 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-white focus:ring-emerald-500 focus:border-emerald-500" 
                                placeholder="Cari penerbit..." />
                        </div>
                    </form>

                    <button type="button" data-modal-target="create-penerbit-modal" data-modal-toggle="create-penerbit-modal"
                        class="inline-flex justify-center items-center px-4 py-2.5 bg-emerald-600 hover:bg-emerald-700 text-white text-sm font-medium rounded-lg shadow-md transition duration-150 ease-in-out cursor-pointer whitespace-nowrap">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                        Tambah Penerbit
                    </button>
                </div>
            </div>

            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                <div class="overflow-x-auto">
                    <table id="data-table-penerbit" class="w-full text-sm text-left text-gray-600">
                        <thead class="text-xs text-gray-500 uppercase bg-gray-50 border-b border-gray-100">
                            <tr>
                                <th scope="col" class="px-6 py-4 font-semibold w-[5%]">No</th>
                                <th scope="col" class="px-6 py-4 font-semibold w-[25%]">Nama Penerbit</th>
                                <th scope="col" class="px-6 py-4 font-semibold w-[35%]">Alamat</th>
                                <th scope="col" class="px-6 py-4 font-semibold w-[20%]">Telepon</th>
                                <th scope="col" class="px-6 py-4 font-semibold text-center w-[15%]">Aksi</th>
                            </tr>
                        </thead>

                        <tbody class="divide-y divide-gray-100">
                            @forelse ($allpenerbit as $key => $r)
                            <tr class="hover:bg-gray-50 transition duration-150">
                                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">{{ $key + 1 }}</td>
                                <td class="px-6 py-4 font-bold text-gray-900">
                                    {{ $r->nama_penerbit }}
                                </td>
                                <td class="px-6 py-4 truncate max-w-xs text-gray-500" title="{{ $r->alamat }}">
                                    {{ $r->alamat }}
                                </td>
                                <td class="px-6 py-4">
                                    <span class="px-2.5 py-0.5 rounded-full text-xs font-medium bg-emerald-50 text-emerald-700 border border-emerald-100">
                                        {{ $r->telepon }}
                                    </span>
                                </td>
                                
                                <td class="px-6 py-4 text-center">
                                    <div class="flex justify-center items-center gap-2">
                                        
                                        <button type="button" 
                                            data-modal-target="show-penerbit-modal-{{ $r->id }}" 
                                            data-modal-toggle="show-penerbit-modal-{{ $r->id }}"
                                            class="p-2 text-blue-600 hover:bg-blue-50 rounded-lg transition" title="Detail">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                                        </button>

                                        <button type="button" 
                                            data-modal-target="edit-penerbit-modal-{{ $r->id }}" 
                                            data-modal-toggle="edit-penerbit-modal-{{ $r->id }}"
                                            class="p-2 text-emerald-600 hover:bg-emerald-50 rounded-lg transition" title="Edit">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                                        </button>

                                        <form action="{{ route('penerbit.destroy', $r->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Yakin ingin menghapus penerbit: {{ $r->nama_penerbit }}?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="p-2 text-red-600 hover:bg-red-50 rounded-lg transition" title="Hapus">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                            </button>
                                        </form>
                                    </div>

                                    @include('penerbit.edit')
                                    @include('penerbit.show')
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="px-6 py-8 text-center text-gray-400">
                                    <div class="flex flex-col items-center">
                                        <svg class="w-12 h-12 mb-3 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                                        <p class="mb-1">Tidak ada data ditemukan.</p>
                                        @if(request('search'))
                                            <p class="text-xs text-gray-400">Untuk kata kunci "{{ request('search') }}"</p>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </main>

        @include('penerbit.create')
        @include('layout.footer')
        
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
</body>
</html>
