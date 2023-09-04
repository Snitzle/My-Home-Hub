<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Property;
use Carbon\Carbon;
use App\Models\Bin;

class BinSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        foreach ( Property::all() as $property ) { 

            Bin::create([
                'property_id' => $property->id,
                'name' => 'Regular Waste',
                'collection_day' => rand(0, 6),
                'colour' => '#0c9702',
                'collection_frequency' => rand(0, 1),
                'last_collected_at' => Carbon::now()->subWeeks(1),
                'reminder_frequency' => rand(0,1),
                'remind_days_before_collection' => rand(1, 2)
            ]);

            Bin::create([
                'property_id' => $property->id,
                'name' => 'Recycling Waste',
                'collection_day' => rand(0, 6),
                'colour' => '1D78CD',
                'collection_frequency' => rand(0, 1),
                'last_collected_at' => Carbon::now()->subWeeks(1),
                'reminder_frequency' => rand(0,1),
                'remind_days_before_collection' => rand(1, 2)
            ]);
            
        }

    }
}
