<?php

namespace App\Http\Controllers\Admin\Ingredient;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Admin\Ingredient\StoreRequest;
use App\Http\Requests\Api\Admin\Ingredient\UpdateRequest;
use App\Models\Ingredient;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class IngredientController extends Controller
{
    /**
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        return responder()->success(Ingredient::paginate(10))->respond();
    }

    /**
     * @param StoreRequest $request
     * @return JsonResponse
     */
    public function store(StoreRequest $request): JsonResponse
    {
        return responder()->success(Ingredient::create($request->validated()))->respond(201);
    }

    /**
     * @param int $id
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        return responder()->success(Ingredient::findOrFail($id))->respond();
    }

    /**
     * @param UpdateRequest $request
     * @param int $id
     * @return JsonResponse
     */
    public function update(UpdateRequest $request, int $id)
    {
        Ingredient::where('id', $id)->update($request->validated());

        return responder()->success()->respond(201);
    }

    /**
     * @param $id
     * @return JsonResponse
     */
    public function destroy($id): JsonResponse
    {
        Ingredient::destroy($id);

        return responder()->success()->respond(201);
    }
}
