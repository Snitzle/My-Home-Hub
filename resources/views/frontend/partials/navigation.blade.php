            
    @if (Route::has('login'))
        <div class="sm:fixed w-full bg-[rgba(0,0,0,.5)] backdrop-blur-md sm:top-0 sm:right-0 p-6 text-right z-10">

            <div class="max-w-7xl mx-auto">

                <div class="flex justify-between">

                    <div class="flex justify-start items-center">
                        <img src="{{ asset('images/logo--white.png')  }}" class="w-8 mr-4" alt="">
                        <p class="text-white font-bold">My Home Hub</p>
                    </div>

                    

                    <div class="">

                        @auth
                            <a href="{{ url('/dashboard') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
                        @else
                            <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                            @endif
                        @endauth

                    </div>
                </div>

            </div>

        </div>
    @endif