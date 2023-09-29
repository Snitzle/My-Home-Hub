<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Reminder;
use Illuminate\Console\Command;
use App\Notifications\TakeOutBin;
use Illuminate\Support\Facades\Log;

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
        /**
         * Loop through all the users 
         * Get their bins
         * Check if they have bin reminders on
         * Check if they have a reminder for the bin, if not create one.
         * Check if the bin is due for collection based on the reminder frequency and the last_reminded_at field and the days to be reminded before.
         * If it is, queue up a reminder to be sent and update the last_reminded_at field
         */
        
        $users = User::where('id', 1)->with('properties.bins')->get();

        foreach ( $users as $user ) {

            $user_id = $user->id;

            if ( $user->bin_day_notifications === 0 ) {

                Log::debug("$user_id: User has disabled bin day notifications");
                continue;

            }

            // Log::debug("$user_id: User has enabled bin day notifications");

            // Loop through the users properties
            foreach ( $user->properties as $property ) {

                // Loop through the properties bins
                foreach ( $property->bins as $bin ) {
                
                    // Check if the bin is due for collection
                    Log::debug( "Next Collection Day: " . $bin->next_collection_day() );
                    Log::debug( "Next Collection Day: " . $bin->next_collection_day()->diffInDays( Carbon::now() ) . " days" );
                    
                    if ( $bin->next_collection_day()->diffInDays( Carbon::now() ) > $bin->remind_days_before_collection ) {

                        $bin_id = $bin->id;
    
                        Log::debug( "$bin_id: Bin is not due for collection" );
                        continue;
    
                    }

                    // Send a Reminder
                    
                    // Check for the last Bin reminder sent
                    // if ( is_null( $bin->reminder ) ) {

                    //     $bin_id = $bin->id;

                    //     Log::debug( "$bin_id: No bin reminder found" );

                    //     continue;

                    // }


                        // // Send a reminder
                        // $bin_reminder = Reminder::create([
                        //     'user_id' => $user->id,
                        //     'name' => $bin->name,

                        //     'type' => config('reminder.reminder_type')['bin'],
                        //     'last_reminded_at' => Carbon::now()
                        // ]);
    
                        // $bin_id = $bin->id;
    
                        // Log::debug( "$bin_id: Bin reminder created" );
    
                    $bin_id = $bin->id;

                    $user->notify( new TakeOutBin() );
                    
                    // Send Bin Reminder using Laravel Notification here
                    // Notification::send( $user, new BinReminder( $bin ) );
    
                    Log::debug( "$bin_id: Bin reminder sent" );
                    
                    
                } 

            }    

        }

        Log::debug('Bin day notifications complete');

    }


}

