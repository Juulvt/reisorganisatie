<?php

namespace Database\Seeders;

use App\Models\Attribute;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AttributesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $attributes = [
            [
                'description' => 'prachtig uitzicht'
            ],
            [
                'description' => 'privé zwembad'
            ],
            [
                'description' => 'ontbijt inbegrepen'
            ],
            [
                'description' => 'mooie natuur'
            ]
        ];

        foreach($attributes as $key => $value) {
            Attribute::create($value);
        }
    }
}
