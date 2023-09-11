<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-12">

        <h1 class="mb-4">Properties</h1>

        <div class="grid grid-cols-3 gap-4">
            @foreach( auth()->user()->properties as $property )
                <div class="">
                    <a href="{{ route('property.show', $property->id )  }}" class="">
                        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                            <div class="p-6 text-gray-900">
                                {{ $property->name }}
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-12">

        <h1 class="mb-4">Vehicles</h1>

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
    </div>



</x-app-layout>
