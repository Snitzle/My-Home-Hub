<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">

            @include('property.partials.title')

            <div class="">

                @if ( is_null( $property->mortage ) )
                    <a href="{{ route('property.mortgage.create', $property ) }}"
                       class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-4">
                        Add Mortgage
                    </a>
                @endif

                <a href="{{ route('property.edit', $property->id ) }}"
                   class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Update
                </a>

            </div>
        </div>
    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-12">
        <div class="grid grid-cols-[1fr,3fr,2fr] gap-4">

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
                                    <td class="font-bold">Property Type</td>
                                    <td>{{ $property->property_type->name }}</td>
                                </tr>
                                <tr>
                                    <td class="font-bold">Purchase Date</td>
                                    <td>{{ $property->purchase_date->format('d/m/Y') }}</td>
                                </tr>
                                <tr>
                                    <td class="font-bold">Move in Date</td>
                                    <td>{{ $property->move_in_date->format('d/m/Y') }}</td>
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

                        <table class="w-full">
                            <tbody>
                                <tr>
                                    <td class="font-bold">Alias</td>
                                    <td>{{ $property->address->alias }}</td>
                                </tr>
                                <tr>
                                    <td class="font-bold">Company</td>
                                    <td>{{ $property->address->company }}</td>
                                </tr>
                                <tr>
                                    <td class="font-bold">address_1</td>
                                    <td>{{ $property->address->address_1 }}</td>
                                </tr>
                                <tr>
                                    <td class="font-bold">address_2</td>
                                    <td>{{ $property->address->address_2 }}</td>
                                </tr>
                                <tr>
                                    <td class="font-bold">address_3</td>
                                    <td>{{ $property->address->address_3 }}</td>
                                </tr>
                                <tr>
                                    <td class="font-bold">Town</td>
                                    <td>{{ $property->address->town }}</td>
                                </tr>
                                <tr>
                                    <td class="font-bold">County</td>
                                    <td>{{ $property->address->county }}</td>
                                </tr>
                                <tr>
                                    <td class="font-bold">Postcode</td>
                                    <td>{{ $property->address->postcode }}</td>
                                </tr>
                                <tr>
                                    <td class="font-bold">Country</td>
                                    <td>{{ $property->address->country }}</td>
                                </tr>
                            </tbody>
                        </table>

                    </div>
                </div>


            </div>

            <div class="">

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-4">
                    <div class="p-6 text-gray-900">

                        <h2 class="flex items-center justify-between">
                            Mortgage
                            <small>
{{--                                {{ route( 'property.mortgage.show', [ $property->id, $property->mortgage->id ] ) }}--}}
                            </small>
                        </h2>

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
