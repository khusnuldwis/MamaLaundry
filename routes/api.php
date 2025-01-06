<?php

use App\Http\Controllers\Api\CategoryLayananController;
use App\Http\Controllers\Api\LayananController;
use App\Http\Controllers\Api\ManageUserController;
use App\Http\Controllers\Api\MetodeLayananController;
use App\Http\Controllers\Api\TransaksiController;
use App\Http\Controllers\Back\ManageUserController as BackManageUserController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\TransaksiController as ControllersTransaksiController;
use App\Models\Transaksi;
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
Route::middleware(['role:1'])->group(function () {
    Route::apiResource('user',ManageUserController::class);
    Route::apiResource('categorys',CategoryLayananController::class);
    Route::apiResource('layanans', LayananController::class);
    Route::apiResource('transaksi', TransaksiController::class);
    Route::apiResource('metode_layanans', MetodeLayananController::class);
    Route::apiResource('orders', OrderController::class);

});
Route::middleware(['role:2'])->group(function () {
    Route::apiResource('orders', OrderController::class);

});
Route::middleware(['role:3'])->group(function () {
    Route::apiResource('orders', OrderController::class);

});

