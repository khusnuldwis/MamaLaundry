<?php

use App\Http\Controllers\Api\CategoryLayananController;
use App\Http\Controllers\Api\LayananController;
use App\Http\Controllers\Api\ManageUserController;
use App\Http\Controllers\Back\ManageUserController as BackManageUserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::apiResource('user',ManageUserController::class);
Route::apiResource('categorys',CategoryLayananController::class);
Route::apiResource('layanans', LayananController::class);
