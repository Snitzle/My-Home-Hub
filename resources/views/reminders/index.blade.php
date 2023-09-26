<x-app-layout>
    <x-slot name="header">

        <div class="flex justify-between items-center">

            <x-admin-page-title>
                {{ __('Reminders') }}
            </x-admin-page-title>

            <div class="">

                <x-primary-link href="{{ route('reminder.create') }}">
                    Create Reminder
                </x-primary-link>

                <x-secondary-button>
                    Secondary Button
                </x-secondary-button>

            </div>

        </div>
    </x-slot>

    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="grid grid-cols-[2fr,1fr] gap-4">

                <x-admin-panel>
                    @if( $reminders->count() > 0 )
                        @foreach( $reminders as $reminder )
                            <a href="{{ route( 'property.job.show', $reminder ) }}">
                                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-4">
                                    <div class="p-6 text-gray-900">
                                        {{ $reminder->title }}
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    @else
                        <p>No Reminders</p>
                    @endif
                </x-admin-panel>

            </div>

        </div>
    </div>

</x-app-layout>

