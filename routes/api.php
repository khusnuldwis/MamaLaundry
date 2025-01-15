<?php

use App\Http\Controllers\Api\CategoryLayananController;
use App\Http\Controllers\Api\DurasiController;
use App\Http\Controllers\Api\KategoryLayananController;
use App\Http\Controllers\Api\LayananController;
use App\Http\Controllers\Api\ManageUserController;
use App\Http\Controllers\Api\MetodeController;
use App\Http\Controllers\Api\MetodeLayananController;
use App\Http\Controllers\Api\TransaksiController;
use App\Http\Controllers\Back\ManageUserController as BackManageUserController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\RoleController;
use App\Http\Controllers\Api\UserController;
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

    Route::apiResource('users',UserController::class);
    Route::apiResource('roles',RoleController::class);
    Route::apiResource('categorys',KategoryLayananController::class);
    Route::apiResource('layanans', LayananController::class);
    Route::apiResource('transaksi', TransaksiController::class);
    Route::apiResource('metode_layanans', MetodeLayananController::class);
    Route::apiResource('orders', OrderController::class);
    Route::apiResource('durasis', DurasiController::class);
    Route::apiResource('metodes', MetodeController::class);


