<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ $bill->name }}
            </h2>

            <div class="">

                <a href="{{ route('property.bill.index', [$property->id] ) }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded mr-4">
                    Back to Jobs List
                </a>

                <a href="{{ route('property.bill.edit', [$property->id, $bill->id] ) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-4">
                    Update
                </a>

{{--                <a href="{{ route('property.bill.destroy', [$property->id, $bill->id] ) }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded mr-4">--}}
{{--                    Complete Job--}}
{{--                </a>--}}

                <a href="{{ route('property.bill.destroy', [$property->id, $bill->id] ) }}" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                    Delete Job
                </a>

            </div>
        </div>
    </x-slot>

    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mb-8">

            <div class="grid grid-cols-[2fr,1fr] gap-4">

                <div class="">

                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-4">
                        <div class="p-6 text-gray-900">

{{--                            <p class="mb-4">--}}
{{--                                {{ $bill->title }}--}}
{{--                            </p>--}}
                            <h3>Description</h3>
                            <p class="mb-4">
                                {{ $bill->description }}
                            </p>

                        </div>
                    </div>

                </div>

                <div class="">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-4">
                        <div class="p-6 text-gray-900">

                            <div class="mb-4">
                                <h3>Price</h3>
                                <p class="">
                                    {{ '£' . number_format( $bill->price / 100 , 2 ) }}
                                </p>
                            </div>

                            <div class="">
                                <h3>Provider</h3>
                                <p class="">
                                    Put more information about the bill here
                                </p>
                            </div>

                        </div>
                    </div>
                </div>

            </div>

        </div>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-[1fr,1fr] gap-4">

                <div class="">
                    <div class="">
                        <div class="flex justify-between items-center mb-6">

                            <h2 class="font-semibold text-xl text-gray-800 leading-tight mb-0">
                                Comments
                            </h2>

                            <div class="">

                                <a href="{{ route('property.job.comment.create', [$property->id, $bill->id] ) }}"
                                   class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                    Add a Comment
                                </a>

                            </div>
                        </div>
                    </div>

                    @if( session()->has('success') )
                        <p class="text-green-500">Comment Deleted</p>
                    @endif

{{--                    @if( count( $bill->comments ) > 0 )--}}
{{--                        @foreach( $bill->comments as $comment )--}}

{{--                            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-4 relative">--}}

{{--                                <div class="absolute top-6 right-6 flex justify-end items-center">--}}

{{--                                    <a  href="{{ route('property.job.comment.edit', [ $property->id, $bill->id, $comment->id ] ) }}"--}}
{{--                                        class="mr-4">--}}
{{--                                        <i class="fa-solid fa-pen-to-square"></i>--}}
{{--                                    </a>--}}

{{--                                    <form action="{{ route('property.job.comment.destroy', [ $property->id, $bill->id, $comment->id ]) }}"--}}
{{--                                          method="POST"--}}
{{--                                          class="">--}}

{{--                                            @csrf--}}
{{--                                            @method('DELETE')--}}

{{--                                        <button type="submit">--}}
{{--                                            <i class="fa-solid fa-trash text-red-500"></i>--}}
{{--                                        </button>--}}

{{--                                    </form>--}}

{{--                                </div>--}}

{{--                                <div class="p-6 text-gray-900">--}}

{{--                                    <h3>--}}
{{--                                        {{ $comment->title }}--}}
{{--                                    </h3>--}}

{{--                                    --}}{{-- Instead of this, save HTML from a text editor instead --}}
{{--                                    <p>--}}
{{--                                        {!! nl2br( $comment->content ) !!}--}}
{{--                                    </p>--}}

{{--                                </div>--}}
{{--                            </div>--}}

{{--                        @endforeach--}}
{{--                    @else--}}

{{--                        <small>No comments</small>--}}

{{--                    @endif--}}

                </div>

            </div>
        </div>

    </div>

</x-app-layout>

