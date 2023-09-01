<x-app-layout>
    <x-slot name="header">

        <div class="flex justify-between items-center">

            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Update {{ $bin->name }}
            </h2>

            <div class="">

                <a href="{{ route('property.bin.show', [ $property, $bin ]  ) }}" id="job-update__submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Back to Bin
                </a>

            </div>
        </div>

    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-12">
        <div class="">

            @include('property.partials.notifications')

            <div class="">
                <div class="">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900">

                            <form action="{{ route( 'property.bin.update', [ $property, $bin ] ) }}" method="POST">

                                @csrf
                                @method('PUT')

                                <input type="text" name="property_id" value="{{ $property->id }}" hidden >

                                <div class="flex flex-wrap">

                                    <div class="w-full">

                                        <x-input-label for="name" :value="__('Name')" />

                                        <x-text-input id="name"
                                                      class="block mt-1 w-full"
                                                      name="name"
                                                      value="{{ old('name') ?? $bin->name }}" />

                                        <x-input-error :messages="$errors->get('monthly_payment')" class="mt-2" />

                                    </div>

                                    <div class="w-full">

                                        <x-input-label for="collection_day" :value="__('Collection Day')" />

                                        <select id="collection_day"
                                                class="block mt-1 w-full input-control"
                                                name="collection_day">

                                            @include('property.bins.partials.collection-days')

                                        </select>

                                    </div>

                                    <div class="w-full">

                                        <x-input-label for="colour" :value="__('Colour')" />

                                        <x-text-input id="colour"
                                                      type="color"
                                                      class="block mt-1 h-12"
                                                      name="colour"
                                                      value="{{ old('colour') ?? $bin->colour }}" />

                                        <x-input-error :messages="$errors->get('type')" class="mt-2" />

                                    </div>

                                    <div class="w-full ">

                                        <x-input-label for="collection_frequency" :value="__('Collection Frequency')" />

                                        <select id="collection_frequency"
                                                class="block mt-1 w-full input-control"
                                                name="collection_frequency">

                                            @include('property.bins.partials.collection-frequency')

                                        </select>

                                        <x-input-error :messages="$errors->get('collection_frequency')" class="mt-2" />

                                    </div>

                                    <div class="w-full">

                                        <x-input-label for="last_collection_date" :value="__('Last Collection Date')" />

                                        <x-text-input id="last_collection_date"
                                                      type="date"
                                                      class="block mt-1"
                                                      name="last_collection_date"
                                                      value="{{ old('last_collection_date') ?? $bin->last_collection_date }}" />

                                        <p><small>This is used to set the next collection date so that you are reminded on the correct days</small></p>

                                        <x-input-error :messages="$errors->get('type')" class="mt-2" />

                                    </div>

                                </div>

                                <x-primary-button class="mt-4">
                                    Update
                                </x-primary-button>

                            </form>

                        </div>
                    </div>
                </div>

                <div class="">


                </div>

            </div>

        </div>
    </div>



</x-app-layout>
