<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        $csv = array_map('str_getcsv', file( storage_path('app/import/countries.csv') ) );

        $i = 0;

        foreach ($csv as $row) {

            if ( $i == 0 ) {
                $i++;
                continue;
            } 

            $country = \App\Models\Country::firstOrCreate([
                'name' => $row[0],
                'alpha_2' => $row[1],
                'alpha_3' => $row[2],
                'country_code' => $row[3],
                'iso_3166_2' => $row[4],
                'region' => $row[5],
                'sub_region' => $row[6],
                'intermediate_region' => $row[7],
                'region_code' => $row[8],
                'sub_region_code' => $row[9],
                'intermediate_region_code' => $row[10]
            ]);

            $i++;

        }

    }
}
