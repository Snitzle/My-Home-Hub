<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">

            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Bills') }}
            </h2>

            <div class="">

                <a href="{{ route('property.bill.create', $property->id ) }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded mr-4">
                    Add a Bill
                </a>

                <a href="{{ route('property.show', $property->id ) }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                    Back to Property
                </a>

            </div>
        </div>
    </x-slot>

    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @include('property.partials.notifications')

            <div class="grid grid-cols-[2fr,1fr] gap-4">

                <div class="">

                    @foreach( $property->bills as $bill )
                        <a href="{{ route( 'property.bill.show', [ $property->id, $bill->id ] ) }}">
                            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-4">
                                <div class="p-6 text-gray-900">

                                    <div class="flex justify-between">

                                        <div class="">

                                            <h3>{{ $bill->name }}</h3>

                                            <p>{{ $bill->description }}</p>

                                        </div>

                                        <div class="">

                                            <small><strong>{{ '£' . number_format( $bill->price / 100, 2 ) }}</strong></small>

                                        </div>

                                    </div>

                                </div>
                            </div>
                        </a>
                    @endforeach

                </div>

                <div class="">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-4">
                        <div class="p-6 text-gray-900">

                            <h3>Monthly Bill Cost</h3>

                            <h2>£ {{ number_format( $total_bill_cost / 100, 2 ) }}</h2>

                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>

</x-app-layout>

