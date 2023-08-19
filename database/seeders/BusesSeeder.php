<?php

namespace Database\Seeders;

use App\Models\Bus;
use App\Models\Trip;
use Illuminate\Database\Seeder;

class BusesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $trips = Trip::all();

        foreach ($trips as $trip) 
        {
            Bus::create([
                'trip_id' => $trip->id,
                'total_seats'=> 12 ,
                'available_seats' => rand(1,12),
            ]);
        }
    }
}
