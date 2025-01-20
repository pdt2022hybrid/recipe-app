<?php

namespace Database\Factories;

use App\Models\RecipeCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<RecipeCategory>
 */
class RecipeCategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->word,
        ];
    }
}
