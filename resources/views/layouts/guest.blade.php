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

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-black">
            
            <div>
                <div class="flex flex-wrap justify-center items-center w-40">
                    <img src="{{ asset('images/logo--white.png')  }}" class="w-20 mb-4" alt="">
                    <p class="text-white font-bold">My Home Hub</p>
                </div>
            </div>

            <div class="w-full sm:max-w-md mt-6 px-6 py-4  border-2 border-white shadow-md overflow-hidden sm:rounded-lg">
                {{ $slot }}
            </div>
            
        </div>
    </body>
</html>
