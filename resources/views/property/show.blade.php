<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __($property->address->address_1 ) }}
            </h2>

            <div class="">

                <a href="{{ route('property.edit', $property->id ) }}"
                   class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Update
                </a>

            </div>
        </div>
    </x-slot>

    {{--    <div class="py-12">--}}
    {{--        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">--}}
    {{--            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">--}}
    {{--                <div class="p-6 text-gray-900">--}}
    {{--                    {{ __("You're logged in!") }}--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </div>--}}

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-12">
        <div class="grid grid-cols-[1fr,2fr,1fr] gap-4">

            @include('admin.partials.property-side-menu')

            <div class="">

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-4">
                    <div class="p-6 text-gray-900">

                        <div class="">

                            <h2 class="justify-between items-center flex w-full">
                                Property Details
                                <a href="{{ route('property.edit', $property->id) }}">
                                    <small>
                                        Edit
                                    </small>
                                </a>
                            </h2>

                        </div>

                        <table class="w-full">
                            <tbody>

                            <tr>
                                <td class="font-bold">Purchase Date</td>
                                <td>{{ $property->purchase_date }}</td>
                            </tr>
                            <tr>
                                <td class="font-bold">Move in Date</td>
                                <td>{{ $property->move_in_date }}</td>
                            </tr>
                            <tr>
                                <td class="font-bold">Purchase Price</td>
                                <td>{{ '£' . number_format( ( $property->price / 100 ), 2 ) }}</td>
                            </tr>
                            <tr>
                                <td class="font-bold">Year Built</td>
                                <td>{{ $property->year_built }}</td>
                            </tr>
                            </tbody>
                        </table>

                    </div>
                </div>

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">

                        <h2>Address</h2>

                        <p>{{ $property->address->alias }}</p>
                        <p>{{ $property->address->company }}</p>
                        <p>{{ $property->address->address_1 }}</p>
                        <p>{{ $property->address->address_2 }}</p>
                        <p>{{ $property->address->address_3 }}</p>
                        <p>{{ $property->address->town }}</p>
                        <p>{{ $property->address->county }}</p>
                        <p>{{ $property->address->postcode }}</p>
                        <p>{{ $property->address->country }}</p>

                    </div>
                </div>


            </div>

            <div class="">

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-4">
                    <div class="p-6 text-gray-900">

                        <h2>Mortgage</h2>

                        <p class="text-3xl font-bold">
                            £480 pm
                        </p>

                    </div>
                </div>

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-4">
                    <div class="p-6 text-gray-900">

                        <h2>Bills</h2>

                        <p>bills go here</p>

                    </div>
                </div>


                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-4">
                    <div class="p-6 text-gray-900">

                        <h2>Subscriptions</h2>

                        Loop through subscriptions here

                    </div>
                </div>

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-4">
                    <div class="p-6 text-gray-900">

                        <h2>Boiler</h2>

                        <p>Put boiler stats here</p>

                    </div>
                </div>

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">

                        <h2>Bin Days</h2>

                        <p>Put bin day information here</p>

                    </div>
                </div>
            </div>


        </div>
    </div>


</x-app-layout>
