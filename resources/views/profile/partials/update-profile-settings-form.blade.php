<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Profile Settings') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Update your account's settings.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="more_frequent_reminders"
{{--                           value="__('Some people require nudges more often than others. Would you like more frequent reminders?')" class="mb-4"/>--}}
                           :value="__('More frequent reminders?')" class="mb-4"/>

            <label class="relative inline-flex items-center cursor-pointer">
                <input type="checkbox" value="" name="more_frequent_reminders" class="sr-only peer">
                <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none  rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
{{--                <span class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-300">Toggle me</span>--}}
            </label>


            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div class="flex items-center gap-4">

            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
