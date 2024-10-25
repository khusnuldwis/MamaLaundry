<?php

use App\Http\Controllers\Back\CategoryLayananController;
use App\Http\Controllers\Back\KaryawanController;
use App\Http\Controllers\Back\LayananController;
use App\Http\Controllers\Back\MetodeLayananController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/home', function () {
    return view('LandingPage');
});

Route::resource('karyawan', KaryawanController::class);
Route::resource('metode_layanan', MetodeLayananController::class);
Route::resource('jenis_layanan', CategoryLayananController::class);
Route::resource('layanan', LayananController::class);
Route::get('/', function () {
    return view('auth.login');
});
Auth::routes();
Route::get('/order', function () {
    return view('layout/orderMasuk');
});
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
