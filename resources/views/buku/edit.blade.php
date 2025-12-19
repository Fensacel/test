<div id="edit-buku-modal-{{ $r->id }}" tabindex="-1" aria-hidden="true" 
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full bg-black/50 backdrop-blur-sm transition-all">
    
    <div class="relative p-4 w-full max-w-2xl max-h-full mx-auto mt-10">
        <div class="relative bg-white border border-gray-100 rounded-xl shadow-2xl p-6 md:p-8 text-left">
            
            <div class="flex items-center justify-between border-b border-gray-100 pb-5 mb-5">
                <h3 class="text-xl font-bold text-gray-900">Edit Buku: {{ $r->judul_buku }}</h3>
                <button type="button" data-modal-hide="edit-buku-modal-{{ $r->id }}" class="text-gray-400 bg-transparent hover:bg-gray-100 hover:text-gray-900 rounded-lg text-sm w-8 h-8 inline-flex justify-center items-center transition">
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Tutup modal</span>
                </button>
            </div>

            <form action="{{ route('buku.update', $r->id) }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="grid gap-6 grid-cols-2 mb-6">
                    
                    <div class="col-span-2">
                        <label for="judul_buku_{{ $r->id }}" class="block mb-2 text-sm font-semibold text-gray-900">Judul Buku</label>
                        <input type="text" name="judul_buku" id="judul_buku_{{ $r->id }}" value="{{ $r->judul_buku }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-amber-500 focus:border-amber-500 block w-full p-2.5" required>
                    </div>

                    <div class="col-span-2">
                        <label for="pengarang_{{ $r->id }}" class="block mb-2 text-sm font-semibold text-gray-900">Pengarang</label>
                        <input type="text" name="pengarang" id="pengarang_{{ $r->id }}" value="{{ $r->pengarang }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-amber-500 focus:border-amber-500 block w-full p-2.5" required>
                    </div>

                    <div class="col-span-2 sm:col-span-1">
                        <label for="tahun_terbit_{{ $r->id }}" class="block mb-2 text-sm font-semibold text-gray-900">Tahun Terbit</label>
                        <input type="number" name="tahun_terbit" id="tahun_terbit_{{ $r->id }}" value="{{ $r->tahun_terbit }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-amber-500 focus:border-amber-500 block w-full p-2.5" required>
                    </div>

                    <div class="col-span-2 sm:col-span-1">
                        <label for="stok_{{ $r->id }}" class="block mb-2 text-sm font-semibold text-gray-900">Jumlah Stok</label>
                        <input type="number" name="stok" id="stok_{{ $r->id }}" value="{{ $r->stok }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-amber-500 focus:border-amber-500 block w-full p-2.5" min="0" required>
                    </div>

                    <div class="col-span-2 sm:col-span-1">
                        <label for="penerbit_id_{{ $r->id }}" class="block mb-2 text-sm font-semibold text-gray-900">Penerbit</label>
                        <select name="penerbit_id" id="penerbit_id_{{ $r->id }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-amber-500 focus:border-amber-500 block w-full p-2.5" required>
                            <option value="" disabled>Pilih Penerbit</option>
                            @foreach ($penerbit as $p)
                                <option value="{{ $p->id }}" {{ $p->id == $r->penerbit_id ? 'selected' : '' }}>{{ $p->nama_penerbit }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-span-2 sm:col-span-1">
                        <label for="kategori_id_{{ $r->id }}" class="block mb-2 text-sm font-semibold text-gray-900">Kategori</label>
                        <select name="kategori_id" id="kategori_id_{{ $r->id }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-amber-500 focus:border-amber-500 block w-full p-2.5" required>
                            <option value="" disabled>Pilih Kategori</option>
                            @foreach ($kategori as $k)
                                <option value="{{ $k->id }}" {{ $k->id == $r->kategori_id ? 'selected' : '' }}>{{ $k->nama_kategori }}</option>
                            @endforeach
                        </select>
                    </div>

                </div>

                <div class="flex items-center justify-end space-x-3 pt-4 border-t border-gray-100">
                    <button data-modal-hide="edit-buku-modal-{{ $r->id }}" type="button" class="px-5 py-2.5 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 focus:outline-none transition">Batal</button>
                    <button type="submit" class="px-5 py-2.5 text-sm font-medium text-white bg-amber-500 rounded-lg hover:bg-amber-600 focus:ring-4 focus:ring-amber-300 transition shadow-lg shadow-amber-500/30">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>
</div>