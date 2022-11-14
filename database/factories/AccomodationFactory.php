<?php

namespace Database\Factories;

use App\Models\location;
use App\Models\AccomodationType;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class AccomodationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->unique()->name(),
            'city' => $this->faker->city(),
            'address' => $this->faker->streetAddress(),
            'min_amount_visitors' => rand(1,10),
            'max_amount_visitors' => rand(1,10),
            'cost' => (rand(10000,100000) / 100),
            'location_id' => Location::inRandomOrder()->first()->id,
            'accomodation_type_id' => AccomodationType::inRandomOrder()->first()->id
        ];
    }
}
