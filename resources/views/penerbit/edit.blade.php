<div id="edit-modal-{{ $r->id }}" tabindex="-1" aria-hidden="true" 
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    
    <div class="relative p-4 w-full max-w-md max-h-full">
        <div class="relative bg-white border border-default rounded-base shadow-sm p-4 md:p-6 text-left">
            
            <div class="flex items-center justify-between border-b border-default pb-4 md:pb-5">
                <h3 class="text-lg font-medium text-heading">
                    Edit Penerbit: {{ $r->nama_penerbit }}
                </h3>
                <button type="button" class="text-body bg-transparent hover:bg-neutral-tertiary hover:text-heading rounded-base text-sm w-9 h-9 ms-auto inline-flex justify-center items-center" data-modal-hide="edit-modal-{{ $r->id }}">
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18 17.94 6M18 18 6.06 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>

            <form action="{{ route('penerbit.update', $r->id) }}" method="POST">
                @csrf
                @method('PUT') <div class="grid gap-4 grid-cols-2 py-4 md:py-6">
                    
                    <div class="col-span-2">
                        <label for="nama_penerbit_{{ $r->id }}" class="block mb-2.5 text-sm font-medium text-heading">Nama Penerbit</label>
                        <input type="text" name="nama_penerbit" id="nama_penerbit_{{ $r->id }}" 
                            value="{{ old('nama_penerbit', $r->nama_penerbit) }}"
                            class="bg-gray-50 border border-gray-300 text-heading text-sm rounded-lg focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-sm" 
                            required>
                    </div>

                    <div class="col-span-2">
                        <label for="telepon_{{ $r->id }}" class="block mb-2.5 text-sm font-medium text-heading">Nomor Telepon</label>
                        <input type="text" name="telepon" id="telepon_{{ $r->id }}" 
                            value="{{ old('telepon', $r->telepon) }}"
                            class="bg-gray-50 border border-gray-300 text-heading text-sm rounded-lg focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-sm" 
                            required>
                    </div>

                    <div class="col-span-2">
                        <label for="alamat_{{ $r->id }}" class="block mb-2.5 text-sm font-medium text-heading">Alamat Penerbit</label>
                        <textarea id="alamat_{{ $r->id }}" name="alamat" rows="4" 
                            class="block bg-gray-50 border border-gray-300 text-heading text-sm rounded-lg focus:ring-brand focus:border-brand w-full p-3.5 shadow-sm" 
                            required>{{ old('alamat', $r->alamat) }}</textarea>
                    </div>

                </div>

                <div class="flex items-center space-x-4 border-t border-default pt-4 md:pt-6">
                    <button type="submit" class="text-white bg-green-600 hover:bg-green-700 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                        Update Data
                    </button>
                    <button data-modal-hide="edit-modal-{{ $r->id }}" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100">
                        Batal
                    </button>
                </div>

            </form>
        </div>
    </div>
</div>