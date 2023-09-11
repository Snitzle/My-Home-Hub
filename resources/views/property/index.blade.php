<x-app-layout>
    
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    {{--    <div class="py-12">--}}
    {{--        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">--}}
    {{--            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">--}}
    {{--                <div class="p-6 text-gray-900">--}}
    {{--                    {{ __("You're logged in!") }}--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </div>--}}

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-12">
        <div class="xl:grid grid-cols-3 gap-4">
            @foreach( $properties as $property )
                <div class="">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900">

                            {{ $property->name }}

                            {{ $property->purchase_date }}
                            {{ $property->move_in_date }}
                            {{ $property->price }}
                            {{ $property->year_built }}

                            {{ $property->address->alias }}
                            {{ $property->address->company }}
                            {{ $property->address->address_1 }}
                            {{ $property->address->address_2 }}
                            {{ $property->address->address_3 }}
                            {{ $property->address->town }}
                            {{ $property->address->county }}
                            {{ $property->address->postcode }}
                            {{ $property->address->country->name }}

                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>



</x-app-layout>
