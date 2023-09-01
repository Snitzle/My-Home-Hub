<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">

            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Boiler') }}
            </h2>

            <div class="">

                <a href="{{ route('property.boiler.create', $property->id ) }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded mr-4">
                    Add a Service
                </a>

                <a href="{{ route('property.boiler.create', $property->id ) }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded mr-4">
                    Edit Active Boiler
                </a>

                <a href="{{ route('property.boiler.create', $property->id ) }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded mr-4">
                    Add a Boiler
                </a>

                <a href="{{ route('property.show', $property->id ) }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                    Back to Property
                </a>

            </div>
        </div>
    </x-slot>

    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="grid grid-cols-[2fr,1fr] gap-4">

                <div class="">

                    @if( is_null( $boiler ) )
                        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-4">
                            <div class="p-6 text-gray-900">
                                You don't have an active boiler for this property.
                                <a href="{{ route('property.boiler.create', $property->id ) }}" class="underline">
                                    Please add a boiler.
                                </a>
                            </div>
                        </div>
                    @endif

                    <h2 class="mb-4">Services</h2>

                    @if( count( $boiler->services ) > 0 )
                        @foreach( $boiler->services as $service )

                        <a href="{{ route( 'property.bill.show', [ $property->id, $bill->id ] ) }}">
                            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-4">
                                <div class="p-6 text-gray-900">

                                    <div class="flex justify-between">

                                        <div class="">

                                            <h3>Service Name</h3>

                                            <p>Description</p>

                                        </div>

                                        <div class="">

                                            <small><strong>Price </strong></small>

                                        </div>

                                    </div>

                                </div>
                            </div>
                        </a>
                    @endforeach
                    @else
                        <p>Add your next service.</p>
                    @endif

                </div>

                @if( !is_null( $boiler) )

                    <div class="">

                        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-4">
                            <div class="p-6 text-gray-900">

                                <div class="mb-4">
                                    <h3 class="mb-0">Make</h3>
                                    <p>{{ $boiler->make }}</p>
                                </div>

                                <div class="mb-4">
                                    <h3 class="mb-0">Model</h3>
                                    <p>{{ $boiler->model }}</p>
                                </div>

                                <div class="mb-4">
                                    <h3 class="mb-0">Boiler Type</h3>
                                    <p>{{ config( 'boiler.type' )[ $boiler->type ] }}</p>
                                </div>

                                <div class="">
                                    <h3 class="mb-0">Install Date</h3>
                                    <p>{{ $boiler->install_date->format('d/m/Y') }}</p>
                                </div>

                            </div>
                        </div>

                        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-4">
                            <div class="p-6 text-gray-900">

                                <div class="">

                                    <h3 class="mb-0">Location</h3>
                                    <p>Kitchen</p>

                                </div>

                            </div>
                        </div>

                        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-4">
                            <div class="p-6 text-gray-900">

                                <div class="">

                                    <h3 class="mb-0">Next Service Date</h3>

                                    @if( count( $boiler->services ) == 0 )
                                        <p class="mb-0">You need to book a new boiler service</p>
                                    @endif

                                </div>

                            </div>
                        </div>

                    </div>

                @endif


            </div>

            <h3>
                Previous Boilers
            </h3>

        </div>
    </div>

</x-app-layout>

