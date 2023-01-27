<?php

namespace Database\Factories;

use App\Models\Accomodation;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Trip>
 */
class TripFactory extends Factory
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
            'description' => $this->faker->unique()->text(),
            'status' => 'active',
            'accomodation_id' => Accomodation::inRandomOrder()->first()->id
        ];
    }
}
