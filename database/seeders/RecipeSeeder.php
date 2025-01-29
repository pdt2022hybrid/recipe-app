<?php

namespace Database\Seeders;

use App\Models\Ingredient;
use App\Models\Recipe;
use App\Models\RecipeCategory;
use App\Models\RecipeIngredient;
use App\Models\RecipeStep;
use App\Models\Tag;
use Illuminate\Database\Seeder;

class RecipeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = RecipeCategory::all();

        $ingredients = Ingredient::query()
            ->inRandomOrder()
            ->get();

        foreach ($categories as $category) {
            $recipes = Recipe::factory()
                ->for($category, 'category')
                ->count(100)
                ->make();

            foreach ($recipes as $recipe) {
                $recipe->save();

                $recipe->tags()->attach(
                    Tag::query()
                        ->inRandomOrder()
                        ->limit(rand(1, 8))
                        ->get()
                );

                $currentIngredients = $ingredients->random(rand(1, 10));

                foreach ($currentIngredients as $ingredient) {
                    RecipeIngredient::factory()
                        ->for($recipe, 'recipe')
                        ->for($ingredient, 'ingredient')
                        ->create();
                }

                for ($i = 0; $i >= rand(1, 5); $i++) {
                    RecipeStep::factory()
                        ->for($recipe)
                        ->stepNumber($i)
                        ->create();
                }
            }
        }
    }
}
