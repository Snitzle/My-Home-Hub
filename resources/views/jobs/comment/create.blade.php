<x-app-layout>

    <x-slot name="header">

        <div class="flex justify-between items-center">

            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Create Comment
            </h2>

            <div class="">

                <a href="{{ route('property.job.show', [ $property->id, $job->id ] ) }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded mr-4">
                    Back to Job
                </a>

                <a  href="{{ route('property.job.comment.store', [$property->id, $job->id ] ) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
                    id="comment-create__submit">
                    Save Comment
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

                            <form method="POST"
                                  action="{{ route('property.job.comment.store', [ $property->id, $job->id ]) }}"
                                  id="comment-create__form">

                                @csrf

                                <label for="title">

                                    <small>Title</small>
                                    <input type="text" class="input-control" name="title" value="">

                                </label>

                                <label for="description">

                                    <small>Content</small>
                                    <textarea type="text" class="input-control" name="content" value=""></textarea>

                                </label>

                            </form>
                        </div>
                    </div>

                </div>

            </div>

        </div>
    </div>

    <script>

        let create = document.querySelector('#comment-create__submit');

        create.addEventListener('click', function ( e ) {

            e.preventDefault()

            let form = document.querySelector('#comment-create__form');

            form.submit();

            return false;

        });

    </script>

</x-app-layout>

