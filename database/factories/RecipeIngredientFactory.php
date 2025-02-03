<?php

namespace Database\Factories;

use App\Models\RecipeIngredient;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<RecipeIngredient>
 */
class RecipeIngredientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'description' => $this->faker->word(),
            'amount' => $this->faker->words(3, true),
            'unit' => $this->faker->randomElement(['g', 'kg', 'ml', 'l', 'tsp', 'tbsp', 'cup']),
        ];
    }
}
