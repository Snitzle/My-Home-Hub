<?php

namespace App\Console\Commands;

use App\Models\Reminder;
use Illuminate\Console\Command;

class ScanReminders extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:scan-reminders';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Scan all reminders in the system and send out notifications if they are due.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        
        // Does this need to be a service class like in the docs? https://laravel.com/docs/10.x/artisan#command-structure

        // Get all the reminders
        $reminders = Reminder::where('completed', 0)->get();

        // Loop through the reminders
        foreach ( $reminders as $reminder ) {

            // Check if bin day reminders are enabled for this user
            if ( $reminder->type == Reminder::TYPE['bin'] ) {

                if ( $reminder->user->bin_day_notifications === 0 ) {

                    continue;

                }

            }

            
            if ( $reminder->isDue() ) {

                $reminder->sendNotification();

            }

        }



    }
}
