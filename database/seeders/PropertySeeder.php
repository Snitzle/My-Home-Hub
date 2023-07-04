<?php

namespace Database\Seeders;

use App\Models\Address;
use App\Models\Property;
use App\Models\PropertyType;
use Faker\Factory;
use Illuminate\Database\Seeder;

class PropertySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $faker = Factory::create();

        for ( $i = 1; $i < 10; $i++ ) {

            // Create Address for house
            // ToDo: Make this rely on a property
            $address_data = [
                'user_id' => 1,
                'alias' => $faker->name,
                'address_1' => $faker->numberBetween( 0, 400 ) . $faker->streetName,
                'address_2' => '',
                'address_3' => '',
                'town' => $faker->city,
                'county' => '',
                'postcode' => $faker->postcode,
                'country' => $faker->countryCode
            ];

            $address = Address::create( $address_data );

            $property_data = [
                'property_type_id' => random_int( 1, PropertyType::count() ),
                'name' => $faker->name,
                'address_id' => $address->id,
                'purchase_date' => $faker->date,
                'move_in_date' => $faker->date,
                'price' => $faker->numberBetween( 3000000, 200000000 ),
                'year_built' => $faker->year,
                'user_id' => 1,
            ];

            $property = Property::create( $property_data );

        }

    }
}
