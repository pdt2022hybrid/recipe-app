<?php

namespace Database\Factories;

use App\Models\RecipeStep;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<RecipeStep>
 */
class RecipeStepFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->words(3, true),
            'text' => $this->faker->paragraphs(3, true),
        ];
    }

    public function stepNumber(int $stepNumber): static
    {
        return $this->state(fn () => [
            'step_number' => $stepNumber,
        ]);
    }
}
