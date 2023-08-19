<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TripFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'start_city' => rand(1, 5), 
            'end_city' => rand(10, 13), 
            'trip_date' => $this->faker->dateTimeBetween('now', '+1 month'),
        ];
    }
}
