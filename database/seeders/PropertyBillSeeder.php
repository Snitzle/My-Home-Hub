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
                'name' => 'Gas',
                'price' => 7000,
                'description' => 'This is a bill description',
                'bill_date' => Carbon::now()->format('Y-m-d')
            ],[
                'property_id' => 1,
                'name' => 'Electric',
                'price' => 4500,
                'description' => 'This is a bill description',
                'bill_date' => Carbon::now()->format('Y-m-d')
            ],[
                'property_id' => 1,
                'name' => 'Council Tax',
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
