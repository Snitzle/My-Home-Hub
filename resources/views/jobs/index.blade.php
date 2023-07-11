<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Jobs') }}
            </h2>

            <div class="">

{{--                <a href="{{ route('property.edit', $property->id ) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">--}}
{{--                    Update--}}
{{--                </a>--}}

            </div>
        </div>
    </x-slot>

    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="grid grid-cols-[2fr,1fr] gap-4">

                <div class="">
                    @foreach( $jobs as $job )
                        <a href="{{ route( 'property.job.show', [$property->id, $job->id] ) }}">
                            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-4">
                                <div class="p-6 text-gray-900">
                                    {{ $job->title }}
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>

                <div class="">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-4">
                        <div class="p-6 text-gray-900">
                             Break down costs for the year here
                            <h3>Year Total To Date</h3>
                            <h2>£1000</h2>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>

</x-app-layout>

