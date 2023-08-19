<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        City::create([
            'name' => 'cairo',
        ]);

        City::create([
            'name' => 'Alexandria',
        ]);

        City::create([
            'name' => 'Port Said',
        ]);

        City::create([
            'name' => 'Tanta',
        ]);

        City::create([
            'name' => 'Asyut',
        ]);

        City::create([
            'name' => 'Faiyum',
        ]);

        City::create([
            'name' => 'Zagazig',
        ]);

        City::create([
            'name' => 'Ismailia',
        ]);

        City::create([
            'name' => 'Aswan',
        ]);

        City::create([
            'name' => 'Damietta',
        ]);

        City::create([
            'name' => 'Minya',
        ]);

        City::create([
            'name' => 'Beni Suef',
        ]);

        City::create([
            'name' => 'Luxor',
        ]);
    }
}
