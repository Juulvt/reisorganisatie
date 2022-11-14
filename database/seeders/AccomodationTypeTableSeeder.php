<?php

namespace Database\Seeders;

use App\Models\AccomodationType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AccomodationTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = [
            [
                'name' => 'hotel'
            ],
            [
                'name' => 'all-inclusive hotel'
            ],
            [
                'name' => 'vakantiehuis'
            ],
            [
                'name' => 'b&b'
            ]
        ];

        foreach($types as $key => $value) {
            AccomodationType::create($value);
        }
    }
}
