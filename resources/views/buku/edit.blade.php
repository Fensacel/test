<div id="edit-buku-modal-{{ $r->id }}" tabindex="-1" aria-hidden="true" 
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    
    <div class="relative p-4 w-full max-w-2xl max-h-full">
        <div class="relative bg-white border border-default rounded-base shadow-sm p-4 md:p-6 text-left">
            
            <div class="flex items-center justify-between border-b border-default pb-4 md:pb-5">
                <h3 class="text-lg font-medium text-heading">Edit Buku: {{ $r->judul_buku }}</h3>
                <button type="button" class="text-body bg-transparent hover:bg-neutral-tertiary hover:text-heading rounded-base text-sm w-9 h-9 ms-auto inline-flex justify-center items-center" data-modal-hide="edit-buku-modal-{{ $r->id }}">
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18 17.94 6M18 18 6.06 6"/>
                    </svg>
                    <span class="sr-only">Tutup modal</span>
                </button>
            </div>

            <form action="{{ route('buku.update', $r->id) }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="grid gap-4 grid-cols-2 py-4 md:py-6">
                    
                    <div class="col-span-2">
                        <label for="judul_buku_{{ $r->id }}" class="block mb-2.5 text-sm font-medium text-heading">Judul Buku</label>
                        <input type="text" name="judul_buku" id="judul_buku_{{ $r->id }}" value="{{ $r->judul_buku }}" class="bg-gray-50 border border-gray-300 text-heading text-sm rounded-lg focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-sm" required>
                    </div>

                    <div class="col-span-2">
                        <label for="pengarang_{{ $r->id }}" class="block mb-2.5 text-sm font-medium text-heading">Pengarang</label>
                        <input type="text" name="pengarang" id="pengarang_{{ $r->id }}" value="{{ $r->pengarang }}" class="bg-gray-50 border border-gray-300 text-heading text-sm rounded-lg focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-sm" required>
                    </div>

                    <div class="col-span-2 sm:col-span-1">
                        <label for="tahun_terbit_{{ $r->id }}" class="block mb-2.5 text-sm font-medium text-heading">Tahun Terbit</label>
                        <input type="number" name="tahun_terbit" id="tahun_terbit_{{ $r->id }}" value="{{ $r->tahun_terbit }}" class="bg-gray-50 border border-gray-300 text-heading text-sm rounded-lg focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-sm" required>
                    </div>

                    <div class="hidden sm:block col-span-1"></div>

                    <div class="col-span-2 sm:col-span-1">
                        <label for="penerbit_id_{{ $r->id }}" class="block mb-2.5 text-sm font-medium text-heading">Penerbit</label>
                        <select name="penerbit_id" id="penerbit_id_{{ $r->id }}" class="bg-gray-50 border border-gray-300 text-heading text-sm rounded-lg focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-sm" required>
                            <option value="" disabled>Pilih Penerbit</option>
                            @foreach ($penerbit as $p)
                                <option value="{{ $p->id }}" {{ $p->id == $r->penerbit_id ? 'selected' : '' }}>{{ $p->nama_penerbit }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-span-2 sm:col-span-1">
                        <label for="kategori_id_{{ $r->id }}" class="block mb-2.5 text-sm font-medium text-heading">Kategori</label>
                        <select name="kategori_id" id="kategori_id_{{ $r->id }}" class="bg-gray-50 border border-gray-300 text-heading text-sm rounded-lg focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-sm" required>
                            <option value="" disabled>Pilih Kategori</option>
                            @foreach ($kategori as $k)
                                <option value="{{ $k->id }}" {{ $k->id == $r->kategori_id ? 'selected' : '' }}>{{ $k->nama_kategori }}</option>
                            @endforeach
                        </select>
                    </div>

                </div>

                <div class="flex items-center space-x-4 border-t border-default pt-4 md:pt-6">
                    <button type="submit" class="text-white bg-green-600 hover:bg-green-700 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Update Buku</button>
                    <button data-modal-hide="edit-buku-modal-{{ $r->id }}" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100">Batal</button>
                </div>
            </form>
        </div>
    </div>
</div>