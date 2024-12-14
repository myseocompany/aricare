<x-app-layout class="w-full h-screen">
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <x-slot name="header">
        INCIO
    </x-slot>
    <div class="main-container w-full flex flex-col justify-center items-center bg-gray-100">
            Inicio
    </div>
</x-app-layout>
