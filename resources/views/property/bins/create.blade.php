<x-app-layout>
    <x-slot name="header">

        <div class="flex justify-between items-center">

            @include('property.partials.title')

            <div class="">

                <a href="{{ route('property.show', $property->id  ) }}" id="job-update__submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Back to Property
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

                            <form action="{{ route( 'property.bin.store', $property->id ) }}" method="POST">

                                @csrf

                                <input type="text" name="property_id" value="{{ $property->id }}" hidden >

                                <div class="flex flex-wrap">

                                    <div class="w-full">

                                        <x-input-label for="name" :value="__('Name')" />

                                        <x-text-input id="name"
                                                      class="block mt-1 w-full"
                                                      name="name"
                                                      value="{{ old('name') ?? '' }}" />

                                        <x-input-error :messages="$errors->get('monthly_payment')" class="mt-2" />

                                    </div>

                                    <div class="w-full">

                                        <x-input-label for="collection_day" :value="__('Collection Day')" />

                                        <select id="collection_day"
                                                class="block mt-1 w-full input-control"
                                                name="collection_day">

                                            <option value="0">
                                                Monday
                                            </option>

                                            <option value="1">
                                                Tuesday
                                            </option>

                                            <option value="2">
                                                Wednesday
                                            </option>

                                            <option value="3">
                                                Thursday
                                            </option>

                                            <option value="4">
                                                Friday
                                            </option>

                                            <option value="6">
                                                Saturday
                                            </option>

                                            <option value="7">
                                                Sunday
                                            </option>

                                        </select>

                                    </div>

                                    <div class="w-full">

                                        <x-input-label for="colour" :value="__('Colour')" />

                                        <x-text-input id="colour"
                                                      type="color"
                                                      class="block mt-1"
                                                      name="colour"
                                                      value="{{ old('colour') }}" />

                                        <x-input-error :messages="$errors->get('type')" class="mt-2" />

                                    </div>

                                    <div class="w-full ">

                                        <x-input-label for="collection_frequency" :value="__('Collection Frequency')" />

                                        <select id="collection_frequency"
                                                class="block mt-1 w-full input-control"
                                                name="collection_frequency">

                                            <option value="0">
                                                Twice a Week
                                            </option>

                                            <option value="1">
                                                Weekly
                                            </option>

                                            <option value="2">
                                                Once every two weeks
                                            </option>

                                            <option value="3">
                                                Monthly
                                            </option>

                                        </select>

                                        <x-input-error :messages="$errors->get('collection_frequency')" class="mt-2" />

                                    </div>

                                    <div class="w-full">

                                        <x-input-label for="last_collection_date" :value="__('Last Collection Date')" />

                                        <x-text-input id="last_collection_date"
                                                      type="date"
                                                      class="block mt-1"
                                                      name="last_collection_date"
                                                      value="{{ old('last_collection_date') ?? '' }}" />

                                        <p><small>This is used to set the next collection date so that you are reminded on the correct days</small></p>

                                        <x-input-error :messages="$errors->get('type')" class="mt-2" />

                                    </div>

                                </div>

                                <x-primary-button class="mt-4">
                                    Create
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
