<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\Trip;
use Illuminate\Database\Seeder;

class TripSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $numberOfRecords = 10;
        Trip::factory($numberOfRecords)->create();
    }
}
