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

            @if( $errors->any())
                @foreach ( $errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            @endif

            <div class="grid grid-cols-[2fr,1fr] gap-4">

                <div class="">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900">

                            <form action="{{ route( 'property.mortgage.store', $property->id ) }}" method="POST">

                                @csrf

                                <input type="text" name="property_id" value="{{ $property->id }}" hidden >

                                <div class="flex flex-wrap">

                                    <div class="w-full">

                                        <x-input-label for="monthly_payment" :value="__('Monthly Payment')" />

                                        <x-text-input id="monthly_payment"
                                                      class="block mt-1 w-full"
                                                      name="monthly_payment"
                                                      value="{{ $mortgage->monthly_payment }}" />

                                        <x-input-error :messages="$errors->get('monthly_payment')" class="mt-2" />

                                    </div>

                                    <div class="w-full">

                                        <x-input-label for="name" :value="__('Mortgage Type')" />

                                        <select name="property_mortgage_rate_type_id" id="" class="input-control">
                                            @foreach( $mortgage_types as $type )
                                                <option value="{{ $type->id }}" @if( $mortgage->type->id == $type->id ) selected="selected" @endif  >
                                                    {{ $type->name }}
                                                </option>
                                            @endforeach
                                        </select>

                                    </div>

                                    <div class="w-full">

                                        <x-input-label for="interest_rate" :value="__('Interest Rate')" />

                                        <x-text-input id="interest_rate"
                                                      class="block mt-1 w-full"
                                                      name="interest_rate"
                                                      value="{{ $mortgage->interest_rate }}" />

                                        <x-input-error :messages="$errors->get('interest_rate')" class="mt-2" />

                                    </div>

                                    <div class="w-full">

                                        <x-input-label for="term_length" :value="__('Term Length')" />

                                        <x-text-input id="term_length"
                                                      class="block mt-1 w-full"
                                                      name="term_length"
                                                      value="{{ $mortgage->term_length }}" />

                                        <x-input-error :messages="$errors->get('term_length')" class="mt-2" />

                                    </div>



                                    <div class="w-full ">

                                        <x-input-label for="start_date" :value="__('Start Date')" />

                                        <x-text-input id="start_date"
                                                      type="date"
                                                      class="block mt-1 w-full"
                                                      name="start_date"
                                                      value="{{ $mortgage->start_date }}" />

                                        <x-input-error :messages="$errors->get('start_date')" class="mt-2" />

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
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900">

                            <h2>Files</h2>

                            <div class="w-full">

                                @if ( is_null( $property_survey ))

                                    <form action="{{ route('property.mortgage.survey.upload', [ $property , $mortgage ])  }}"
                                          method="POST"
                                          enctype="multipart/form-data"
                                    >

                                        @csrf

                                        <x-input-label for="property_survey" :value="__('Property Survey')" />

                                        <x-text-input id="property_survey"
                                                      type="file"
                                                      class="block mt-1 w-full"
                                                      name="property_survey"
                                                      value="" />

                                        <x-input-error :messages="$errors->get('property_survey')" class="mt-2" />

                                        <div class="flex justify-end">

                                            <x-primary-button>
                                                submit
                                            </x-primary-button>

                                        </div>

                                    </form>

                                @else
                                    <a href="{{ $property_survey->getUrl() }}" class="block mb-4">
                                        Download Property Survey
                                    </a>
                                @endif

                            </div>

                            <div class="w-full">

                                <x-input-label for="mortgage_contract" :value="__('Mortgage Contract')" />

                                <x-text-input id="property_survey"
                                              type="file"
                                              class="block mt-1 w-full"
                                              name="property_survey"
                                              value="{{ $mortgage->property_survey }}" />

                                <x-input-error :messages="$errors->get('property_survey')" class="mt-2" />

                            </div>

                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>



</x-app-layout>
