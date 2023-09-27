<x-app-layout>

    <x-slot name="navigation">
        @include('layouts.navigation' )
    </x-slot>

    <x-slot name="header">

        <div class="flex justify-between items-center">

            <x-admin-page-title>
                {{ __('Reminders') }}
            </x-admin-page-title>

            <div class="flex gap-4">

                <x-primary-link href="{{ route('reminder.create') }}">
                    Create Reminder
                </x-primary-link>

                <x-secondary-button>
                    View Completed Reminders
                </x-secondary-button>

            </div>

        </div>
    </x-slot>

    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="grid grid-cols-[2fr,1fr] gap-4">

                <div class="">
                    @if( $reminders->count() > 0 )
                        @foreach( $reminders as $reminder )
                            {{-- <a href="{{ route( 'property.job.show', $reminder ) }}"> --}}
                                <div class="mb-4">
                                    <x-admin-panel>
                                        <div class="flex justify-between">
                                            <div class="">
                                                {{ $reminder->name }}
                                            </div>
                                            <div class="">
                                                {{ ucwords( str_replace('_', ' ', array_search( $reminder->reminder_frequency, config('cron') ) ) ) }}
                                            </div>
                                        </div>
                                    </x-admin-panel>
                                </div>
                            {{-- </a> --}}
                        @endforeach
                    @else
                        <p>No Reminders</p>
                    @endif
                </div>
                

            </div>

        </div>
    </div>

</x-app-layout>

