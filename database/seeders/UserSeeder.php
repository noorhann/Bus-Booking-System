<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'user 1' ,
            'email' => 'user1@example.com',
            'password' => bcrypt('12345678'),
        ]);

        User::create([
            'name' => 'user 2',
            'email' => 'user2@example.com',
            'password' => bcrypt('12345678'),
        ]);

        User::create([
            'name' => 'user 3',
            'email' => 'user3@example.com',
            'password' => bcrypt('12345678'),
        ]);


    }
}
