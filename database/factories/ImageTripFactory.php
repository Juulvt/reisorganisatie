<?php

namespace Database\Factories;

use App\Models\Trip;
use App\Models\Image;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ImageTripFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'trip_id' => Trip::inRandomOrder()->first()->id,
            'image_id' => Image::inRandomOrder()->first()->id
        ];
    }
}
