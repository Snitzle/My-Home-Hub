<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Property;
use App\Models\PropertyBill;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PropertyBillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        foreach ( Property::all() as $property ) { 

            $bills = [
                [
                    'property_id' => $property->id,
                    'title' => 'Gas',
                    'price' => rand(1000, 12000),
                    'description' => 'This is the description for the gas bill',
                    'bill_date' => Carbon::now()
                ],[
                    'property_id' => $property->id,
                    'title' => 'Electric',
                    'price' => rand( 500, 8000 ),
                    'description' => 'This is a bill description',
                    'bill_date' => Carbon::now()
                ],[
                    'property_id' => $property->id,
                    'title' => 'Council Tax',
                    'price' => 15000,
                    'description' => 'This is a bill description',
                    'bill_date' => Carbon::now()
                ],
            ];

            foreach ( $bills as $bill ) {

                PropertyBill::create( $bill );

            }
            
        }

    }
}
