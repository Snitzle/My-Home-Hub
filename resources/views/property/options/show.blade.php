<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ $property->name . " Options" }}
            </h2>

            <div class="flex justify-end">

                <a href="{{ route('property.show', [ $property ] ) }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded mr-4">
                    Back to Property
                </a>

            </div>
        </div>
    </x-slot>

    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mb-8">

            <div class="grid grid-cols-[2fr,1fr] gap-4">

                <div class="">

                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-4">
                        <div class="p-6 text-gray-900">

                            <form action="{{ route('property.options.update', [ $property ] ) }}" method="POST">

                                @csrf
                                @method('PUT')

                                <div class="w-full">

                                    <x-input-label for="mode" :value="__('Property Mode')" />

                                    <select id="collection_day"
                                            class="block mt-1 w-full input-control"
                                            name="collection_day">

                                        {{-- @include('property.bins.partials.collection-days') --}}

                                        <option value="0">Own Property With Mortgage</option>
                                        <option value="0">Own Property Without Mortgage</option>
                                        <option value="0">Rent Property</option>
                                        <option value="0">Co-Habitate</option>
                                        <option value="0">Rent Out Property With Mortgage</option>
                                        <option value="0">Rent Out Property Without Mortgage</option>

                                    </select>

                                    <p>
                                        <small>
                                            This option will change what other options appear for your property. For example a rented property will not show the mortgage amount.
                                        </small>
                                    </p>

                                </div>

                                <x-primary-button class="mt-4">
                                    Save
                                </x-primary-button>

                            </form>

                        </div>
                    </div>

                </div>

                <div class="">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-4">
                        <div class="p-6 text-gray-900">

                            <div class="mb-4">
                                <h3>Property Options</h3>
                                <p class="">
                                    Use these options to set up important choices about your property
                                </p>
                            </div>

                        </div>
                    </div>
                </div>

            </div>

        </div>



    </div>

</x-app-layout>

