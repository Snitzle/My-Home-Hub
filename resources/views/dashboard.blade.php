<x-app-layout>

    <x-slot name="navigation">
        @include('layouts.navigation' )
    </x-slot>

    <x-slot name="header">

        <x-admin-page-title>
            {{ __('Dashboard') }}
        </x-admin-page-title>

    </x-slot>

    <div class="max-w-7xl mx-auto text-center lg:text-left sm:px-6 px-6 lg:px-8 py-12 ">

        <h1 class="mb-4 text-white">
            Properties
        </h1>

        <div class="grid lg:grid-cols-3 gap-4">
            @foreach( auth()->user()->properties as $property )
                <div class="">
                    <a href="{{ route('property.show', $property->id )  }}" class="">
                        <div class=" bg-slate-800 overflow-hidden shadow-sm  rounded-lg">
                            <p class="p-6 text-white font-bold">
                                {{ $property->name }}
                            </p>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>

    {{-- <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-12">

        <h1 class="mb-4 text-white">
            Vehicles
        </h1>

        <div class="grid grid-cols-3 gap-4">

            @foreach( auth()->user()->vehicles as $vehicle )

                <div class="">
                    <a href="{{ route('vehicle.show', $vehicle->id )  }}" class="">
                        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                            <div class="p-6 text-gray-900">
                                {{ $vehicle->make  }}
                                {{ $vehicle->model }}
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach

        </div>
    </div> --}}



</x-app-layout>
