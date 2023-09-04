<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">

            @include('property.partials.title')

            <div class="">
                @if ( is_null( $property->mortgage ) )
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

                        <table class="w-full property-table">
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

                        <table class="w-full property-table">
                            <tbody>
                                @if( $property->address->alias )
                                <tr>
                                    <td class="font-bold">Alias</td>
                                    <td>{{ $property->address->alias }}</td>
                                </tr>
                                @endif

                                @if( $property->address->company )
                                    <tr>
                                        <td class="font-bold">Company</td>
                                        <td>{{ $property->address->company }}</td>
                                    </tr>
                                @endif

                                @if( $property->address->address_1 )
                                    <tr>
                                        <td class="font-bold">Address 1</td>
                                        <td>{{ $property->address->address_1 }}</td>
                                    </tr>
                                @endif

                                @if( $property->address->address_2 )
                                    <tr>
                                        <td class="font-bold">Address 2</td>
                                        <td>{{ $property->address->address_2 }}</td>
                                    </tr>
                                @endif

                                @if( $property->address->address_3 )
                                    <tr>
                                        <td class="font-bold">Address 3</td>
                                        <td>{{ $property->address->address_3 }}</td>
                                    </tr>
                                @endif

                                @if( $property->address->town )
                                    <tr>
                                        <td class="font-bold">Town</td>
                                        <td>{{ $property->address->town }}</td>
                                    </tr>
                                @endif

                                @if( $property->address->county )
                                    <tr>
                                        <td class="font-bold">County</td>
                                        <td>{{ $property->address->county }}</td>
                                    </tr>
                                @endif

                                @if( $property->address->postcode )
                                    <tr>
                                        <td class="font-bold">Postcode</td>
                                        <td>{{ $property->address->postcode }}</td>
                                    </tr>
                                @endif

                                @if( $property->address->country )
                                    <tr>
                                        <td class="font-bold">Country</td>
                                        <td>{{ $property->address->country }}</td>
                                    </tr>
                                @endif


                            </tbody>
                        </table>

                    </div>
                </div>


            </div>

            <div class="">

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-4">
                    <div class="p-6 text-gray-900">

                        @if ( !is_null( $property->mortgage ) )

                            <h2 class="flex items-center justify-between">
                                Mortgage
                                <small>
                                        <a href="{{ route( 'property.mortgage.show', [ $property->id, $property->mortgage->id ] ) }}"
                                            class="mr-4">
                                            View
                                        </a>

                                        <a href="{{ route( 'property.mortgage.edit', [ $property->id, $property->mortgage->id ] ) }}">
                                            Update
                                        </a>
                                </small>
                            </h2>

                            <p class="text-3xl font-bold">
                                {{ '£' . number_format( $property->mortgage->monthly_payment, 2 ) }} pcm
                            </p>

                        @else

                            <h2 class="flex items-center justify-between">
                                Add a Mortgage
                            </h2>

                        @endif

                    </div>
                </div>

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-4">
                    <div class="p-6 text-gray-900">

                        @if( !is_null( $property->bills ) )

                            <h2 class="flex justify-between">
                                Bills
                                <small>
                                    <a href="{{ route('property.bill.index', $property ) }}">View</a>
                                </small>
                            </h2>

                            <p>{{ '£' . number_format( $total_bill_cost / 100 , 2 ) }}</p>

                        @else

                            <h2>Add Bills</h2>

                        @endif

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

                        <h2 class="flex justify-between">
                            Boiler
                            <small>
                                @if( is_null( $boiler ) )
                                    <a href="{{ route('property.boiler.create', $property ) }}">Add</a>
                                @else
                                    <a href="{{ route('property.boiler.index', $property ) }}">View</a>
                                @endif
                            </small>
                        </h2>

                        @if( is_null( $boiler ) )
                            <p class="mb-0">
                                No boiler assigned to this property
                            </p>
                        @else
                            <p class="mb-0">
                                Next service date: ADD NEXT SERVICE DATE
                            </p>
                        @endif

                    </div>
                </div>

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">

                        <h2 class="flex justify-between">
                            Bin Days
                             @if( count( $property->bins ) > 0 )
                                 <small>
                                    <a href="{{ route('property.bin.index', $property->id ) }}">
                                        View
                                    </a>
                                 </small>
                             @else
                                 <small>
                                    <a href="{{ route( 'property.bin.create', $property->id ) }}">
                                        Add
                                    </a>
                                 </small>
                             @endif
                        </h2>

                        @if( count( $property->bins ) > 0 )

                            {{-- Bin day logic here --}}
                            <table class="w-full">
                                @foreach( $property->bins as $bin )
                                    <tr>
                                        <td>
                                            <span class="border-b border-b-2" style="border-bottom-color: {{ $bin->colour }}">
                                                {{ $bin->name }}
                                            </span>
                                        </td>
                                        <td class="text-right">
                                            <span class="border-b border-b-2" style="border-bottom-color: {{ $bin->colour }}">
                                                {{ $bin->next_collection_day()->format('d/m/Y') }}
                                            </span>
                                        </td>
                                    </tr>
                                @endforeach
                            </table>

                        @else
                            <p>Please add your bin information</p>
                        @endif

                    </div>
                </div>
            </div>


        </div>
    </div>


</x-app-layout>
