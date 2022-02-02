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


Route::apiResource('object-item', App\Http\Controllers\ObjectItemController::class)->except('store', 'destroy');

Route::apiResource('service-item', App\Http\Controllers\ServiceItemController::class)->except('store');

Route::apiResource('workman', App\Http\Controllers\WorkmanController::class)->only('update');

Route::apiResource('responsible', App\Http\Controllers\ResponsibleController::class)->only('destroy');

Route::apiResource('admin', App\Http\Controllers\AdminController::class)->except('store', 'destroy');
