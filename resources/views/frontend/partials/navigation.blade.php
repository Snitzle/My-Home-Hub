            
    @if (Route::has('login'))
    
        <div class="sm:fixed w-full bg-[rgba(0,0,0,.5)] backdrop-blur-md sm:top-0 sm:right-0 text-right z-10">
    
            <div class="hidden lg:flex items-center justify-center bg-gradient-to-b from-red-500 to-red-600 p-2 text-center text-white text-sm">

                <div class="mt-px ml-1">
                    <p>
                        My Home Hub is <strong>Pre Alpha.</strong> That means we're still building out its most basic features.
                    </p>
                    <p>
                        If you'd like to test out the app, please <a href="/waiting-list"> <strong>register here.</strong> </a>
                    </p>
                </div>

            </div>
        
            <div class=" p-6">

                <div class="max-w-7xl mx-auto">

                    <div class="flex justify-between">

                        <div class="flex items-center gap-10">

                            <a href="/" class="flex justify-start items-center">
                                <img src="{{ asset('images/logo--white.png')  }}" class="w-8 mr-4" alt="">
                                <p class="text-white font-bold">My Home Hub</p>
                            </a>

                            <nav>

                                <div class="">

                                    <ul class="flex gap-8 list-none text-white ">
                                        
                                        <li>
                                            <a href="">
                                                Roadmap
                                            </a>
                                        </li>

                                    </ul>

                                </div>

                            </nav>


                        </div>

                        

                        <div class="">

                            {{-- @auth

                                <a href="{{ url('/dashboard') }}" class="font-semibold text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>

                            @else

                                <a href="{{ route('login') }}" class="font-semibold text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a>

                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="ml-4 font-semibold text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                                @endif
                        
                            @endauth --}}

                        </div>

                    </div>

                </div>

            </div>

        </div>

    @endif