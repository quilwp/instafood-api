<?php

namespace App\Http\Controllers\Admin\Recipe\Ingredient;

use App\Http\Controllers\Controller;
use App\Models\Ingredient;
use App\Models\Recipe;
use App\Transformers\Admin\Recipe\Ingredients\IngredientTransformer;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class IngredientController extends Controller
{
    /**
     * @param int $id
     * @return JsonResponse
     */
    public function index(int $id): JsonResponse
    {
        $recipe = Recipe::with('ingredients')->findOrFail($id);

        return responder()->success($recipe->ingredients, IngredientTransformer::class)->respond();
    }

    /**
     * @param Request $request
     * @param int $id
     * @return JsonResponse
     */
    public function store(Request $request, int $id): JsonResponse
    {
        Recipe::findOrFail($id)->ingredients()->create($request->all());

        return responder()->success()->respond(201);
    }

    /**
     * @param int $recipeId
     * @param int $ingredientId
     * @return JsonResponse
     */
    public function destroy(int $recipeId, int $ingredientId): JsonResponse
    {
        Recipe::findOrFail($recipeId)->ingredients()->detach($ingredientId);

        return responder()->success()->respond(201);
    }
}
