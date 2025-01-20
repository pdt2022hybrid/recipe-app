<?php

namespace App\Http\Controllers;

use App\Models\RecipeCategory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Inertia\Inertia;
use Inertia\Response;

class HomeController extends Controller
{
    public function index(): Response
    {
        return Inertia::render('Home', [
            'recipe_categories' => RecipeCategory::query()
                ->select('id', 'name')
                ->with([
                    'recipes' => function (HasMany $query) {
                        $query
                            ->select('id', 'name', 'recipe_category_id')
                            ->limit(5);
                    }
                ])
                ->withCount('recipes')
                ->get()
        ]);
    }
}
