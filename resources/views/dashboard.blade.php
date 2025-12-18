<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | Manajemen Buku</title>
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
                    <h1 class="text-3xl font-bold text-gray-900">Dashboard</h1>
                    <p class="text-gray-500 mt-1">Selamat datang kembali, berikut ringkasan data perpustakaan.</p>
                </div>
                <div class="text-sm text-gray-500 bg-white px-4 py-2 rounded-lg shadow-sm border border-gray-100">
                    {{ \Carbon\Carbon::now()->translatedFormat('l, d F Y') }}
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                {{-- Total Buku --}}
                <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 flex items-center gap-4 transition hover:shadow-md">
                    <div class="p-3 bg-blue-50 text-blue-600 rounded-xl">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500 font-medium">Total Buku</p>
                        <p class="text-3xl font-bold text-gray-900">{{ $totalBuku }}</p>
                    </div>
                </div>

                {{-- Total Kategori --}}
                <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 flex items-center gap-4 transition hover:shadow-md">
                    <div class="p-3 bg-amber-50 text-amber-600 rounded-xl">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path></svg>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500 font-medium">Total Kategori</p>
                        <p class="text-3xl font-bold text-gray-900">{{ $totalKategori }}</p>
                    </div>
                </div>

                {{-- Total Penerbit --}}
                <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 flex items-center gap-4 transition hover:shadow-md">
                    <div class="p-3 bg-emerald-50 text-emerald-600 rounded-xl">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500 font-medium">Total Penerbit</p>
                        <p class="text-3xl font-bold text-gray-900">{{ $totalPenerbit }}</p>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-10">
                
                <div class="lg:col-span-2">
                    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                        <div class="p-6 border-b border-gray-100 flex justify-between items-center">
                            <h2 class="text-lg font-bold text-gray-900">📚 Buku Terbaru</h2>
                            <a href="{{ route('buku.index') }}" class="text-sm text-blue-600 hover:text-blue-700 font-medium">Lihat Semua &rarr;</a>
                        </div>
                        <div class="overflow-x-auto">
                            <table class="w-full text-left text-sm text-gray-600">
                                <thead class="bg-gray-50 text-xs uppercase text-gray-500 font-semibold">
                                    <tr>
                                        <th class="px-6 py-4">Judul Buku</th>
                                        <th class="px-6 py-4 hidden sm:table-cell">Pengarang</th>
                                        <th class="px-6 py-4 text-right">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-100">
                                    @forelse ($bukuTerbaru as $buku)
                                    <tr class="hover:bg-gray-50 transition">
                                        <td class="px-6 py-4">
                                            <div class="font-medium text-gray-900">{{ $buku->judul_buku }}</div>
                                            <div class="text-xs text-gray-400 sm:hidden">{{ $buku->pengarang }}</div>
                                        </td>
                                        <td class="px-6 py-4 hidden sm:table-cell">
                                            {{ $buku->pengarang }}
                                        </td>
                                        <td class="px-6 py-4 text-right">
                                            <button onclick="openModal('show-buku-dash-{{ $buku->id }}')" 
                                                class="inline-flex items-center px-3 py-1 bg-blue-50 text-blue-600 rounded-full text-xs font-medium hover:bg-blue-100 transition cursor-pointer">
                                                Detail
                                            </button>

                                            <div id="show-buku-dash-{{ $buku->id }}" tabindex="-1" aria-hidden="true" 
                                                class="hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full h-full bg-black/50 backdrop-blur-sm">
                                                
                                                <div class="relative p-4 w-full max-w-md max-h-full m-auto mt-20">
                                                    <div class="relative bg-white rounded-xl shadow-2xl border border-gray-100 p-6 text-left">
                                                        
                                                        <div class="flex items-center justify-between border-b border-gray-100 pb-4 mb-4">
                                                            <h3 class="text-xl font-bold text-gray-900">Detail Buku</h3>
                                                            <button type="button" onclick="closeModal('show-buku-dash-{{ $buku->id }}')" class="text-gray-400 hover:text-gray-900">
                                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                                                            </button>
                                                        </div>

                                                        <div class="space-y-4">
                                                            <div>
                                                                <label class="text-xs font-semibold text-gray-500 uppercase">Judul Buku</label>
                                                                <p class="text-gray-900 font-medium">{{ $buku->judul_buku }}</p>
                                                            </div>
                                                            <div>
                                                                <label class="text-xs font-semibold text-gray-500 uppercase">Pengarang</label>
                                                                <p class="text-gray-900">{{ $buku->pengarang }}</p>
                                                            </div>
                                                            <div class="grid grid-cols-2 gap-4">
                                                                <div>
                                                                    <label class="text-xs font-semibold text-gray-500 uppercase">Tahun</label>
                                                                    <p class="text-gray-900">{{ $buku->tahun_terbit }}</p>
                                                                </div>
                                                                <div>
                                                                    <label class="text-xs font-semibold text-gray-500 uppercase">Kategori</label>
                                                                    <span class="bg-amber-100 text-amber-800 text-xs px-2 py-1 rounded-full">
                                                                        {{ $buku->kategori->nama_kategori ?? '-' }}
                                                                    </span>
                                                                </div>
                                                            </div>
                                                            <div>
                                                                <label class="text-xs font-semibold text-gray-500 uppercase">Penerbit</label>
                                                                <p class="text-gray-900">{{ $buku->penerbit->nama_penerbit ?? '-' }}</p>
                                                            </div>
                                                        </div>

                                                        <div class="mt-6 flex justify-end">
                                                            <button type="button" onclick="closeModal('show-buku-dash-{{ $buku->id }}')" class="px-4 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200">Tutup</button>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="3" class="px-6 py-8 text-center text-gray-400">Belum ada data buku.</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="lg:col-span-1">
                    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
                        <h2 class="text-lg font-bold text-gray-900 mb-4">⚡ Akses Cepat</h2>
                        <div class="space-y-3">
                            
                            <button onclick="openModal('create-buku-modal')" class="w-full group flex items-center justify-between p-4 rounded-xl border border-gray-200 hover:border-blue-500 hover:bg-blue-50 transition cursor-pointer text-left">
                                <div class="flex items-center gap-3">
                                    <div class="w-10 h-10 rounded-full bg-blue-100 flex items-center justify-center text-blue-600 group-hover:bg-blue-600 group-hover:text-white transition">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                                    </div>
                                    <div>
                                        <p class="font-semibold text-gray-900">Tambah Buku</p>
                                        <p class="text-xs text-gray-500">Input data buku baru</p>
                                    </div>
                                </div>
                                <svg class="w-5 h-5 text-gray-400 group-hover:text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                            </button>

                            <button onclick="openModal('create-kategori-modal')" class="w-full group flex items-center justify-between p-4 rounded-xl border border-gray-200 hover:border-amber-500 hover:bg-amber-50 transition cursor-pointer text-left">
                                <div class="flex items-center gap-3">
                                    <div class="w-10 h-10 rounded-full bg-amber-100 flex items-center justify-center text-amber-600 group-hover:bg-amber-500 group-hover:text-white transition">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path></svg>
                                    </div>
                                    <div>
                                        <p class="font-semibold text-gray-900">Tambah Kategori</p>
                                        <p class="text-xs text-gray-500">Kelola kategori buku</p>
                                    </div>
                                </div>
                                <svg class="w-5 h-5 text-gray-400 group-hover:text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                            </button>

                            <button onclick="openModal('create-penerbit-modal')" class="w-full group flex items-center justify-between p-4 rounded-xl border border-gray-200 hover:border-emerald-500 hover:bg-emerald-50 transition cursor-pointer text-left">
                                <div class="flex items-center gap-3">
                                    <div class="w-10 h-10 rounded-full bg-emerald-100 flex items-center justify-center text-emerald-600 group-hover:bg-emerald-500 group-hover:text-white transition">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                                    </div>
                                    <div>
                                        <p class="font-semibold text-gray-900">Tambah Penerbit</p>
                                        <p class="text-xs text-gray-500">Data penerbit baru</p>
                                    </div>
                                </div>
                                <svg class="w-5 h-5 text-gray-400 group-hover:text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                            </button>

                        </div>
                    </div>
                </div>

            </div>

        </main>

        @include('layout.footer')

    </div> <div id="create-buku-modal" tabindex="-1" aria-hidden="true" 
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full bg-black/50 backdrop-blur-sm transition-all">
    
        <div class="relative p-4 w-full max-w-2xl max-h-full mx-auto mt-10">
            <div class="relative bg-white border border-gray-100 rounded-xl shadow-2xl p-6 md:p-8 text-left">
                
                <div class="flex items-center justify-between border-b border-gray-100 pb-5 mb-5">
                    <h3 class="text-xl font-bold text-gray-800">Buat Buku Baru</h3>
                    <button type="button" onclick="closeModal('create-buku-modal')" class="text-gray-400 bg-transparent hover:bg-gray-100 hover:text-gray-900 rounded-lg text-sm w-8 h-8 inline-flex justify-center items-center transition">
                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                    </button>
                </div>

                <form action="{{ route('buku.store') }}" method="POST">
                    @csrf
                    <div class="grid gap-6 grid-cols-2 mb-6">
                        <div class="col-span-2">
                            <label class="block mb-2 text-sm font-semibold text-gray-700">Judul Buku</label>
                            <input type="text" name="judul_buku" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Masukkan judul buku" required>
                        </div>
                        <div class="col-span-2">
                            <label class="block mb-2 text-sm font-semibold text-gray-700">Pengarang</label>
                            <input type="text" name="pengarang" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Nama pengarang" required>
                        </div>
                        <div class="col-span-2 sm:col-span-1">
                            <label class="block mb-2 text-sm font-semibold text-gray-700">Tahun Terbit</label>
                            <input type="number" name="tahun_terbit" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="2024" required>
                        </div>
                        <div class="hidden sm:block col-span-1"></div>
                        <div class="col-span-2 sm:col-span-1">
                            <label class="block mb-2 text-sm font-semibold text-gray-700">Penerbit</label>
                            <select name="penerbit_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                                <option value="" disabled selected>Pilih Penerbit</option>
                                @if(isset($allpenerbit))
                                    @foreach ($allpenerbit as $p)
                                        <option value="{{ $p->id }}">{{ $p->nama_penerbit }}</option>
                                    @endforeach
                                @elseif(isset($penerbit))
                                    @foreach ($penerbit as $p)
                                        <option value="{{ $p->id }}">{{ $p->nama_penerbit }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                        <div class="col-span-2 sm:col-span-1">
                            <label class="block mb-2 text-sm font-semibold text-gray-700">Kategori</label>
                            <select name="kategori_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                                <option value="" disabled selected>Pilih Kategori</option>
                                @if(isset($allkategori))
                                    @foreach ($allkategori as $k)
                                        <option value="{{ $k->id }}">{{ $k->nama_kategori }}</option>
                                    @endforeach
                                @elseif(isset($kategori))
                                    @foreach ($kategori as $k)
                                        <option value="{{ $k->id }}">{{ $k->nama_kategori }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                    </div>
                    <div class="flex items-center justify-end space-x-3 pt-4 border-t border-gray-100">
                        <button type="button" onclick="closeModal('create-buku-modal')" class="px-5 py-2.5 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 focus:outline-none transition">Batal</button>
                        <button type="submit" class="px-5 py-2.5 text-sm font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 transition shadow-lg shadow-blue-500/30">Simpan Buku</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div id="create-kategori-modal" tabindex="-1" aria-hidden="true" 
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full bg-black/50 backdrop-blur-sm">
        
        <div class="relative p-4 w-full max-w-md max-h-full mx-auto mt-20">
            <div class="relative bg-white border border-gray-100 rounded-xl shadow-2xl p-6 text-left">
                <div class="flex items-center justify-between border-b border-gray-100 pb-4 mb-4">
                    <h3 class="text-xl font-bold text-gray-800">Buat Kategori Baru</h3>
                    <button type="button" onclick="closeModal('create-kategori-modal')" class="text-gray-400 bg-transparent hover:bg-gray-100 hover:text-gray-900 rounded-lg text-sm w-8 h-8 inline-flex justify-center items-center">
                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                    </button>
                </div>
                <form action="{{ route('kategori.store') }}" method="POST">
                    @csrf
                    <div class="mb-6">
                        <label class="block mb-2 text-sm font-semibold text-gray-700">Nama Kategori</label>
                        <input type="text" name="nama_kategori" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-amber-500 focus:border-amber-500 block w-full p-2.5" placeholder="Masukkan nama kategori" required>
                    </div>
                    <div class="flex items-center justify-end space-x-3 pt-2">
                        <button type="button" onclick="closeModal('create-kategori-modal')" class="px-5 py-2.5 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50">Batal</button>
                        <button type="submit" class="px-5 py-2.5 text-sm font-medium text-white bg-amber-500 rounded-lg hover:bg-amber-600 focus:ring-4 focus:ring-amber-300 shadow-lg shadow-amber-500/30">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div id="create-penerbit-modal" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full bg-black/50 backdrop-blur-sm">

        <div class="relative p-4 w-full max-w-md max-h-full mx-auto mt-10">
            <div class="relative bg-white border border-gray-100 rounded-xl shadow-2xl p-6 text-left">
                <div class="flex items-center justify-between border-b border-gray-100 pb-4 mb-4">
                    <h3 class="text-xl font-bold text-gray-800">Buat Penerbit Baru</h3>
                    <button type="button" onclick="closeModal('create-penerbit-modal')" class="text-gray-400 bg-transparent hover:bg-gray-100 hover:text-gray-900 rounded-lg text-sm w-8 h-8 inline-flex justify-center items-center">
                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                    </button>
                </div>
                <form action="{{ route('penerbit.store') }}" method="POST">
                    @csrf
                    <div class="grid gap-4 grid-cols-2 mb-6">
                        <div class="col-span-2">
                            <label class="block mb-2 text-sm font-semibold text-gray-700">Nama Penerbit</label>
                            <input type="text" name="nama_penerbit" value="{{ old('nama_penerbit') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-emerald-500 focus:border-emerald-500 block w-full p-2.5" placeholder="Masukkan nama penerbit" required>
                        </div>
                        <div class="col-span-2">
                            <label class="block mb-2 text-sm font-semibold text-gray-700">Nomor Telepon</label>
                            <input type="text" name="telepon" value="{{ old('telepon') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-emerald-500 focus:border-emerald-500 block w-full p-2.5" placeholder="0812..." required>
                        </div>
                        <div class="col-span-2">
                            <label class="block mb-2 text-sm font-semibold text-gray-700">Alamat Penerbit</label>
                            <textarea name="alamat" rows="3" class="block bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-emerald-500 focus:border-emerald-500 w-full p-2.5" placeholder="Alamat lengkap..." required>{{ old('alamat') }}</textarea>
                        </div>
                    </div>
                    <div class="flex items-center justify-end space-x-3 pt-2">
                        <button type="button" onclick="closeModal('create-penerbit-modal')" class="px-5 py-2.5 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50">Batal</button>
                        <button type="submit" class="px-5 py-2.5 text-sm font-medium text-white bg-emerald-500 rounded-lg hover:bg-emerald-600 focus:ring-4 focus:ring-emerald-300 shadow-lg shadow-emerald-500/30">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
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