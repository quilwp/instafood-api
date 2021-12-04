<?php

namespace App\Http\Controllers\Admin\Diet;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Admin\Diet\StoreRequest;
use App\Http\Requests\Api\Admin\Diet\UpdateRequest;
use App\Models\Diet;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class DietController extends Controller
{
    /**
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        return responder()->success(Diet::with('author')->paginate(20))->respond();
    }

    /**
     * @param StoreRequest $request
     * @return JsonResponse
     */
    public function store(StoreRequest $request): JsonResponse
    {
        return responder()->success(Diet::create($request->validated()))->respond(201);
    }

    /**
     * @param int $id
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        return responder()->success(Diet::with('author')->findOrFail($id))->respond();
    }

    /**
     * @param UpdateRequest $request
     * @param int $id
     * @return JsonResponse
     */
    public function update(UpdateRequest $request, int $id): JsonResponse
    {
        return responder()->success(Diet::findOrFail($id)->update($request->validated()))->respond(201);
    }

    /**
     * @param $id
     * @return JsonResponse
     */
    public function destroy($id): JsonResponse
    {
        Diet::destroy($id);

        return responder()->success()->respond(201);
    }
}
