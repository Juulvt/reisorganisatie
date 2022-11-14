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
                'image_path' => '/public/images/amsterdam.jpg'
            ],
            [
                'image_path' => '/public/images/denhaag.jpg'
            ],
            [
                'image_path' => '/public/images/rotterdam.jpg'
            ]
        ];

        foreach($images as $key => $value) {
            Image::create($value);
        }
    }
}
