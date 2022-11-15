<?php

namespace Database\Seeders;

use App\Models\Image;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ImagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $images = [
            [
                'image_path' => '/images/locations/amsterdam.jpg'
            ],
            [
                'image_path' => '/images/locations/denhaag.jpg'
            ],
            [
                'image_path' => '/images/locations/rotterdam.jpg'
            ]
        ];

        foreach($images as $key => $value) {
            Image::create($value);
        }
    }
}
