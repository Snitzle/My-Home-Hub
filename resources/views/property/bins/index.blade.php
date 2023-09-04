<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">

            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Bins') }}
            </h2>

            <div class="flex justify-end">

                <a href="{{ route('property.bin.create', $property->id ) }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded mr-4">
                    Add a Bin
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

                    @foreach( $property->bins as $bin )

                        <div class=" relative bg-white overflow-hidden shadow-sm sm:rounded-lg mb-4">

                            <div class="absolute top-0 left-0 right-0 h-4 z-10" style="background-color: {{ $bin->colour }}"></div>

                            <div class="p-6 pt-10 text-gray-900">

                                    <div class="flex justify-between">

                                        <h3>{{ $bin->name }}</h3>

                                        <div class="flex justify-between">

                                            <a class="mr-4" href="{{ route( 'property.bin.show', [ $property->id, $bin->id ] ) }}">
                                                <h3><small>View</small></h3>
                                            </a>

                                            <form action="{{ route('property.bin.destroy', [ $property, $bin->id ]) }}"
                                                  method="POST"
                                                  class="">

                                                @csrf
                                                @method('DELETE')

                                                <button type="submit">
                                                    <i class="fa-solid fa-trash text-red-500"></i>
                                                </button>

                                            </form>
                                        </div>

                                    </div>

                            </div>
                        </div>

                    @endforeach

                </div>

                <div class="">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-4">
                        <div class="p-6 text-gray-900">

                            <h3>Extra Bin Information</h3>



                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>

</x-app-layout>

