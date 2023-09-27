<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Reminder;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ReminderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $admin = User::where('id', 1)->first();

        // Write model factory to spin out reminders
        for ( $i = 0; $i < 30; $i++ ) {
            
            Reminder::create([
                'user_id' => $admin->id,
                'name' => 'Reminder ' . $i,
                'notes' => 'This is a reminder',
                'url' => 'https://www.google.com',
                'start_datetime' => now()->addDays( rand( 0, 30 ) ),
                'type' => rand( 0, 1 ),
                'status' => rand( 0, 1 ),
                'reminder_category_id' => rand( 0, 1 ),
                'reminder_frequency' => array_values( config( 'cron' ) ) [ rand( 0, count( config('cron') ) - 1 ) ],
                'priority' => rand( 0, 1 ),
                'last_reminded_at' => now()->subDays( rand( 0, 30 ) ),
                'completed' => rand( 0, 1 ),
            ]);

        }
        
    }
}
