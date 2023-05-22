<?php

namespace Database\Seeders;

use App\Models\Address;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Address::create([
            'alias' => 'Home',
            'address_1' => '54 Geneva Avenue',
            'town' => 'Lincoln',
            'county' => 'Lincolnshire',
            'postcode' => 'LN24EB',
            'country' => 'UK' // ISO 3166-1 Alpha 2 codes
        ]);

        // Write model factory to spin out addresses

    }
}
