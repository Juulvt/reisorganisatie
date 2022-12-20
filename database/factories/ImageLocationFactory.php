<?php

namespace Database\Factories;

use App\Models\Image;
use App\Models\Location;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ImageLocationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'location_id' => Location::inRandomOrder()->first()->id,
            'image_id' => Image::inRandomOrder()->first()->id
        ];
    }
}
