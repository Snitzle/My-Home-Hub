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

                                <x-input-label for="last_collected_at" :value="__('Last Collection Date')" />

                                <x-text-input id="last_collected_at"
                                              type="date"
                                              class="block mt-1"
                                              name="last_collected_at"
                                              value="{{ $bin->last_collected_at }}" disabled />

                                <p class="mb-4"><small>This is used to set the next collection date so that you are reminded on the correct days</small></p>

                                <x-input-error :messages="$errors->get('type')" class="mt-2" />

                            </div>

                            <div class="w-full">

                                <x-input-label for="remind_days_before_collection" :value="__('Days Before Collection')" />

                                <select name="remind_days_before_collection" 
                                        id="remind_days_before_collection"
                                        class="block mt-1 w-full input-control" disabled>

                                        <option value="0">On the day</option>
                                        <option value="1">One day before</option>
                                        <option value="2">Two days before</option>

                                </select>

                                <p class="mb-4">
                                    <small>How many days before bin day would you like the reminders to start</small>
                                </p>

                                <x-input-error :messages="$errors->get('type')" class="mt-2" />

                            </div>

                            <div class="w-full">

                                <x-input-label for="reminder_frequency" :value="__('Reminder Frequency')" />

                                <select id="collection_frequency"
                                        class="block mt-1 w-full input-control"
                                        name="collection_frequency" disabled>

                                        @include('property.bins.partials.reminder-frequency')


                                </select>

                                <p><small>How often do you want to be reminded? We will remind you in the morning before work and the evening after work until bed time.</small></p>

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

