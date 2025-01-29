<?php

namespace App\Http\Controllers;

use App\Models\RecipeCategory;
use Illuminate\Database\Eloquent\Relations\Relation;
use Inertia\Inertia;
use Inertia\Response;

class HomeController extends Controller
{
    public function index(): Response
    {
        return Inertia::render('Home', [
            'recipe_categories' => RecipeCategory::query()
                ->select('id', 'name')
                ->with('recipes', function (Relation $query) {
                    $query
                        ->select('id', 'name', 'recipe_category_id')
                        ->limit(25);
                })
                ->withCount('recipes')
                ->get(),
        ]);
    }
}
