<x-app-layout>
    <x-slot name="header">Configuracion</x-slot>
    <div class="buttons-container w-full h-[80px] flex flex-row items-center justify-start gap-[5%]">
        <!-- boton que permite ir a administrar los roles del usuario -->
        <a href="{{ route('user_rol.index') }}" class="min-w-[150px] no-underline ml-[20px] text-gray-500 hover:text-blue-700 bg-green-400 px-5 py-3 text-white cursor-pointer flex justify-center items-center">
            Administrador Roles
        </a>
        <a href="" class="min-w-[150px] no-underline ml-[20px] text-gray-500 hover:text-blue-700 bg-green-400 px-5 py-3 text-white cursor-pointer flex justify-center items-center">
            Administrador de Usuarios
        </a>
        <a href="#" class="min-w-[150px] no-underline ml-[20px] text-gray-500 hover:text-blue-700 bg-green-400 px-5 py-3 text-white cursor-pointer flex justify-center items-center">
            Auditar el Sistema
        </a>
    </div>
</x-app-layout>

