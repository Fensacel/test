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

            {{-- Total Kategori --}}
            <div class="bg-white shadow-lg rounded-xl p-6 border flex items-center justify-between">
                <div>
                    <p class="text-sm text-body uppercase font-medium">Total Kategori</p>
                    <p class="text-4xl font-bold text-yellow-600 mt-1">{{ $totalKategori }}</p>
                </div>
            </div>

            {{-- Total Penerbit --}}
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
    <button onclick="openModal('create-buku-modal')" class="bg-green-500 text-white px-4 py-2 rounded-lg shadow-md hover:bg-green-600 transition cursor-pointer">
        + Tambah Buku
    </button>
    
    <button onclick="openModal('create-kategori-modal')" class="bg-yellow-500 text-white px-4 py-2 rounded-lg shadow-md hover:bg-yellow-600 transition cursor-pointer">
        + Tambah Kategori
    </button>
    
    <button onclick="openModal('create-penerbit-modal')" class="bg-indigo-500 text-white px-4 py-2 rounded-lg shadow-md hover:bg-indigo-600 transition cursor-pointer">
        + Tambah Penerbit
    </button>
</div>

    </main>

    @include('layout.footer')

    <div id="create-buku-modal" tabindex="-1" aria-hidden="true" 
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full bg-black/50">
    
    <div class="relative p-4 w-full max-w-2xl max-h-full mx-auto mt-10">
        <div class="relative bg-white border border-default rounded-lg shadow-sm p-4 md:p-6 text-left">
            
            <div class="flex items-center justify-between border-b border-default pb-4 md:pb-5">
                <h3 class="text-lg font-medium text-heading">Buat Buku Baru</h3>
                <button type="button" onclick="closeModal('create-buku-modal')" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-9 h-9 ms-auto inline-flex justify-center items-center">
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18 17.94 6M18 18 6.06 6"/>
                    </svg>
                    <span class="sr-only">Tutup modal</span>
                </button>
            </div>

            <form action="{{ route('buku.store') }}" method="POST">
                @csrf
                <div class="grid gap-4 grid-cols-2 py-4 md:py-6">
                    
                    <div class="col-span-2">
                        <label for="judul_buku" class="block mb-2.5 text-sm font-medium text-heading">Judul Buku</label>
                        <input type="text" name="judul_buku" id="judul_buku" class="bg-gray-50 border border-gray-300 text-heading text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full px-3 py-2.5 shadow-sm" placeholder="Masukkan judul buku" required>
                    </div>

                    <div class="col-span-2">
                        <label for="pengarang" class="block mb-2.5 text-sm font-medium text-heading">Pengarang</label>
                        <input type="text" name="pengarang" id="pengarang" class="bg-gray-50 border border-gray-300 text-heading text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full px-3 py-2.5 shadow-sm" placeholder="Nama pengarang" required>
                    </div>

                    <div class="col-span-2 sm:col-span-1">
                        <label for="tahun_terbit" class="block mb-2.5 text-sm font-medium text-heading">Tahun Terbit</label>
                        <input type="number" name="tahun_terbit" id="tahun_terbit" class="bg-gray-50 border border-gray-300 text-heading text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full px-3 py-2.5 shadow-sm" placeholder="2024" required>
                    </div>

                    <div class="hidden sm:block col-span-1"></div>

                    <div class="col-span-2 sm:col-span-1">
                        <label for="penerbit_id" class="block mb-2.5 text-sm font-medium text-heading">Penerbit</label>
                        <select name="penerbit_id" id="penerbit_id" class="bg-gray-50 border border-gray-300 text-heading text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full px-3 py-2.5 shadow-sm" required>
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
                        <label for="kategori_id" class="block mb-2.5 text-sm font-medium text-heading">Kategori</label>
                        <select name="kategori_id" id="kategori_id" class="bg-gray-50 border border-gray-300 text-heading text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full px-3 py-2.5 shadow-sm" required>
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

                <div class="flex items-center space-x-4 border-t border-default pt-4 md:pt-6">
                    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Simpan Buku</button>
                    <button type="button" onclick="closeModal('create-buku-modal')" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100">Batal</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div id="create-kategori-modal" tabindex="-1" aria-hidden="true" 
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full bg-black/50">
    
    <div class="relative p-4 w-full max-w-md max-h-full mx-auto mt-20">
        <div class="relative bg-white border border-gray-200 rounded-lg shadow-sm p-4 md:p-6 text-left">
            
            <div class="flex items-center justify-between border-b border-gray-200 pb-4 md:pb-5">
                <h3 class="text-lg font-medium text-gray-900">Buat Kategori Baru</h3>
                <button type="button" onclick="closeModal('create-kategori-modal')" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-9 h-9 ms-auto inline-flex justify-center items-center">
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18 17.94 6M18 18 6.06 6"/>
                    </svg>
                    <span class="sr-only">Tutup modal</span>
                </button>
            </div>

            <form action="{{ route('kategori.store') }}" method="POST">
                @csrf
                <div class="grid gap-4 mb-4 grid-cols-2 py-4">
                    <div class="col-span-2">
                        <label for="nama_kategori" class="block mb-2 text-sm font-medium text-gray-900">Nama Kategori</label>
                        <input type="text" name="nama_kategori" id="nama_kategori" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5" placeholder="Masukkan nama kategori" required>
                    </div>
                </div>
                
                <div class="flex items-center space-x-4 border-t border-gray-200 pt-4">
                    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Simpan</button>
                    <button type="button" onclick="closeModal('create-kategori-modal')" class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-5 py-2.5 hover:text-blue-700">Batal</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div id="create-penerbit-modal" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full bg-black/50">

    <div class="relative p-4 w-full max-w-md max-h-full mx-auto mt-10">
        <div class="relative bg-white border border-default rounded-lg shadow-sm p-4 md:p-6 text-left">

            <div class="flex items-center justify-between border-b border-default pb-4 md:pb-5">
                <h3 class="text-lg font-medium text-heading">
                    Buat Penerbit Baru
                </h3>
                <button type="button" onclick="closeModal('create-penerbit-modal')" class="text-body bg-transparent hover:bg-neutral-tertiary hover:text-heading rounded-lg text-sm w-9 h-9 ms-auto inline-flex justify-center items-center">
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18 17.94 6M18 18 6.06 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>

            <form action="{{ route('penerbit.store') }}" method="POST">
                @csrf
                <div class="grid gap-4 grid-cols-2 py-4 md:py-6">

                    <div class="col-span-2">
                        <label for="nama_penerbit" class="block mb-2.5 text-sm font-medium text-heading">Nama Penerbit</label>
                        <input type="text" name="nama_penerbit" id="nama_penerbit"
                            value="{{ old('nama_penerbit') }}"
                            class="bg-gray-50 border border-gray-300 text-heading text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full px-3 py-2.5 shadow-sm"
                            placeholder="Masukkan nama penerbit" required>
                    </div>

                    <div class="col-span-2">
                        <label for="telepon" class="block mb-2.5 text-sm font-medium text-heading">Nomor Telepon</label>
                        <input type="text" name="telepon" id="telepon"
                            value="{{ old('telepon') }}"
                            class="bg-gray-50 border border-gray-300 text-heading text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full px-3 py-2.5 shadow-sm"
                            placeholder="0812..." required>
                    </div>

                    <div class="col-span-2">
                        <label for="alamat" class="block mb-2.5 text-sm font-medium text-heading">Alamat Penerbit</label>
                        <textarea id="alamat" name="alamat" rows="4"
                            class="block bg-gray-50 border border-gray-300 text-heading text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 w-full p-3.5 shadow-sm"
                            placeholder="Tulis alamat lengkap disini" required>{{ old('alamat') }}</textarea>
                    </div>

                </div>

                <div class="flex items-center space-x-4 border-t border-default pt-4 md:pt-6">
                    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                        Simpan
                    </button>
                    <button type="button" onclick="closeModal('create-penerbit-modal')" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100">
                        Batal
                    </button>
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
            modal.classList.add('flex'); // Agar posisi center berfungsi
        }
    }

    function closeModal(modalId) {
        const modal = document.getElementById(modalId);
        if (modal) {
            modal.classList.add('hidden');
            modal.classList.remove('flex');
        }
    }
</script>

</body>

</html>