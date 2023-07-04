<x-app-layout>
    <x-slot name="header">

        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __($property->address->address_1 ) }}
        </h2>

{{--        <a href="{{ route('property.edit') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">--}}
{{--            save--}}
{{--        </a>--}}

    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-12">
        <div class="">
            <div class="grid grid-cols-2 gap-4">
                <div class="">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900">

                            <form action="{{ route( 'property.update', $property->id ) }}" method="POST">

                                @csrf
                                <div class="flex flex-wrap">

                                    <div class="w-full mb-4">
                                        <label for="name">
                                            Property Name
                                            <input type="text" name="name" placeholder="Property Name" value="{{ $property->name }}">
                                        </label>
                                    </div>

                                    <div class="w-full mb-4">
                                        <label for="purchase_date">
                                            Purchase Date
                                            <input type="text" name="purchase_date" placeholder="Property purchase date" value="{{ $property->purchase_date }}">
                                        </label>
                                    </div>

                                    <div class="w-full mb-4">
                                        <label for="move_in_date">
                                            Move in Date
                                            <input type="text" name="move_in_date" placeholder="Move in Date" value="{{ $property->move_in_date }}">
                                        </label>
                                    </div>

                                    <div class="w-full mb-4">
                                        <label for="price">
                                            Price
                                            <input type="text" name="purchase_date" placeholder="Property purchase date" value="{{ '£' . number_format( $property->price , 2 ) }}">
                                        </label>
                                    </div>

                                    <div class="w-full mb-4">
                                        <label for="price">
                                            Year property was built
                                            <input type="text" name="year_built" placeholder="Year property was build" value="{{ $property->year_built }}">
                                        </label>
                                    </div>

                                </div>

                                <button type="submit">
                                    Update
                                </button>

                            </form>

                        </div>
                    </div>
                </div>

                <div class="">

                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-4">
                        <div class="p-6 text-gray-900">

                            <h2>Address</h2>

                            <p>Put Mortgage stats here</p>

                        </div>
                    </div>


                </div>

            </div>

        </div>
    </div>



</x-app-layout>
