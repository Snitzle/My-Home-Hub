<?php

namespace App\Console\Commands;

use App\Models\Reminder;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Console\Command;

class BinDayNotifications extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:bin-day-notifications';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {

        // ToDo: Optimise this into a generator to use less memory
        $users = User::all();

        foreach ( $users as $user ) {

            if ( !$user->bin_day_notifications ) {
                continue;
            }

            $bins = $user->bins;

            if ( is_null( $bins ) || count( $bins ) === 0 ) {
                continue;
            }

            // check the users notification frequency for bins
            foreach ( $bins as $bin) {

                // Work out by taking the last collected date and adding the collection frequency, is it within the remind_days_before_collection
                // If this is met, it needs to check if the last notification has been sent
                // Could I set a "next_notification" datetime to make it easier to check
                // Turn this into a guard to stop nesting
                if ( $bin->next_collection_day->diffInDays( new Carbon() ) > $bin->remind_days_before_collection ) {
                    continue;
                }

                $bin_reminder = Reminder::where( 'user_id', $user->id )->where('type', config('reminder.reminder_type')['bin'] )->first();
//                $next_reminder =


                // if there is no last collected date, send a reminder to set a collected date

            }

        }


    }
}
