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

                                    <select name="country" id="" class="input-control">
                                        @foreach( $countries as $country )
                                            <option 
                                                value="{{ $country->id }}"
                                                @if( $property->address->country->id === $country->id ) 
                                                    selected 
                                                @endif
                                            >
                                                {{ $country->name }}
                                            </option>
                                        @endforeach
                                    </select>

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

