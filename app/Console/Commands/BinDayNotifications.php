<?php

namespace App\Console\Commands;

use App\Models\Reminder;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Console\Command;
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

        // ToDo: Optimise this into a generator to use less memory
        $users = User::all();

        foreach ( $users as $user ) {

            $user_id = $user->id;

            if ( $user->bin_day_notifications === 0 ) {

                Log::debug("$user_id: User has disabled bin day notifications");
                continue;

            }

            Log::debug("$user_id: User has enabled bin day notifications");

            foreach ( $user->properties as $property ) {

                foreach ( $property->bins as $bin ) {
                
                    if ( $bin->next_collection_day()->diffInDays( Carbon::now() ) > $bin->remind_days_before_collection ) {

                        $bin_id = $bin->id;
    
                        Log::debug( "$bin_id: Bin is not due for collection" );
                        continue;
    
                    }
    
                    // Check for the last Bin reminder sent
                    $bin_reminder = Reminder::where( 'user_id', $user->id )->where('type', config('reminder.reminder_type')['bin'] )->first();
    
                    if ( $bin_reminder->isEmpty() ) {
    
                        // Send a reminder
                        $bin_reminder = Reminder::create([
                            'user_id' => $user->id,
                            'type' => config('reminder.reminder_type')['bin'],
                            'last_reminded_at' => Carbon::now()
                        ]);
    
                        $bin_id = $bin->id;
    
                        Log::debug( "$bin_id: Bin reminder created" );
    
                    }
    
                    // Send Bin Reminder using Laravel Notification here
                    // Notification::send( $user, new BinReminder( $bin ) );
    
                    Log::debug( "$bin_id: Bin reminder sent" );
                    
                    
                } 

            }    

        }

        Log::debug('Bin day notifications complete');

    }


}

