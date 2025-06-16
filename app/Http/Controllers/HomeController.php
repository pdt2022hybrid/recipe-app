<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use App\Models\RecipeCategory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class HomeController extends Controller
{
    public function index(): Response
    {
        return Inertia::render('Home', [
            'recipe_categories' => RecipeCategory::query()
                ->with('recipes', function (Relation $query) {
                    $query->limit(25);
                })
                ->withCount('recipes')
                ->get(),

        ]);
    }

    public function apiSearch(Request $request)
    {
        $validated = $request->validate([
            'search' => 'required|string',
            'recipe_category' => 'nullable|array',
            'recipe_category.id' => 'required_with:category|string|exists:App\Models\RecipeCategory,id',
        ]);

        $search = $validated['search'];

        $searchQuery = Recipe::query()
            ->select('id', 'name', 'category_id')
            ->where('name', 'like', "%$search");

        $selectedCategoryQuery = (clone $searchQuery)
            ->when($validated['recipe_category'] ?? null, function (Builder $query) use ($validated) {
                $query->where('category_id', $validated['recipe_category']['id']);
            });

        $otherCategoriesQuery = (clone $searchQuery)
            ->when($validated['recipe_category'] ?? null, function (Builder $query) use ($validated) {
                $query->whereNot('category_id', $validated['recipe_category']['id']);
            });

        return response()->json([
            'selected_category' => [
                'results' => $selectedCategoryQuery
                    ->limit(25)
                    ->get(),
                'total' => $selectedCategoryQuery->count(),
            ],
            'other_categories' => [
                'results' => $otherCategoriesQuery
                    ->limit(25)
                    ->get(),
                'total' => $otherCategoriesQuery->count(),
            ]
        ]);
    }
}
