<?php

namespace Database\Seeders;

use Database\Factories\LocationFactory;
use App\Models\Location;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //$this->call(LocationsTableSeeder::class);
        Location::factory(100)->create();
    }
}
