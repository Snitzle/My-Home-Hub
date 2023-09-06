<?php

namespace Database\Seeders;

use App\Models\PropertyBill;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PropertyBillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $bills = [
            [
                'property_id' => 1,
                'title' => 'Gas',
                'price' => rand(1000, 12000),
                'description' => 'This is the description for the gas bill',
                'bill_date' => Carbon::now()->format('Y-m-d')
            ],[
                'property_id' => 1,
                'title' => 'Electric',
                'price' => rand( 500, 8000 ),
                'description' => 'This is a bill description',
                'bill_date' => Carbon::now()->format('Y-m-d')
            ],[
                'property_id' => 1,
                'title' => 'Council Tax',
                'price' => 15000,
                'description' => 'This is a bill description',
                'bill_date' => Carbon::now()->format('Y-m-d')
            ],
        ];


        foreach ( $bills as $bill ) {

            PropertyBill::create( $bill );

        }

    }
}
