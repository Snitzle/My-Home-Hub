<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Property;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

         User::factory()->create([
             'name' => 'Admin',
             'email' => 'admin@myhomehub.com',
         ]);

        $this->call([
            PropertyTypeSeeder::class,
        ]);

        Property::create([
            'name' => 'Home Base',
        ]);

    }
}
