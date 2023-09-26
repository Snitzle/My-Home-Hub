<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">

            <x-admin-page-title>
                {{ __('Jobs') }}
            </x-admin-page-title>

            <div class="">

                <a href="{{ route('property.show', $property->id ) }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                    Back to Property
                </a>

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

