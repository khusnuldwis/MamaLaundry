<?php

use App\Http\Controllers\Api\CategoryLayananController as ApiCategoryLayananController;
use App\Http\Controllers\Back\CategoryLayananController;
use App\Http\Controllers\Back\KaryawanController;
use App\Http\Controllers\Back\MetodeLayananController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderMasukController;
use App\Models\CategoriLayanan;
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

Auth::routes();

Route::get('/tes', function () {
    return view('tes');
});


Route::get('/', function () {
    return view('auth.login');
});




Route::middleware(['auth', 'verified','must-admin'])->group(function () {
    
    
    // Register only the index route
    Route::resource('daftarLayanan', LayananController::class)->only(['index']);
    Route::get('/order-masuk/belum-diambil', [OrderMasukController::class, 'belumDiambil'])->name('orderMasuk.belumDiambil');
    Route::resource('categori',CategoriController::class);
    
    Route::post('/transaksi/update-status/{id}', [OrderController::class, 'updateStatus']);







Route::get('/kategori', function () {
    return view('kategori');
});
Route::get('/layanans', function () {
    return view('layanan');
});

});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');

        Route::get('/order-masuk/belum-diambil', [OrderMasukController::class, 'belumDiambil'])->name('orderMasuk.belumDiambil');
        Route::resource('order',OrderController::class);
        Route::post('/transaksi/update-status/{id}', [OrderController::class, 'updateStatus']);
    
    
    
   
    Route::get('/orders', function () {
        return view('orderMasuk');
    });
    Route::get('/durasi', function () {
        return view('durasi');
    });
    });
