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

            @if( session('success') )
                <div class="mb-4">
                    <div class="bg-green-500 overflow-hidden shadow-sm sm:rounded-lg p-6">
                        <p class="mb-0 font-bold text-white">
                            {{ session('success') }}
                        </p>
                    </div>
                </div>
            @endif

            <div class="grid grid-cols-2 gap-4">
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

                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-4">
                        <div class="p-6 text-gray-900">

                            <h2>Address</h2>

                            <form action="{{ route('property.address.update', [ $property->id, $property->address->id ]) }}" method="POST">

                                @csrf
                                @method('PUT')

                                <div class="w-full mb-4">

                                    <x-input-label for="alias" :value="__('Alias')" />

                                    <x-text-input id="alias"
                                                  class="block mt-1 w-full"
                                                  name="alias"
                                                  value="{{ $property->address->alias }}" />

                                    <x-input-error :messages="$errors->get('alias')" class="" />

                                </div>

                                <div class="w-full mb-4">

                                    <x-input-label for="company" :value="__('Company')" />

                                    <x-text-input id="company"
                                                  class="block mt-1 w-full"
                                                  name="company"
                                                  value="{{ $property->address->company }}" />

                                    <x-input-error :messages="$errors->get('company')" class="" />

                                </div>

                                <div class="w-full mb-4">

                                    <x-input-label for="address_1" :value="__('Address 1')" />

                                    <x-text-input id="address_1"
                                                  class="block mt-1 w-full"
                                                  name="address_1"
                                                  value="{{ $property->address->address_1 }}" />

                                    <x-input-error :messages="$errors->get('address_1')" class="" />

                                </div>

                                <div class="w-full mb-4">

                                    <x-input-label for="address_2" :value="__('Address 2')" />

                                    <x-text-input id="address_2"
                                                  class="block mt-1 w-full"
                                                  name="address_2"
                                                  value="{{ $property->address->address_2 }}" />

                                    <x-input-error :messages="$errors->get('address_2')" class="" />

                                </div>

                                <div class="w-full mb-4">

                                    <x-input-label for="address_3" :value="__('Address 3')" />

                                    <x-text-input id="address_3"
                                                  class="block mt-1 w-full"
                                                  name="address_3"
                                                  value="{{ $property->address->address_3 }}" />

                                    <x-input-error :messages="$errors->get('address_3')" class="" />

                                </div>

                                <div class="w-full mb-4">

                                    <x-input-label for="town" :value="__('Town')" />

                                    <x-text-input id="town"
                                                  class="block mt-1 w-full"
                                                  name="town"
                                                  value="{{ $property->address->town }}" />

                                    <x-input-error :messages="$errors->get('town')" class="" />

                                </div>

                                <div class="w-full mb-4">

                                    <x-input-label for="county" :value="__('County')" />

                                    <x-text-input id="county"
                                                  class="block mt-1 w-full"
                                                  name="county"
                                                  value="{{ $property->address->county }}" />

                                    <x-input-error :messages="$errors->get('county')" class="" />

                                </div>

                                <div class="w-full mb-4">

                                    <x-input-label for="postcode" :value="__('Postcode')" />

                                    <x-text-input id="postcode"
                                                  class="block mt-1 w-full"
                                                  name="postcode"
                                                  value="{{ $property->address->postcode }}" />

                                    <x-input-error :messages="$errors->get('postcode')" class="" />

                                </div>

                                <div class="w-full mb-4">

                                    <x-input-label for="country" :value="__('Country')" />

                                    <x-text-input id="country"
                                                  class="block mt-1 w-full"
                                                  name="country"
                                                  value="{{ $property->address->country }}" />

                                    <x-input-error :messages="$errors->get('country')" class="" />

                                </div>

                                <x-primary-button>
                                    Update
                                </x-primary-button>

                            </form>

                        </div>
                    </div>


                </div>

            </div>

        </div>
    </div>



</x-app-layout>
