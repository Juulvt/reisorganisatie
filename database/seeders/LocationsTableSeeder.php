<?php

namespace Database\Seeders;

use App\Models\Location;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LocationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $locations = [
            [
                'name' => 'Amsterdam',
                'country' => 'Netherlands',
                'type' => 'Hotel',
                'description' => 'Dit is een geweldig hotel, je moet hier echt naar toe',
                'max_amount_visitors' => 2,
                'is_available' => true,
                'image_path' => 'Emptry'
            ],
            [
                'name' => 'Rotterdam',
                'country' => 'Netherlands',
                'type' => 'Hotel',
                'description' => 'Dit is een mooi hotel, je moet hier echt naar toe',
                'max_amount_visitors' => 5,
                'is_available' => true,
                'image_path' => 'Empty'
            ],
            [
                'name' => 'Den Haag',
                'country' => 'Netherlands',
                'type' => 'Hotel',
                'description' => 'Echt een geweldig hotel, maar het is gesloten deze zomer',
                'max_amount_visitors' => 4,
                'is_available' => false,
                'image_path' => 'Empty'
            ]
        ];
        
        foreach($locations as $key => $value) {
            Location::create($value);
        }
    }
}
