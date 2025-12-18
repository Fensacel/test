<nav class="fixed top-0 z-50 w-full bg-white border-b border-gray-200 sm:hidden">
    <div class="px-3 py-3 lg:px-5 lg:pl-3">
        <div class="flex items-center justify-between">
            <div class="flex items-center justify-start rtl:justify-end">
                <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar" type="button" class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200">
                    <span class="sr-only">Open sidebar</span>
                    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
                    </svg>
                </button>
                <a href="/" class="flex ms-2 md:me-24">
                    <img src="{{ asset('image/Archie.svg') }}" class="h-8 me-3" alt="Archie Logo" />
                    <span class="self-center text-xl font-semibold sm:text-2xl whitespace-nowrap text-gray-900">Archie</span>
                </a>
            </div>
        </div>
    </div>
</nav>

<aside id="logo-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0 bg-white border-r border-gray-200" aria-label="Sidebar">
    <div class="h-full px-3 py-4 overflow-y-auto bg-white">
        
        <a href="/" class="flex items-center ps-2.5 mb-8 mt-2">
            <img src="{{ asset('image/Archie.svg') }}" class="h-8 me-3 sm:h-9" alt="Archie Logo" />
            <span class="self-center text-xl font-bold whitespace-nowrap text-gray-900">Archie</span>
        </a>

        <ul class="space-y-2 font-medium">
            <li>
                <a href="/" class="flex items-center p-3 text-gray-900 rounded-lg hover:bg-gray-100 group transition {{ request()->is('/') ? 'bg-gray-100 text-blue-600' : '' }}">
                    <svg class="w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900 {{ request()->is('/') ? 'text-blue-600' : '' }}" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21" >
                        <path d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z"/>
                        <path d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.186.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z"/>
                    </svg>
                    <span class="ms-3">Dashboard</span>
                </a>
            </li>

            <li>
                <a href="/buku" class="flex items-center p-3 text-gray-900 rounded-lg hover:bg-gray-100 group transition {{ request()->is('buku*') ? 'bg-gray-100 text-blue-600' : '' }}">
                    <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900 {{ request()->is('buku*') ? 'text-blue-600' : '' }}" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24" stroke="currentColor">
                         <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                    </svg>
                    <span class="flex-1 ms-3 whitespace-nowrap">Buku</span>
                </a>
            </li>

            <li>
                <a href="/kategori" class="flex items-center p-3 text-gray-900 rounded-lg hover:bg-gray-100 group transition {{ request()->is('kategori*') ? 'bg-gray-100 text-blue-600' : '' }}">
                    <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900 {{ request()->is('kategori*') ? 'text-blue-600' : '' }}" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                    </svg>
                    <span class="flex-1 ms-3 whitespace-nowrap">Kategori</span>
                </a>
            </li>

            <li>
                <a href="/penerbit" class="flex items-center p-3 text-gray-900 rounded-lg hover:bg-gray-100 group transition {{ request()->is('penerbit*') ? 'bg-gray-100 text-blue-600' : '' }}">
                    <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900 {{ request()->is('penerbit*') ? 'text-blue-600' : '' }}" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                    </svg>
                    <span class="flex-1 ms-3 whitespace-nowrap">Penerbit</span>
                </a>
            </li>
        </ul>
    </div>
</aside>