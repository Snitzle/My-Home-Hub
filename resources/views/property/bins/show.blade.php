<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ $bin->name }}
            </h2>

            <div class="flex justify-end">

                <a href="{{ route('property.bin.index', [$property ] ) }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded mr-4">
                    Back to Bins List
                </a>

                <a href="{{ route('property.bin.edit', [$property, $bin ] ) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-4">
                    Update
                </a>

                <div class="">
                    <form action="{{ route('property.bin.destroy', [ $property, $bin ]) }}"
                          method="POST"
                          class="">

                        @csrf
                        @method('DELETE')

                        <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                            Delete
                        </button>

                    </form>
                </div>

            </div>
        </div>
    </x-slot>

    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mb-8">

            <div class="grid grid-cols-[2fr,1fr] gap-4">

                <div class="">

                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-4">
                        <div class="p-6 text-gray-900">

                            <div class="w-full">

                                <x-input-label for="collection_day" :value="__('Collection Day')" />

                                <select id="collection_day"
                                        class="block mt-1 w-full input-control"
                                        name="collection_day" disabled>

                                    @include('property.bins.partials.collection-days')

                                </select>

                            </div>

                            <div class="w-full">

                                <x-input-label for="colour" :value="__('Colour')" />

                                <x-text-input id="colour"
                                              type="color"
                                              class="block mt-1 h-12"
                                              name="colour"
                                              value="{{ $bin->colour }}" disabled />

                                <x-input-error :messages="$errors->get('type')" class="mt-2" />

                            </div>

                            <div class="w-full ">

                                <x-input-label for="collection_frequency" :value="__('Collection Frequency')" />

                                <select id="collection_frequency"
                                        class="block mt-1 w-full input-control"
                                        name="collection_frequency" disabled>

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
                                              value="{{ $bin->last_collection_date }}" disabled />

                                <p><small>This is used to set the next collection date so that you are reminded on the correct days</small></p>

                                <x-input-error :messages="$errors->get('type')" class="mt-2" />

                            </div>

                        </div>
                    </div>

                </div>

                <div class="">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-4">
                        <div class="p-6 text-gray-900">

                            <div class="mb-4">
                                <h3>Room for extra information</h3>
                                <p class="">

                                </p>
                            </div>

                        </div>
                    </div>
                </div>

            </div>

        </div>



    </div>

</x-app-layout>

