<?php

namespace Database\Seeders;

use App\Models\IntermediateCity;
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
        $this->call([
            UserSeeder::class,
            CitySeeder::class,
            TripSeeder::class,
            IntermediateCitiesSeeder::class,
            BusesSeeder::class,
            SeatsSeeder::class,
        ]);
    }
}
