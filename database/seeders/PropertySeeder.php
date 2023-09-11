<?php

namespace Database\Seeders;

use App\Models\Address;
use App\Models\Country;
use App\Models\Property;
use App\Models\PropertyType;
use App\Models\User;
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

        $home_titles = ['Primary Home', 'Holiday Home', 'Rental Property'];

        foreach ( User::all() as $user ) {

            for ( $i = 0; $i < 3; $i++ ) {

                $property_data = [
                    'property_type_id' => random_int( 1, PropertyType::count() ),
                    'name' => $home_titles[$i],
                    'purchase_date' => $faker->date,
                    'move_in_date' => $faker->date,
                    'price' => $faker->numberBetween( 3000000, 200000000 ),
                    'year_built' => $faker->year,
                    'user_id' => $user->id,
                ];
    
                $property = Property::create( $property_data );
    
                $address_data = [
                    'alias' => $faker->name,
                    'company' => $faker->company,
                    'address_1' => $faker->numberBetween( 0, 400 ) . " " . $faker->streetName,
                    'address_2' => '',
                    'address_3' => '',
                    'town' => $faker->city,
                    'county' => '',
                    'postcode' => $faker->postcode,
                    'country_id' => Country::all()->random()->id,
                    'property_id' => $property->id
                ];
    
                $address = Address::create( $address_data );
    
                // Create Boiler
    
            }
            
        }

    }
}
