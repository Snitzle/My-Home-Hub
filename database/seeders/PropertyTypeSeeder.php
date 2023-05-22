<?php

namespace Database\Seeders;

use App\Models\PropertyType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PropertyTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $property_types = [
            'Flat',
            'Bungalow',
            'Cottage',
            'Terraced House',
            'Semi-detached House',
            'End-of-terrace House',
        ];

        foreach ( $property_types as $type ) {

            PropertyType::create([
                'name' => $type
            ]);

        }

    }
}
