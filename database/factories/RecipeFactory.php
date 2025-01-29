<?php

namespace Database\Factories;

use App\Models\Recipe;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Recipe>
 */
class RecipeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->words(3, true),
            'description' => $this->faker->word(),
            'epilogue' => $this->faker->word(),
            'prep_time' => $this->faker->numberBetween(5, 120),
            'portions' => $this->faker->numberBetween(1, 10),
            'user_id' => $this->faker->randomElement(
                User::query()->pluck('id')->toArray()
            ),
        ];
    }
}
