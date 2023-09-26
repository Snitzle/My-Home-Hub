<x-app-layout :property="$property" >

    <x-slot name="navigation">
        @include('layouts.navigation' )
    </x-slot>

    <x-slot name="header">
        <div class="flex justify-between items-center">

            @include('property.partials.title')

            <div class="">
                {{-- space for buttons  --}}

            </div>
        </div>
    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-12 px-6">

        <div class="grid lg:grid-cols-[1fr,3fr,2fr] gap-4">

            @include('admin.partials.property-side-menu')

            <div class="">

                <x-admin-panel>

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

                </x-admin-panel>

                 
                <x-admin-panel>

                    <h2 class="flex justify-between">
                        Address
                        @if( !is_null( $property->address ) ) 
                            <a href=" {{ route('property.address.edit', [ $property, $property->address ] ) }} ">
                                <small>
                                    Edit
                                </small>
                            </a>
                        @else
                            <a href="{{ route('property.address.create', [ $property ] ) }}">
                                <small>
                                    Add
                                </small>
                            </a>
                        @endif
                    </h2>

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
                                    <td>{{ $property->address->country->name }}</td>
                                </tr>
                            @endif


                        </tbody>
                    </table>

                </x-admin-panel>


            </div>

            <div class="">

                <x-admin-panel>

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
                            Mortgage
                            <small>
                                <a href="{{ route('property.mortgage.create', $property ) }}">Add</a>
                            </small>
                        </h2>

                        <p>
                            Please add mortgage information
                        </p>

                    @endif

                </x-admin-panel>

                <x-admin-panel>

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

                </x-admin-panel>


                <x-admin-panel>

                    <h2 class="flex justify-between">
                        Subscriptions
                        
                        @if( !is_null( $property->subscriptions ) && $property->subscriptions->count() == 0 )
                            <a href="{{ route('property.subscription.index', $property ) }}">
                                <small>
                                    View
                                </small>
                            </a>
                        @else
                            <a href="{{ route('property.subscription.create', $property ) }}">
                                <small>
                                    Add
                                </small>
                            </a>
                        @endif
                        
                    </h2>

                    <p class="mb-0">Please Add subscription information</p>

                </x-admin-panel>

                <x-admin-panel>

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

                </x-admin-panel>

                <x-admin-panel>

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

              </x-admin-panel>

        </div>
    </div>


</x-app-layout>
