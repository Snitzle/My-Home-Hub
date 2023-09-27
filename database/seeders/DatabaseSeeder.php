<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

         User::factory()->create([
             'name' => 'Admin',
             'email' => 'admin@myhomehub.com',
             'password' => Hash::make('password'),
             'bin_day_reminders' => 1,
         ]);

         if ( env('APP_ENV') == 'local' ) {
            User::factory(20)->create();
         }

        $this->call([
            CountrySeeder::class,
            PropertyMortgageRateTypeSeeder::class,
            PropertyTypeSeeder::class,
            PropertySeeder::class,
            VehicleSeeder::class,
            JobSeeder::class,
            PropertyBillSeeder::class,
            BinSeeder::class,
            ReminderCategorySeeder::class,
            ReminderSeeder::class
        ]);



    }
}
