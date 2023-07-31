<?php

namespace Database\Seeders;

use App\Models\PropertyMortgageRateType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PropertyMortgageRateTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $mortgage_types = [
            'Fixed-rate',
            'Tracker',
            'Standard Variable Rate',
            'Interest Only',
        ];

        foreach ( $mortgage_types as $type ) {

            PropertyMortgageRateType::create([
                'name' => $type,
            ]);

        }
    }
}
