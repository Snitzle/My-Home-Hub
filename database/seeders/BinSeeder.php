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

        $bins = [
            [
                'name' => 'Regular Waste',
                'colour' => '#0c9702'
            ],
            [
                'name' => 'Recycling Waste',
                'colour' => '#1D78CD'
            ],
            [
                'name' => 'Garden Waste',
                'colour' => '#c75c1a'
            ],
        ];

        foreach ( Property::all() as $property ) { 

            for ( $i = 0; $i < 3; $i++ ) {

                Bin::create([
                    'property_id' => $property->id,
                    'name' => $bins[ $i ]['name'],
                    'collection_day' => rand(0, 6),
                    'colour' => $bins[ $i ]['colour'],
                    'collection_frequency' => rand(1, 3),
                    'last_collected_at' => Carbon::now()->subDays( rand( 0, 7 ) )->format('Y-m-d'),
                    'reminder_frequency' => rand(0,1),
                    'remind_days_before_collection' => rand( 1, 2 )
                ]);    

            }

        }

    }
}
