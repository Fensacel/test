<div id="edit-kategori-modal-{{ $r->id }}" tabindex="-1" aria-hidden="true" 
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    
    <div class="relative p-4 w-full max-w-md max-h-full">
        <div class="relative bg-white border border-gray-200 rounded-lg shadow-sm p-4 md:p-6 text-left">
            
            <div class="flex items-center justify-between border-b border-gray-200 pb-4 md:pb-5">
                <h3 class="text-lg font-medium text-gray-900">Edit Kategori</h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-9 h-9 ms-auto inline-flex justify-center items-center" data-modal-hide="edit-kategori-modal-{{ $r->id }}">
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18 17.94 6M18 18 6.06 6"/>
                    </svg>
                    <span class="sr-only">Tutup modal</span>
                </button>
            </div>

            <form action="{{ route('kategori.update', $r->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="grid gap-4 mb-4 grid-cols-2 py-4">
                    <div class="col-span-2">
                        <label for="nama_kategori_{{ $r->id }}" class="block mb-2 text-sm font-medium text-gray-900">Nama Kategori</label>
                        <input type="text" name="nama_kategori" id="nama_kategori_{{ $r->id }}" value="{{ $r->nama_kategori }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5" required>
                    </div>
                </div>
                
                <div class="flex items-center space-x-4 border-t border-gray-200 pt-4">
                    <button type="submit" class="text-white bg-green-600 hover:bg-green-700 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Update</button>
                    <button data-modal-hide="edit-kategori-modal-{{ $r->id }}" type="button" class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-5 py-2.5 hover:text-blue-700">Batal</button>
                </div>
            </form>
        </div>
    </div>
</div>