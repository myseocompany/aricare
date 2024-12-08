<div class="flex items-center justify-between bg-white  rounded-lg mb-4">
    <!-- Título -->
   

    <!-- Page Heading -->
    
    <header class="bg-white">
        
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <h1 class="text-xxl font-bold text-gray-800">
            @if (isset($header))
            {{ $header }}
            @else
                AriCare
            @endif
            </h1>
        </div>
    </header>
    

    <!-- Barra de herramientas -->
    <div class="flex items-center gap-4">
        <!-- Campo de búsqueda -->
        <div class="relative">
            <input
                type="text"
                placeholder="Search for anything here..."
                class="pl-10 pr-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring focus:ring-blue-200"
            />
            <svg
                xmlns="http://www.w3.org/2000/svg"
                class="absolute left-3 top-1/2 transform -translate-y-1/2 h-5 w-5 text-gray-400"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
            >
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-4.35-4.35m-3.9 1.9a7.5 7.5 0 1 1 10.61-10.61 7.5 7.5 0 0 1-10.61 10.61z" />
            </svg>
        </div>

        <!-- Botón "+" -->
        <button class="flex items-center justify-center w-10 h-10 rounded-full bg-brand-blue text-white hover:bg-blue-600 shadow">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
            </svg>
        </button>

        <!-- Íconos -->
        <div class="flex items-center gap-3 text-gray-500">
            <button class="p-2 hover:text-gray-700">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.4 0-2.7 1-3 2.5C9.7 12 11 13 12 13s2.3-1 3-2.5C14.7 9 13.4 8 12 8z" />
                </svg>
            </button>
            <button class="p-2 hover:text-gray-700">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3v18h18V3H3z" />
                </svg>
            </button>
            <span class="text-sm">1/4</span>
        </div>

        <!-- Foto de perfil y dropdown -->
<div class="relative" x-data="{ open: false }" @click.away="open = false" @close.stop="open = false">
    <!-- Perfil del usuario -->
    <div @click="open = ! open" class="flex items-center gap-2 cursor-pointer">
        <img
            src="{{ Auth::user()->profile_photo_url ?? 'https://via.placeholder.com/40' }}"
            alt="{{ Auth::user()->name }}"
            class="w-10 h-10 rounded-full object-cover"
        />
        <div>
            <span class="block text-sm font-medium text-gray-800">{{ Auth::user()->name }}</span>
            <span class="block text-xs text-gray-500">{{ Auth::user()->role ?? 'User' }}</span>
        </div>
        <svg class="ms-2 -me-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5"></path>
        </svg>
    </div>

    <!-- Dropdown Menu -->
    <div
        x-show="open"
        x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="transform opacity-0 scale-95"
        x-transition:enter-end="transform opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-75"
        x-transition:leave-start="transform opacity-100 scale-100"
        x-transition:leave-end="transform opacity-0 scale-95"
        class="absolute z-50 mt-2 w-48 rounded-md shadow-lg ltr:origin-top-right rtl:origin-top-left end-0 bg-white"
        style="display: none;"
        @click="open = false">
        <div class="rounded-md ring-1 ring-black ring-opacity-5 py-1 bg-white">
            <div class="block px-4 py-2 text-xs text-gray-400">Manejar la cuenta</div>
            <a href="{{ route('profile.show') }}" class="block w-full px-4 py-2 text-start text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out">Profile</a>
            <a href="{{ route('api-tokens.index') }}" class="block w-full px-4 py-2 text-start text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out">API Tokens</a>
            <div class="border-t border-gray-200"></div>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="block w-full px-4 py-2 text-start text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out">Log Out</button>
            </form>
        </div>
    </div>
</div>

    </div>
</div>
