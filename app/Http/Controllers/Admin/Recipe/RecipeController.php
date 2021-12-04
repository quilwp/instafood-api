<?php

namespace App\Http\Controllers\Admin\Recipe;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Admin\Recipe\StoreRequest;
use App\Http\Requests\Api\Admin\Recipe\UpdateRequest;
use App\Models\Recipe;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class RecipeController extends Controller
{
    /**
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        return responder()->success(Recipe::paginate(10))->respond();
    }

    /**
     * @param StoreRequest $request
     * @return JsonResponse
     */
    public function store(StoreRequest $request): JsonResponse
    {
        return responder()->success(Recipe::create($request->validated()))->respond(201);
    }

    /**
     * @param int $id
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        return responder()->success(Recipe::findOrFail($id))->respond(201);
    }

    /**
     * @param UpdateRequest $request
     * @param int $id
     * @return JsonResponse
     */
    public function update(UpdateRequest $request, int $id): JsonResponse
    {
        Recipe::where('id', $id)->update($request->validated());

        return responder()->success()->respond(201);
    }

    /**
     * @param int $id
     * @return JsonResponse
     */
    public function destroy(int $id): JsonResponse
    {
        Recipe::destroy($id);

        return responder()->success()->respond();
    }
}
