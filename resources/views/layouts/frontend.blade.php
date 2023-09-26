<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <script src="https://kit.fontawesome.com/d757bdc3bf.js" crossorigin="anonymous"></script>

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

                    <div class="pt-12 pb-20 px-8">

                        <div class="flex flex-wrap lg:gap-20 text-white ">

                            <div class="w-full lg:w-auto mb-10">
                                <a href="/" class="flex justify-center lg:justify-start items-center">
                                    <img src="{{ asset('images/logo--white.png')  }}" class="w-8 mr-4" alt="">
                                    <p class="font-bold">My Home Hub</p>
                                </a>
                            </div>

                            {{-- <div class="footer__block">

                                <div class="font-bold mb-6">

                                    <p>Product</p>

                                </div>

                            </div> --}}

                            <div class="footer__block">

                                <p class="font-bold mb-6">Company</p>

                                <ul>

                                    <li class="mb-2">
                                        <a href="/about">
                                            About
                                        </a>
                                    </li>

                                    <li class="mb-2">
                                        <a href="/blog">
                                            Blog
                                        </a>
                                    </li>

                                    <li class="mb-2">
                                        <a href="/contact">
                                            Contact
                                        </a>
                                    </li>

                                </ul>

                            </div>

                            <div class="footer__block">

                                <p class="font-bold mb-6">Resources</p>

                                <ul>

                                    <li class="mb-2">
                                        <a href="/docs">
                                            Docs
                                        </a>
                                    </li>

                                    <li class="mb-2">
                                        <a href="/accessability">
                                            Accessability
                                        </a>
                                    </li>

                                    <li class="mb-2">
                                        <a href="/attribution">
                                            Attribution
                                        </a>
                                    </li>

                                </ul>

                            </div>

                        </div>

                    </div>

                    <div class="flex justify-center lg:justify-end items-center text-white pb-8">
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
