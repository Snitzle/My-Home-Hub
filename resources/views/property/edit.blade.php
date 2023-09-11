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

            <div class="grid grid-cols-[ 3fr, 1fr ] gap-4">

                <div class="">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900">

                            <form action="{{ route( 'property.update', $property->id ) }}" method="POST">

                                @method('PUT')
                                @csrf

                                <div class="flex flex-wrap">

                                    <div class="w-full">

                                        <x-input-label for="name" :value="__('Name')" />

                                        <x-text-input id="name"
                                                      class="block mt-1 w-full"
                                                      name="name"
                                                      value="{{ $property->name }}" />

                                        <x-input-error :messages="$errors->get('name')" class="mt-2" />

                                    </div>

                                    <div class="w-full">

                                        <x-input-label for="name" :value="__('Name')" />

                                        <select name="property_type" id="" class="input-control">
                                            @foreach( $property_types as $type )
                                                <option value="{{ $type->id }}">
                                                    {{ $type->name }}
                                                </option>
                                            @endforeach
                                        </select>

                                    </div>

                                    <div class="w-full ">

                                        <x-input-label for="purchase_date" :value="__('Purchase Date')" />

                                        <x-text-input type="date"
                                                      id="purchase_date"
                                                      class="block mt-1 w-full"
                                                      name="purchase_date"
                                                      value="{{ $property->purchase_date->format('Y-m-d') }}" />

                                        <x-input-error :messages="$errors->get('purchase_date')" class="mt-2" />

                                    </div>

                                    <div class="w-full">

                                        <x-input-label for="move_in_date" :value="__('Move In Date')" />

                                        <x-text-input   type="date"
                                                        id="move_in_date"
                                                        class="block mt-1 w-full"
                                                        name="move_in_date"
                                                        value="{{ $property->move_in_date->format('Y-m-d') }}" />

                                        <x-input-error :messages="$errors->get('move_in_date')" class="mt-2" />

                                    </div>

                                    <div class="w-full ">

                                        <x-input-label for="price" :value="__('Price')" />

                                        <x-text-input id="price"
                                                      class="block mt-1 w-full"
                                                      name="price"
                                                      value="{{ '£' . number_format( $property->price / 100, 2 ) }}" />

                                        <x-input-error :messages="$errors->get('price')" class="mt-2" />

                                    </div>

                                    <div class="w-full mb-4">

                                        <x-input-label for="year_built" :value="__('Year Built')" />

                                        <x-text-input id="year_built"
                                                      class="block mt-1 w-full"
                                                      name="year_built"
                                                      value="{{ $property->year_built }}" />

                                        <x-input-error :messages="$errors->get('year_built')" class="" />

                                    </div>

                                </div>

                                <x-primary-button>
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
