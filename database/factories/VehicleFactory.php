<?php

namespace Database\Factories;

use Faker\Provider\Fakecar;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Vehicle>
 */
class VehicleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $this->faker->addProvider(new Fakecar($this->faker));
        $vehicle = $this->faker->vehicleArray();

        return [
            'user_id' => 1,
            'make' => $vehicle['brand'],
            'model' => $vehicle['model'],
            'fuel_type' => 'Petrol',
            'registration_number' => $this->faker->vehicleRegistration,
            'purchase_date' =>  $this->faker->dateTimeBetween( "01/01/2008" , "01/01/" . date('Y') ),
            'sale_date' => null,
        ];
    }
}
