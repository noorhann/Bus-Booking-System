<?php

namespace Database\Seeders;

use App\Models\IntermediateCity;
use App\Models\Trip;
use Illuminate\Database\Seeder;

class IntermediateCitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $trips = Trip::all();
        
        foreach ($trips as $trip) {

            $sequenceNumber = 1;
            $cityId = 6;
            for ($i = 0; $i <= 2; $i++) 
            {
            
                IntermediateCity::create([
                    'trip_id' => $trip->id,
                    'sequence_number' => $sequenceNumber++,
                    'city_id' => $cityId++,
                ]);
            }
    
        }

    }
}
