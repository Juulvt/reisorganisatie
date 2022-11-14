<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CountriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $countries = [
            [
                'name' => 'nederland'
            ],
            [
                'name' => 'frankrijk'
            ],
            [
                'name' => 'spanje'
            ],
            [
                'name' => 'duitsland'
            ]
        ];

        foreach($countries as $key => $value) {
            Country::create($value);
        }
    }
}
