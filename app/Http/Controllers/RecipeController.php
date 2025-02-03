<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use Inertia\Inertia;
use Inertia\Response;

class RecipeController extends Controller
{
    public function show(string $recipe_id): Response
    {
        return Inertia::render('Recipe', [
            'recipe' => Recipe::query()
                ->select('id', 'name', 'description', 'created_at')
                ->with([
                    'category:id,name',
                    'steps:id,title,description'
                ])
                ->findOrFail($recipe_id),
        ]);
    }
}
