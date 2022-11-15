<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypesTableSeeder extends Seeder
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
            Type::create($value);
        }
    }
}
