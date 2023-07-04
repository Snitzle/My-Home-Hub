<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Property;
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
             'password' => Hash::make('password')
         ]);

        $this->call([
            PropertyTypeSeeder::class,
            PropertySeeder::class,
            JobSeeder::class
        ]);



    }
}
