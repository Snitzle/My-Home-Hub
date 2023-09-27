<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ReminderCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ReminderCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        $categories = [
            'Personal',
            'Work',
            'Family',
            'Friends',
            'Other',
            'Health',
            'Finance',
            'Home',
            'Car',
            'Pets',
            'Holidays',
        ];

        foreach ( $categories as $category ) {
            ReminderCategory::create([
                'user_id' => 1, // Admin user
                'name' => $category
            ]);
        }

    }
}
