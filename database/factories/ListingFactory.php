<?php

namespace Database\Factories;

use App\Models\Country;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Listing>
 */
class ListingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {


        return [
            'beds' => fake()->numberBetween(1, 7),
            'baths' =>fake()->numberBetween(1, 7),
            'area' =>fake()->numberBetween(30, 400),
            'street' => fake()->streetName(),
            'street_nr' => fake()->numberBetween(10,200),
            'city' => fake()->city(),
            'code' => fake()->postcode(),
            'state' => fake()->word(),
            'country_id' => Country::inRandomOrder()->first()->id,
            'price' => fake()->numberBetween(50_000, 2_000_000)
        ];
    }
}
