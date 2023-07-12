<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">

            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ 'Update' }}
            </h2>

            <div class="">

                <a href="{{ route('property.job.update', [ $property->id, $job->id ] ) }}" id="job-update__submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Save
                </a>

            </div>
        </div>
    </x-slot>

    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="grid grid-cols-[2fr,1fr] gap-4">

                <div class="">

                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-4">
                        <div class="p-6 text-gray-900">

                            <form method="POST" action="{{ route('property.job.update', [ $property->id, $job->id ]) }}" id="job-update__form">
                                @csrf
                                @method("PATCH")

                                <label for="title">

                                    <small>Title</small>
                                    <input type="text" class="input-control" name="title" value="{{ $job->title }}">

                                </label>

                                <label for="description">

                                    <small>Description</small>
                                    <textarea type="text" class="input-control" name="description" value="">{{ $job->description }}</textarea>

                                </label>

                                <label for="price">
                                    <small>Price</small>
                                    <input type="text" class="input-control" name="price" value="{{ '£' . number_format( $job->price / 100 , 2 ) }}">
                                </label>

                            </form>
                        </div>
                    </div>

                </div>

                <div class="">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-4">
                        <div class="p-6 text-gray-900">
                            <h2>Job stats</h2>
                            <p>Attach Invoice</p>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>

    <script>

        let update = document.querySelector('#job-update__submit');

        update.addEventListener('click', function ( e ) {

            e.preventDefault()

            let form = document.querySelector('#job-update__form');

            console.log(form);

            form.submit();

            return false;

        });

    </script>

</x-app-layout>

