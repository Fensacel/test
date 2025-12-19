<div id="delete-modal-{{ $id }}" tabindex="-1" aria-hidden="true" 
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-screen max-h-full bg-black/50 backdrop-blur-sm">
    
    <div class="relative p-4 w-full max-w-md max-h-full">
        
        <div class="relative p-4 text-center bg-white rounded-2xl shadow-2xl border border-gray-100 sm:p-5 transform transition-all scale-100">
            
            <button type="button" class="text-gray-400 absolute top-2.5 right-2.5 bg-transparent hover:bg-gray-100 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center transition" data-modal-hide="delete-modal-{{ $id }}">
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                <span class="sr-only">Close modal</span>
            </button>
            
            <div class="w-20 h-20 mx-auto mb-3.5">
                <svg class="cross" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
                    <circle class="cross__circle" cx="26" cy="26" r="25" fill="none"/>
                    <path class="cross__path cross__path--right" fill="none" d="M16,16 L36,36"/>
                    <path class="cross__path cross__path--left" fill="none" d="M36,16 L16,36"/>
                </svg>
            </div>
            
            <p class="mb-4 text-gray-500 font-medium">Apakah Anda yakin ingin menghapus data ini?</p>
            <p class="mb-6 text-sm text-gray-400">Data yang dihapus tidak dapat dikembalikan.</p>
            
            <div class="flex justify-center items-center space-x-4">
                <button data-modal-hide="delete-modal-{{ $id }}" type="button" class="py-2 px-4 text-sm font-medium text-gray-500 bg-white rounded-lg border border-gray-200 hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 hover:text-gray-900 focus:z-10 transition">
                    Batal
                </button>
                
                <form action="{{ $action }}" method="POST" class="inline-block">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="py-2 px-4 text-sm font-medium text-center text-white bg-red-600 rounded-lg hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 transition shadow-lg shadow-red-500/30">
                        Ya, Hapus
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<style>
    .cross {
        width: 80px;
        height: 80px;
        border-radius: 50%;
        display: block;
        stroke-width: 2.5;
        stroke: #ffffff;
        stroke-miterlimit: 10;
        margin: 0 auto;
        box-shadow: inset 0px 0px 0px #ef4444;
        animation: fill-red .4s ease-in-out .4s forwards, scale .3s ease-in-out .9s both;
    }

    .cross__circle {
        stroke-dasharray: 166;
        stroke-dashoffset: 166;
        stroke-width: 2;
        stroke-miterlimit: 10;
        stroke: #ef4444;
        fill: none;
        animation: stroke 0.6s cubic-bezier(0.65, 0, 0.45, 1) forwards;
    }

    .cross__path {
        stroke-dasharray: 48;
        stroke-dashoffset: 48;
        transform-origin: 50% 50%;
    }

    .cross__path--right {
        animation: stroke 0.3s cubic-bezier(0.65, 0, 0.45, 1) 0.8s forwards;
    }

    .cross__path--left {
        animation: stroke 0.3s cubic-bezier(0.65, 0, 0.45, 1) 1s forwards;
    }

    @keyframes stroke {
        100% { stroke-dashoffset: 0; }
    }
    @keyframes scale {
        0%, 100% { transform: none; }
        50% { transform: scale3d(1.1, 1.1, 1); }
    }
    @keyframes fill-red {
        100% { box-shadow: inset 0px 0px 0px 50px #ef4444; }
    }
</style>
