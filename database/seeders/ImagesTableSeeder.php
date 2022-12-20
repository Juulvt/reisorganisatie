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
                'image_path' => '/images/locations/amsterdam.jpg',
                'order' => 0
            ],
            [
                'image_path' => '/images/locations/denhaag.jpg',
                'order' => 1
            ],
            [
                'image_path' => '/images/locations/rotterdam.jpg',
                'order' => 2
            ], 
            [
                'image_path' => '/images/locations/amsterdam.jpg',
                'order' => 3
            ]
        ];

        foreach($images as $key => $value) {
            Image::create($value);
        }
    }
}
