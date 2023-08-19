<?php

namespace Database\Seeders;

use App\Models\Bus;
use App\Models\Seat;
use Illuminate\Database\Seeder;

class SeatsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $buses = Bus::all();

        foreach ($buses as $bus) {
            for ($i = 0; $i <= 11; $i++) 
            {
                Seat::create([
                    'bus_id' => $bus->id,
                    'is_booked' => rand(0,1),
                    'seat_number' => rand(1, 12),
                ]);
            }
        }
    }
}
