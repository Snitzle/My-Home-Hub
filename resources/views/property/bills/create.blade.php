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

                            <form action="{{ route( 'property.bill.store', $property->id ) }}" method="POST">

                                @csrf

                                <input type="text" name="property_id" value="{{ $property->id }}" hidden >

                                <div class="flex flex-wrap">

                                    <div class="w-full">

                                        <x-input-label for="title" :value="__('Title')" />

                                        <x-text-input id="title"
                                                      class="block mt-1 w-full"
                                                      name="monthly_payment"
                                                      value="{{ old('title') ?? '' }}" />

                                        <x-input-error :messages="$errors->get('monthly_payment')" class="mt-2" />

                                    </div>

                                    <div class="w-full">

                                        <x-input-label for="price" :value="__('Price')" />

                                        <x-text-input id="price"
                                                      class="block mt-1 w-full"
                                                      name="price"
                                                      value="{{ old('price') ?? '' }}" />

                                    </div>

                                    <div class="w-full">

                                        <x-input-label for="description" :value="__('Description')" />

                                        <x-text-input id="description"
                                                      class="block mt-1 w-full"
                                                      name="description"
                                                      value="" />

                                        <x-input-error :messages="$errors->get('description')" class="mt-2" />

                                    </div>

                                    <div class="w-full ">

                                        <x-input-label for="bill_day" :value="__('Bill Day')" />

                                        <x-text-input id="bill_date"
                                                      type="number"
                                                      class="block mt-1 w-full"
                                                      name="bill_date"
                                                      value="" />

                                        <x-input-error :messages="$errors->get('bill_date')" class="mt-2" />

                                    </div>

                                </div>

                                <x-primary-button>
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
