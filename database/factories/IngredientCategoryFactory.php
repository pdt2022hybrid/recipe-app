<?php

namespace Database\Factories;

use App\Models\IngredientCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<IngredientCategory>
 */
class IngredientCategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->word(),
        ];
    }
}
