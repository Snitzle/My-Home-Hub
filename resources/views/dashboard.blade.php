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

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-12">
        <div class="xl:grid grid-cols-3 gap-4">
            @foreach( $properties as $property )
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



</x-app-layout>
