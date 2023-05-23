<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Food>
 */
class FoodFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'name' => fake()->name(),
            'detail' => fake()->asciify('food-****'),
            'price'=> fake()->numberBetween(10000, 100000),
            'produced_on' => now(),
            'img' => 'anh'.rand(1,10).'.jpg',
            'category_id' => rand(6,8),
        ];
    }
}
