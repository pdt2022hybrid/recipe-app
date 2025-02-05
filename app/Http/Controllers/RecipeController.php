<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use Inertia\Inertia;
use Inertia\Response;
use Illuminate\Database\Eloquent\Relations\Relation;

class RecipeController extends Controller
{
    public function show(string $recipe_id): \Illuminate\Http\JsonResponse
    {
//        return Inertia::render('Recipe', [
//            'recipe' => Recipe::query()
//                ->select('id', 'name', 'description', 'created_at')
//                ->with([
//                    'category:id,name',
//                    'steps:id,title,description',
//                    'ingredients:id,name,amount,unit',
//                ])
//                ->findOrFail($recipe_id),
//        ]);

        // json response
        // return response()->json([
        return response()->json([
            'recipe' => Recipe::query()
                ->select('id', 'name', 'description', 'created_at', 'category_id')
                ->with([
                    'category' => function (Relation $query) {
                        $query->select('id', 'name');
                    },
                    'steps' => function (Relation $query) {
                        $query->select('id', 'recipe_id', 'description');
                    },
                    'ingredients' => function (Relation $query) {
                        $query->select('id', 'recipe_id', 'ingredient_id', 'amount', 'unit')
                        ->with(['ingredient' => function (Relation $q) {
                            $q->select('id', 'name');
                        }]);
                    },
                ])
                ->findOrFail($recipe_id),
        ]);
    }
}
