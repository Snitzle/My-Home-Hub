<x-app-layout>

    <x-slot name="navigation">
        @include('layouts.navigation' )
    </x-slot>
    
    <x-slot name="header">

        <div class="flex justify-between items-center">

            <x-admin-page-title>
                {{ __('Create Reminder') }}
            </x-admin-page-title>

            <div class="">


            </div>

        </div>

    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-12">
        <div class="">

            {{-- @include('property.partials.notifications') --}}

            <div class="">
                <div class="">

                    <x-admin-panel>

                            <form action="{{ route( 'reminder.store' ) }}" method="POST">

                                @csrf

                                <div class="flex flex-wrap">

                                    <div class="w-full">

                                        <x-input-label for="name" :value="__('Name')" />

                                        <x-text-input id="name"
                                                      class="block mt-1 h-12"
                                                      name="name"
                                                      value="{{ old('name') ?? '' }}" />

                                        <x-input-error :messages="$errors->get('name')" class="mt-2" />

                                    </div>

                                    <div class="w-full">

                                        <x-input-label for="notes" :value="__('Notes')" />

                                        <textarea id="notes"
                                                    class="input-control block mt-1 "
                                                    name="notes"
                                                    placeholder="Use this space to add a description or important information related to the reminder."
                                                    rows="6"
                                                    value="{{ old('notes') ?? '' }}" ></textarea>

                                        {{-- <p>
                                            <small>
                                                Use this space to add a description or important information related to the reminder.
                                            </small>
                                        </p> --}}

                                        <x-input-error :messages="$errors->get('notes')" class="mt-2" />

                                    </div>

                                    <div class="w-full">

                                        <x-input-label for="url" :value="__('URL')" />

                                        <x-text-input id="url"
                                                    class="input-control block mt-1 "
                                                    name="url"
                                                    placeholder="https://"
                                                    value="{{ old('url') ?? '' }}" />

                                        <x-input-error :messages="$errors->get('url')" class="mt-2" />

                                    </div>

                                    <div class="w-full">

                                        <x-input-label for="reminder_file" :value="__('Reminder File Upload')" />

                                        <input type="file" name="reminder_file" id="" class="mb-3">

                                    </div>

                                    {{-- The start_datetime input datepicker --}}
                                    <div class="w-full">

                                        <x-input-label for="start_datetime" :value="__('Start Date')" />

                                        <input id="start_datetime"
                                                type="datetime-local"
                                                class="input-control block mt-1 "
                                                name="start_datetime"
                                                value="{{ old('start_datetime') ?? '' }}" />

                                        <x-input-error :messages="$errors->get('start_datetime')" class="mt-2" />

                                    </div>

                                    <div class="w-full">

                                        <x-input-label for="start_datetime" :value="__('Start Date')" />

                                        {{-- A select with options made from ReminderCategory::all() --}}
                                        <select id="reminder_category_id"  
                                                class="block mt-1 h-12"
                                                name="reminder_category_id"
                                                value="{{ old('reminder_category_id') ?? '' }}" />

                                                @foreach( $reminder_categories as $reminder_category )

                                                    <option value="{{ $reminder_category->id }}">
                                                        {{ $reminder_category->name }}
                                                    </option>

                                                @endforeach

                                        <x-input-error :messages="$errors->get('start_datetime')" class="mt-2" />

                                    </div>

                                    <div class="w-full">

                                        <x-input-label for="reminder_frequency" :value="__('Reminder Frequency')" />

                                        <select id="reminder_frequency"
                                                class="block mt-1 w-full input-control text-black"
                                                name="type">

                                                @foreach( config('cron') as $key => $value )

                                                    <option value="{{ $key }}">
                                                        {{ ucwords( str_replace('_', ' ', $key ) ) }}
                                                    </option>

                                                @endforeach
                                                
                                        </select>

                                    </div>

                                    <div class="w-full">

                                        {{-- How do I want the notification timing to be done? --}}
                                        {{-- 

                                            - Implement Notifications for these through a CRON job that uses a queue and dispatches workers

                                            - I want to be able to set a time for the notification to be sent
                                            - I want to be able to set a day for the notification to be sent

                                            - Not just repeating, but also a one off notification and multiple notifications of a user defined datetime

                                            - I want to be able to set a frequency for the notification to be sent
                                            - I want to be able to set a priority for the notification to be sent
                                            - I want to be able to set an end date and time for the notification to be sent
                                            - I want to be able to set notes on the notification
                                            - I want to be able to set a URL 
                                            - I want to be able to set a Location 
                                            - I want to be able to set a Status
                                            - I want to be able to set a File attached to the notification
                                            - I want to be able to set an image to the notifications
                                            - Invite other users to share a notifications
                                            - Assign notifications to individual lists
                                            - Assign notifications to categories
                                            - Assign notifications to tags

                                            - Add an option to regenerate reminders
                                            
                                        --}}

                                        <x-input-label for="reminder_frequency" :value="__('Reminder Frequency')" />

                                        <div class="">

                                            <x-input-label for="repeat" :value="__('Repeat')" />

                                            <input name="repeat" type="checkbox">

                                        </div>
                                        
                                        <select id="reminder_frequency"  
                                                class="block mt-1 h-12"
                                                name="reminder_frequency"
                                                value="{{ old('reminder_frequency') ?? '' }}" />

                                                
                                                <option value="1">15 Minutes</option>
                                                <option value="2">30 Minutes</option>
                                                <option value="3">45 Minutes</option>
                                                <option value="4">1 Hour</option>
                                                <option value="1">Daily</option>
                                                <option value="2">Weekly</option>
                                                <option value="3">Monthly</option>

                                        </select>

                                        <x-input-error :messages="$errors->get('reminder_frequency')" class="mt-2" />

                                    </div>



                                    <div class="w-full">

                                        <div class="flex justify-start gap-4 items-center">

                                            <div class="">

                                                <x-input-label for="email" :value="__('Email')" />

                                                <input name="email" type="checkbox">

                                            </div>

                                            <div class="">

                                                <x-input-label for="sms" :value="__('SMS')" />

                                                <input name="sms" type="checkbox">

                                            </div>

                                            <div class="">

                                                <x-input-label for="notification" :value="__('Notifications')" />

                                                <input name="notification" type="checkbox">

                                            </div>

                                        </div>

                                        
                                        <x-input-error :messages="$errors->get('reminder_frequency')" class="mt-2" />

                                    </div>

                                </div>

                                <x-primary-button class="mt-4">
                                    Create
                                </x-primary-button>

                            </form>

                    </x-admin-panel>

                </div>

                <div class="">


                </div>

            </div>

        </div>
    </div>



</x-app-layout>
