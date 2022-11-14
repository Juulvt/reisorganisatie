<?php

namespace Database\Seeders;

use Database\Factories\LocationFactory;
use Database\Factories\AccomodationFactory;
use Database\Factories\AttributeTripFactory;
use Database\Factories\ImageLocationFactory;
use Database\Factories\ImageTripFactory;
use Database\Factories\TripFactory;
use App\Models\Location;
use App\Models\Trip;
use App\Models\Accomodation;
use App\Models\AccomodationType;
use App\Models\Attribute;
use App\Models\AttributeTrip;
use App\Models\Country;
use App\Models\Image;
use App\Models\ImageLocation;
use App\Models\ImageTrip;
use App\Models\Type;
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
        $this->call(AccomodationTypeTableSeeder::class);
        $this->call(AttributesTableSeeder::class);
        $this->call(CountriesTableSeeder::class);
        $this->call(ImagesTableSeeder::class);

        Location::factory(10)->create();
        Accomodation::factory(10)->create();
        Trip::factory(10)->create();
        ImageLocation::factory(40)->create();
        ImageTrip::factory(40)->create();
        AttributeTrip::factory(40)->create();
    }
}
