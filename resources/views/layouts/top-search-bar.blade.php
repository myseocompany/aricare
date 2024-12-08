<div class="flex items-center justify-between bg-white  rounded-lg py-4 mb-4">
    <!-- Título -->
    <h1 class="text-xl font-bold text-gray-800">Agenda</h1>

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

        <!-- Foto de perfil -->
        <div class="flex items-center gap-2">
            <img
                src="https://via.placeholder.com/40"
                alt="User Profile"
                class="w-10 h-10 rounded-full object-cover"
            />
            <div>
                <span class="block text-sm font-medium text-gray-800">Darrell Steward</span>
                <span class="block text-xs text-gray-500">Super admin</span>
            </div>
        </div>
    </div>
</div>
