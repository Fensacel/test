<div id="create-buku-modal" tabindex="-1" aria-hidden="true" 
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full bg-black/50 backdrop-blur-sm transition-all">
    
    <div class="relative p-4 w-full max-w-2xl max-h-full mx-auto mt-10">
        <div class="relative bg-white border border-gray-100 rounded-xl shadow-2xl p-6 md:p-8 text-left">
            
            <div class="flex items-center justify-between border-b border-gray-100 pb-5 mb-5">
                <h3 class="text-xl font-bold text-gray-900">Buat Buku Baru</h3>
                <button type="button" data-modal-hide="create-buku-modal" class="text-gray-400 bg-transparent hover:bg-gray-100 hover:text-gray-900 rounded-lg text-sm w-8 h-8 inline-flex justify-center items-center transition">
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Tutup modal</span>
                </button>
            </div>

            <form action="{{ route('buku.store') }}" method="POST">
                @csrf
                <div class="grid gap-6 grid-cols-2 mb-6">
                    
                    <div class="col-span-2">
                        <label for="judul_buku" class="block mb-2 text-sm font-semibold text-gray-900">Judul Buku</label>
                        <input type="text" name="judul_buku" id="judul_buku" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Masukkan judul buku" required>
                    </div>

                    <div class="col-span-2">
                        <label for="pengarang" class="block mb-2 text-sm font-semibold text-gray-900">Pengarang</label>
                        <input type="text" name="pengarang" id="pengarang" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Nama pengarang" required>
                    </div>

                    <div class="col-span-2 sm:col-span-1">
                        <label for="tahun_terbit" class="block mb-2 text-sm font-semibold text-gray-900">Tahun Terbit</label>
                        <input type="number" name="tahun_terbit" id="tahun_terbit" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="2024" required>
                    </div>

                    <div class="col-span-2 sm:col-span-1">
                        <label for="stok" class="block mb-2 text-sm font-semibold text-gray-900">Jumlah Stok</label>
                        <input type="number" name="stok" id="stok" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="0" min="0" required>
                    </div>

                    <div class="col-span-2 sm:col-span-1">
                        <label for="penerbit_id" class="block mb-2 text-sm font-semibold text-gray-900">Penerbit</label>
                        <select name="penerbit_id" id="penerbit_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                            <option value="" disabled selected>Pilih Penerbit</option>
                            @foreach ($penerbit as $p)
                                <option value="{{ $p->id }}">{{ $p->nama_penerbit }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-span-2 sm:col-span-1">
                        <label for="kategori_id" class="block mb-2 text-sm font-semibold text-gray-900">Kategori</label>
                        <select name="kategori_id" id="kategori_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                            <option value="" disabled selected>Pilih Kategori</option>
                            @foreach ($kategori as $k)
                                <option value="{{ $k->id }}">{{ $k->nama_kategori }}</option>
                            @endforeach
                        </select>
                    </div>

                </div>

                <div class="flex items-center justify-end space-x-3 pt-4 border-t border-gray-100">
                    <button data-modal-hide="create-buku-modal" type="button" class="px-5 py-2.5 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 focus:outline-none transition">Batal</button>
                    <button type="submit" class="px-5 py-2.5 text-sm font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 transition shadow-lg shadow-blue-500/30">Simpan Buku</button>
                </div>
            </form>
        </div>
    </div>
</div>