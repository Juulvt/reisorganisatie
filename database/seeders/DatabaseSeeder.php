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
use App\Models\Type;
use App\Models\Attribute;
use App\Models\AttributeTrip;
use App\Models\Country;
use App\Models\Image;
use App\Models\ImageLocation;
use App\Models\ImageTrip;
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
        //$trips = DB::table('trips')->pluck('id');
        //$attributes = DB::table('attributes')->pluck('id');

        

        $this->call(TypesTableSeeder::class);
        $this->call(AttributesTableSeeder::class);
        $this->call(CountriesTableSeeder::class);
        $this->call(ImagesTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        
        Location::factory(10)->create();
        Accomodation::factory(10)->create();
        Trip::factory(10)->create();
        
        $attributes = Attribute::all();
        $images = Image::all();

        Location::all()->each(function ($location) use ($images) {
            $location->images()->attach(
                $images->random(3)->pluck('id')->toArray(), array('order' => 1)
            );
        });

        Trip::all()->each(function ($trip) use ($attributes, $images) {
            $trip->attributes()->attach(
                $attributes->random(3)->pluck('id')->toArray()               
            );
            $trip->images()->attach(
                $images->random(3)->pluck('id')->toArray(), array('order' => 1)
            );
        });
    }
}
