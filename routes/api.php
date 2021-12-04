<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'admin'], function () {
    Route::resource('ingredients', \App\Http\Controllers\Admin\Ingredient\IngredientController::class);
    Route::resource('recipes', \App\Http\Controllers\Admin\Recipe\RecipeController::class);
    Route::resource('recipes.ingredients', \App\Http\Controllers\Admin\Recipe\Ingredient\IngredientController::class);
});
