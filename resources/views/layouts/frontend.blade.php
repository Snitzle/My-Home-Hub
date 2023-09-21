<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <script src="https://kit.fontawesome.com/d757bdc3bf.js" crossorigin="anonymous"></script>

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;900&display=swap" rel="stylesheet">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="antialiased">
        <div class="min-h-screen bg-black">

            @include('frontend.partials.navigation')

            <!-- Page Content -->
            <main>
                {{-- <div class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white"> --}}
                    {{ $slot }}
                {{-- </div> --}}
            </main>

            <footer class="border-t border-gray-800">

                <div class="max-w-7xl mx-auto">

                    <div class="pt-12 pb-20">

                        <div class="flex flex-wrap gap-20 text-white ">

                            <div class="">
                                <a href="/" class="flex justify-start items-center">
                                    <img src="{{ asset('images/logo--white.png')  }}" class="w-8 mr-4" alt="">
                                    <p class="font-bold">My Home Hub</p>
                                </a>
                            </div>

                            <div class="font-bold mb-6">

                                <p>Product</p>

                            </div>

                            <div class="">

                                <p class="font-bold mb-6">Company</p>

                                <ul>

                                    <li class="mb-2">
                                        <a href="">
                                            About
                                        </a>
                                    </li>

                                    <li class="mb-2">
                                        <a href="">
                                            Blog
                                        </a>
                                    </li>

                                    <li class="mb-2">
                                        <a href="">
                                            Careers
                                        </a>
                                    </li>

                                </ul>

                            </div>

                            <div class="">

                                <p class="font-bold mb-6">Resources</p>

                                <ul>

                                    <li class="mb-2">
                                        <a href="">
                                            Docs
                                        </a>
                                    </li>

                                    <li class="mb-2">
                                        <a href="">
                                            Accessability
                                        </a>
                                    </li>

                                </ul>

                            </div>

                        </div>

                    </div>

                    <div class="flex justify-end items-center text-white pb-8">
                        <a href="">
                            <small>
                                My Home Hub {{ Date('Y') }}
                            </small>
                        </a>
                    </div>

                </div>

            </footer>

        </div>
    </body>
</html>
