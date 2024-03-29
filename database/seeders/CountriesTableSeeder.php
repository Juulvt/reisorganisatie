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
                'name' => 'Netherlands'
            ],
            [
                'name' => 'France'
            ],
            [
                'name' => 'Spain'
            ],
            [
                'name' => 'Germany'
            ]
        ];

        foreach($countries as $key => $value) {
            Country::create($value);
        }
    }
}
