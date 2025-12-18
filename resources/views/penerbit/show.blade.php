<div id="show-penerbit-modal-{{ $r->id }}" tabindex="-1" aria-hidden="true" 
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    
    <div class="relative p-4 w-full max-w-md max-h-full">
        <div class="relative bg-white rounded-xl shadow-2xl border border-gray-100 p-4 md:p-6 text-left">
            
            <div class="flex items-center justify-between border-b border-gray-100 pb-4 md:pb-5 mb-4">
                <h3 class="text-xl font-bold text-gray-900">Detail Penerbit</h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-100 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-hide="show-penerbit-modal-{{ $r->id }}">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>

            <div class="grid gap-5 grid-cols-2 mb-6">
                <div class="col-span-2">
                    <label class="block mb-2 text-sm font-semibold text-gray-500">Nama Penerbit</label>
                    <input type="text" value="{{ $r->nama_penerbit }}" readonly class="bg-gray-100 border border-gray-200 text-gray-700 text-sm rounded-lg block w-full p-2.5 cursor-not-allowed">
                </div>
                <div class="col-span-2">
                    <label class="block mb-2 text-sm font-semibold text-gray-500">Nomor Telepon</label>
                    <input type="text" value="{{ $r->telepon }}" readonly class="bg-gray-100 border border-gray-200 text-gray-700 text-sm rounded-lg block w-full p-2.5 cursor-not-allowed">
                </div>
                <div class="col-span-2">
                    <label class="block mb-2 text-sm font-semibold text-gray-500">Alamat Penerbit</label>
                    <textarea rows="4" readonly class="block p-2.5 w-full text-sm text-gray-700 bg-gray-100 rounded-lg border border-gray-200 cursor-not-allowed">{{ $r->alamat }}</textarea>
                </div>
            </div>

            <div class="flex items-center space-x-4 border-t border-gray-100 pt-4">
                <button data-modal-hide="show-penerbit-modal-{{ $r->id }}" type="button" class="w-full text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center shadow-md transition">Tutup</button>
            </div>
        </div>
    </div>
</div>