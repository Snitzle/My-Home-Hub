<?php

namespace Database\Seeders;

use App\Models\Job;
use App\Models\Property;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory;

class JobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $faker = Factory::create();

        // Add 20 jobs for each property
        foreach ( Property::all() as $property ) {

            for ( $i = 0; $i < 20; $i++ ) {

                $job_data = [
                    'title' => $faker->jobTitle,
                    'description' => $faker->text,
                    'price' => random_int(1, 500000),
                    'property_id' => $property->id
                ];

                Job::create( $job_data );

            }

        }

    }
}
