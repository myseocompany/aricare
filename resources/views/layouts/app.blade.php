<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <link rel="apple-touch-icon" sizes="180x180" href="/assets/favicon_io/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="/assets/favicon_io/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="/assets/favicon_io/favicon-16x16.png">
        <link rel="manifest" href="/assets/favicon_io/site.webmanifest">
        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- TinyMCE -->
        <script src="https://cdn.tiny.cloud/1/la9foo6cl8ncqn6xlyakbzatrfpulx06e4s8rg2iohqrxddx/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>


        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Styles -->
        @livewireStyles
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  
    </head>
    <body class="font-sans antialiased">
        <x-banner />

        <div class="min-h-screen flex">
            <!-- Contenedor del side bar -->
            @include('layouts.left-side-bar-navigation-menu')
            <!-- Contenedor del calendario -->
            <div class="max-w-7xl mx-auto w-full h-full bg-white">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 w-full h-full">
                    <!-- Franja superior antes del calendario -->
                    @include('layouts.top-search-bar')
                
                    <!-- Contenedor del calendario -->
                    <div class="bg-white overflow-hidden sm:rounded-lg h-full">
                        
                                    <!-- Page Content -->
                        <main>
                            {{ $slot }}
                        </main>
                    </div>
                </div>
                
            </div>

        </div>

        @stack('modals')

        @livewireScripts
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  
    </body>
</html>
