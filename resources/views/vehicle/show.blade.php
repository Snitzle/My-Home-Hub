<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ $vehicle->make }} {{ $vehicle->model }}
            </h2>

            <div class="">

                <a href="{{ route('vehicle.edit', $vehicle->id ) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
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

                @include('admin.partials.vehicle-side-menu')

                <div class="">

                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-4">
                        <div class="p-6 text-gray-900">

                            <div class="">

                                <h2 class="justify-between items-center flex w-full">
                                    Property Details
                                    <a href="{{ route('property.edit', $vehicle->id) }}">
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
                                        <td>{{ $vehicle->purchase_date }}</td>
                                    </tr>
                                    <tr>
                                        <td class="font-bold">Move in Date</td>
                                        <td>{{ $vehicle->registration_number }}</td>
                                    </tr>
                                    <tr>
                                        <td class="font-bold">Purchase Price</td>
                                        <td>{{ '£' . number_format( ( $vehicle->price / 100 ), 2 ) }}</td>
                                    </tr>

{{--                                    <tr>--}}
{{--                                        <td class="font-bold">Year Built</td>--}}
{{--                                        <td>{{ $vehicle->year }}</td>--}}
{{--                                    </tr>--}}

                                </tbody>
                            </table>

                        </div>
                    </div>

                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900">

                            <h2>Address</h2>



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

                            @if( is_null( $boiler ) )
                                No boiler assigned to this property
                            @endif

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
