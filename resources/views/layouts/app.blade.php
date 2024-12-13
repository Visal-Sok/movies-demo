<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,400;1,200&display=swap" rel="stylesheet">
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @livewireStyles
    </head>
    <body class="font-sans antialiased h-[100vh] flex flex-row">
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
            {{-- @include('layouts.navigation') --}}
            @include('components.adminnavbar')
            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{-- <div class="absolute right-0 h-[100vh] w-[80vw] flex justify-center items-center">
                    <div class="w-[91%] h-[91%] bg-blue-300 p-16 text-white text" style="font-family: 'Montserrat', sans-serif;">
                        <h2 class="font-extrabold ml-10 text-5xl">
                            {{ $title }}
                        </h2>
                    </div>
                </div> --}}
                
                {{ $slot }}
            </main>
        </div>
        @livewireScripts
    </body>
</html>
