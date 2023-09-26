<div class="">

    <div class="overflow-hidden sm:rounded-lg mb-4 lg:hidden text-center">
        <div class="text-white">

            <h2 class="font-bold text-2xl mb-4">
                Menu
            </h2>

            <ul>

                <x-responsive-nav-link :href="route('property.job.index', $property )">
                    Jobs
                </x-responsive-nav-link>

                <x-responsive-nav-link :href="route('property.bill.index', $property )">
                    Bills
                </x-responsive-nav-link>

                <x-responsive-nav-link :href="route('property.boiler.index', $property )">
                    Boiler
                </x-responsive-nav-link>

                <x-responsive-nav-link :href="route('property.job.index', $property )">
                    Subscriptions
                </x-responsive-nav-link>

                <x-responsive-nav-link :href="route('property.job.index', $property )">
                    Bin Days
                </x-responsive-nav-link>

                <x-responsive-nav-link :href="route('property.room.index', $property )">
                    Rooms
                </x-responsive-nav-link>

                <x-responsive-nav-link :href="route('property.job.index', $property )">
                    Contents
                </x-responsive-nav-link>

                <x-responsive-nav-link :href="route('property.job.index', $property )">
                    Files
                </x-responsive-nav-link>

                <x-responsive-nav-link :href="route('property.options.show', $property )">
                    Options
                </x-responsive-nav-link>

            </ul>

        </div>
    </div>

</div>
