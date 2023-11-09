<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Inventory>
 */
class InventoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $faker = \Faker\Factory::create();
        $faker->addProvider(new \FakerRestaurant\Provider\en_US\Restaurant($faker));

        $units = ['gram','liters','items'];
        return [
            'name' => $faker->foodName(),
            'price' => fake()->numberBetween($min = 1500, $max = 6000),
            'amount' => fake()->randomDigit(),
            'unit' => $units[rand(0,2)],
        ];
    }
}
