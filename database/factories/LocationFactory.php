<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Location>
 */
class LocationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->unique()->sentence(),
            'country' => $this->faker->country(),
            'type' => 'Hotel',
            'description' => $this->faker->realText($maxNbChars = 50),
            'max_amount_visitors' => $this->faker->numberBetween(1,10),
            'is_available' => true,
            'image_path' => $this->faker->imageUrl(640,480)
        ];
    }
}
