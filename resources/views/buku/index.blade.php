<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Buku | Toko Buku</title>
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
                    <h1 class="text-3xl font-bold text-gray-900">Inventaris Toko Buku</h1>
                    <p class="text-gray-500 mt-1">Kelola stok buku, harga, dan katalog produk.</p>
                </div>

                <div class="flex flex-col md:flex-row gap-3 w-full md:w-auto">

                    <form action="{{ route('buku.index') }}" method="GET" class="w-full md:w-64">
                        <div class="relative">
                            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                </svg>
                            </div>
                            <input type="search" name="search" value="{{ request('search') }}"
                                class="block w-full p-2.5 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-white focus:ring-blue-500 focus:border-blue-500"
                                placeholder="Cari Judul / SKU..." />
                        </div>
                    </form>

                    <button type="button" data-modal-target="create-buku-modal" data-modal-toggle="create-buku-modal"
                        class="inline-flex justify-center items-center px-4 py-2.5 bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium rounded-lg shadow-md transition duration-150 ease-in-out cursor-pointer whitespace-nowrap">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                        </svg>
                        Tambah Stok Buku
                    </button>
                </div>
            </div>

            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                <div class="overflow-x-auto">
                    <table id="data-table-buku" class="w-full text-sm text-left text-gray-600">
                        <thead class="text-xs text-gray-500 uppercase bg-gray-50 border-b border-gray-100">
                            <tr>
                                <th scope="col" class="px-6 py-4 font-semibold w-[5%]">No</th>
                                <th scope="col" class="px-6 py-4 font-semibold w-[25%]">Info Buku</th>
                                <th scope="col" class="px-6 py-4 font-semibold w-[15%]">Kategori</th>
                                <th scope="col" class="px-6 py-4 font-semibold w-[15%]">Penerbit</th>
                                <th scope="col" class="px-6 py-4 font-semibold w-[10%]">Stok</th> <th scope="col" class="px-6 py-4 font-semibold text-center w-[15%]">Aksi</th>
                            </tr>
                        </thead>

                        <tbody class="divide-y divide-gray-100">
                            @forelse ($allbuku as $key => $r)
                            <tr class="hover:bg-gray-50 transition duration-150">
                                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">{{ $key + 1 }}</td>
                                
                                {{-- Kolom Info Buku Digabung (Judul + Pengarang) --}}
                                <td class="px-6 py-4">
                                    <div class="font-bold text-gray-900 text-base">{{ $r->judul_buku }}</div>
                                    <div class="text-xs text-gray-500 mt-0.5">Penulis: {{ $r->pengarang }}</div>
                                    <div class="text-xs text-gray-400">Tahun: {{ $r->tahun_terbit }}</div>
                                </td>

                                <td class="px-6 py-4">
                                    <span class="px-2.5 py-0.5 rounded-full text-xs font-medium bg-amber-50 text-amber-700 border border-amber-100">
                                        {{ $r->kategori?->nama_kategori ?? '-' }}
                                    </span>
                                </td>

                                <td class="px-6 py-4">
                                    <span class="px-2.5 py-0.5 rounded-full text-xs font-medium bg-emerald-50 text-emerald-700 border border-emerald-100">
                                        {{ $r->penerbit?->nama_penerbit ?? '-' }}
                                    </span>
                                </td>

                                {{-- KOLOM STOK --}}
                                <td class="px-6 py-4">
                                    @if($r->stok > 10)
                                        <div class="flex items-center">
                                            <span class="w-2.5 h-2.5 bg-green-500 rounded-full mr-2"></span>
                                            <span class="font-medium text-gray-900">{{ $r->stok }} Pcs</span>
                                        </div>
                                    @elseif($r->stok > 0)
                                        <div class="flex items-center">
                                            <span class="w-2.5 h-2.5 bg-yellow-400 rounded-full mr-2 animate-pulse"></span>
                                            <span class="font-medium text-yellow-700">{{ $r->stok }} Pcs (Tipis)</span>
                                        </div>
                                    @else
                                        <div class="flex items-center">
                                            <span class="w-2.5 h-2.5 bg-red-500 rounded-full mr-2"></span>
                                            <span class="font-medium text-red-600">Habis</span>
                                        </div>
                                    @endif
                                </td>

                                <td class="px-6 py-4 text-center">
                                    <div class="flex justify-center items-center gap-2">

                                        <a href="{{ route('buku.show', $r->id) }}"
                                            class="p-2 text-blue-600 hover:bg-blue-50 rounded-lg transition" title="Detail">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                            </svg>
                                        </a>

                                        <button type="button"
                                            data-modal-target="edit-buku-modal-{{ $r->id }}"
                                            data-modal-toggle="edit-buku-modal-{{ $r->id }}"
                                            class="p-2 text-amber-600 hover:bg-amber-50 rounded-lg transition" title="Edit">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                            </svg>
                                        </button>

                                        {{-- Tombol Hapus (Trigger Modal Component) --}}
                                        <button type="button" 
                                            data-modal-target="delete-modal-{{ $r->id }}" 
                                            data-modal-toggle="delete-modal-{{ $r->id }}"
                                            class="p-2 text-red-600 hover:bg-red-100 rounded-lg transition" title="Hapus">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                        </button>
                                    </div>

                                    @include('buku.edit')
                                    
                                    {{-- Component Modal Hapus --}}
                                    @include('components.delete-modal', [
                                        'id' => $r->id,
                                        'action' => route('buku.destroy', $r->id)
                                    ])
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="px-6 py-8 text-center text-gray-400">
                                    <div class="flex flex-col items-center">
                                        <svg class="w-12 h-12 mb-3 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                        </svg>
                                        <p class="mb-1">Stok buku kosong / Data tidak ditemukan.</p>
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

        @include('layout.footer')

    </div>

    <div id="create-buku-modal" tabindex="-1" aria-hidden="true" 
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full bg-black/50 backdrop-blur-sm transition-all">
        <div class="relative p-4 w-full max-w-2xl max-h-full mx-auto mt-10">
            <div class="relative bg-white border border-gray-100 rounded-xl shadow-2xl p-6 md:p-8 text-left">
                <div class="flex items-center justify-between border-b border-gray-100 pb-5 mb-5">
                    <h3 class="text-xl font-bold text-gray-800">Tambah Stok Buku Baru</h3>
                    <button type="button" onclick="closeModal('create-buku-modal')" class="text-gray-400 bg-transparent hover:bg-gray-100 hover:text-gray-900 rounded-lg text-sm w-8 h-8 inline-flex justify-center items-center transition">
                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                    </button>
                </div>
                <form action="{{ route('buku.store') }}" method="POST">
                    @csrf
                    
                    <div class="grid gap-6 grid-cols-2 mb-6">
                        <div class="col-span-2">
                            <label class="block mb-2 text-sm font-semibold text-gray-700">Judul Buku</label>
                            <input type="text" name="judul_buku" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Contoh: Harry Potter" required>
                        </div>
                        <div class="col-span-2">
                            <label class="block mb-2 text-sm font-semibold text-gray-700">Pengarang</label>
                            <input type="text" name="pengarang" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Nama Penulis" required>
                        </div>
                        
                        <div class="col-span-2 sm:col-span-1">
                            <label class="block mb-2 text-sm font-semibold text-gray-700">Tahun Terbit</label>
                            <input type="number" name="tahun_terbit" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="2024" required>
                        </div>
                        <div class="col-span-2 sm:col-span-1">
                            <label class="block mb-2 text-sm font-semibold text-gray-700">Jumlah Stok</label>
                            <input type="number" name="stok" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="0" min="0" required>
                        </div>

                        <div class="col-span-2 sm:col-span-1">
                            <label class="block mb-2 text-sm font-semibold text-gray-700">Penerbit</label>
                            <select name="penerbit_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                                <option value="" disabled selected>Pilih Penerbit</option>
                                @foreach ($penerbit as $p)
                                    <option value="{{ $p->id }}">{{ $p->nama_penerbit }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-span-2 sm:col-span-1">
                            <label class="block mb-2 text-sm font-semibold text-gray-700">Kategori</label>
                            <select name="kategori_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                                <option value="" disabled selected>Pilih Kategori</option>
                                @foreach ($kategori as $k)
                                    <option value="{{ $k->id }}">{{ $k->nama_kategori }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="flex items-center justify-end space-x-3 pt-4 border-t border-gray-100">
                        <button type="button" onclick="closeModal('create-buku-modal')" class="px-5 py-2.5 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 focus:outline-none transition">Batal</button>
                        <button type="submit" class="px-5 py-2.5 text-sm font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 transition shadow-lg shadow-blue-500/30">Simpan Produk</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
    <script>
        // Fungsi Manual untuk Buka/Tutup Modal (Jika data-attributes flowbite tidak respon di dynamic content)
        function openModal(modalId) {
            const modal = document.getElementById(modalId);
            if (modal) {
                modal.classList.remove('hidden');
                modal.classList.add('flex');
                document.body.style.overflow = 'hidden';
            }
        }

        function closeModal(modalId) {
            const modal = document.getElementById(modalId);
            if (modal) {
                modal.classList.add('hidden');
                modal.classList.remove('flex');
                document.body.style.overflow = 'auto';
            }
        }
    </script>
</body>

</html>