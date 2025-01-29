<?php

namespace Database\Seeders;

use App\Models\Ingredient;
use App\Models\IngredientCategory;
use Illuminate\Database\Seeder;

class IngredientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $ingredientCategories = IngredientCategory::all();

        foreach ($ingredientCategories as $ingredientCategory) {
            Ingredient::factory()
                ->count(10)
                ->for($ingredientCategory, 'category')
                ->create();
        }
    }
}
