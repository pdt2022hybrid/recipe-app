<?php

namespace Database\Seeders;

use App\Models\Recipe;
use App\Models\RecipeCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RecipeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = RecipeCategory::factory()
            ->count(30)
            ->create();

        foreach ($categories as $category) {
            Recipe::factory()
                ->for($category)
                ->count(100)
                ->create();
        }
    }
}
