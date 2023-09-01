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

                            <form action="{{ route( 'property.boiler.store', $property->id ) }}" method="POST">

                                @csrf

                                <input type="text" name="property_id" value="{{ $property->id }}" hidden >

                                <div class="flex flex-wrap">

                                    <div class="w-full">

                                        <x-input-label for="make" :value="__('Make')" />

                                        <x-text-input id="title"
                                                      class="block mt-1 w-full"
                                                      name="make"
                                                      value="{{ old('make') ?? '' }}" />

                                        <x-input-error :messages="$errors->get('monthly_payment')" class="mt-2" />

                                    </div>

                                    <div class="w-full">

                                        <x-input-label for="model" :value="__('Model')" />

                                        <x-text-input id="model"
                                                      class="block mt-1 w-full"
                                                      name="model"
                                                      value="{{ old('model') ?? '' }}" />

                                    </div>

                                    <div class="w-full">

                                        <x-input-label for="type" :value="__('Type')" />

                                        <select name="type" id="" class="input-control block mt-1 w-full">

                                                <option value="0">
                                                    Regular
                                                </option>

                                                <option value="0">
                                                    Combi
                                                </option>

                                        </select>

                                        <x-input-error :messages="$errors->get('type')" class="mt-2" />

                                    </div>

                                    <div class="w-full ">

                                        <x-input-label for="install_date" :value="__('Install Date')" />

                                        <x-text-input id="install_date"
                                                      type="date"
                                                      class="block mt-1 w-full"
                                                      name="install_date"
                                                      value="" />

                                        <x-input-error :messages="$errors->get('install_date')" class="mt-2" />

                                    </div>

                                    <div class="w-full ">

                                        <x-input-label for="active" :value="__('Active')" />

                                        <input  type="checkbox"
                                                id="active"
                                                class="block mt-1 input-control__checkbox w-4"
                                                name="active"
                                                value="" />

                                        <x-input-error :messages="$errors->get('start_date')" class="mt-2" />

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
