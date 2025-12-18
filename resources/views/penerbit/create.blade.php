<div id="create-penerbit-modal" tabindex="-1" aria-hidden="true" 
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    
    <div class="relative p-4 w-full max-w-md max-h-full">
        <div class="relative bg-white rounded-xl shadow-2xl border border-gray-100 p-4 md:p-6 text-left">
            
            <div class="flex items-center justify-between border-b border-gray-100 pb-4 md:pb-5 mb-4">
                <h3 class="text-xl font-bold text-gray-900">Buat Penerbit Baru</h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-100 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-hide="create-penerbit-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Tutup modal</span>
                </button>
            </div>

            <form action="{{ route('penerbit.store') }}" method="POST">
                @csrf
                <div class="grid gap-5 grid-cols-2 mb-6">
                    <div class="col-span-2">
                        <label for="nama_penerbit" class="block mb-2 text-sm font-semibold text-gray-700">Nama Penerbit</label>
                        <input type="text" name="nama_penerbit" id="nama_penerbit" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-emerald-500 focus:border-emerald-500 block w-full p-2.5" placeholder="Masukkan nama penerbit" required>
                    </div>
                    <div class="col-span-2">
                        <label for="telepon" class="block mb-2 text-sm font-semibold text-gray-700">Nomor Telepon</label>
                        <input type="text" name="telepon" id="telepon" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-emerald-500 focus:border-emerald-500 block w-full p-2.5" placeholder="Contoh: 0812..." required>
                    </div>
                    <div class="col-span-2">
                        <label for="alamat" class="block mb-2 text-sm font-semibold text-gray-700">Alamat Penerbit</label>
                        <textarea id="alamat" name="alamat" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-emerald-500 focus:border-emerald-500" placeholder="Tulis alamat lengkap disini..." required></textarea>
                    </div>
                </div>

                <div class="flex items-center justify-end space-x-3 pt-4 border-t border-gray-100">
                    <button data-modal-hide="create-penerbit-modal" type="button" class="py-2.5 px-5 text-sm font-medium text-gray-700 focus:outline-none bg-white rounded-lg border border-gray-300 hover:bg-gray-100 focus:z-10 focus:ring-4 focus:ring-gray-100 transition">Batal</button>
                    <button type="submit" class="text-white bg-emerald-600 hover:bg-emerald-700 focus:ring-4 focus:outline-none focus:ring-emerald-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center shadow-lg shadow-emerald-500/30 transition">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>