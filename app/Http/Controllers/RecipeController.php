<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use Inertia\Inertia;
use Inertia\Response;
use Illuminate\Database\Eloquent\Relations\Relation;

class RecipeController extends Controller
{
    public function show(string $recipe_id): Response
    {
        return Inertia::render('Recipe/Show', [
            'recipe' => Recipe::query()
                ->with([
                    'category',
                    'steps' => function (Relation $query) {
                        $query
                            ->orderBy('step_number');
                    },
                    'ingredients' => function (Relation $query) {
                        $query
                            ->with(['ingredient']);
                    },
                    'tags',
                ])
                ->findOrFail($recipe_id),
        ]);
    }
}
