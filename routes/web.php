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
// Route::get('/home', function () {
//     return view('LandingPage');
// });

// Route::get('/daftarLayanan', function () {
//     return view('layouts/daftarLayanan');
// });
// Route::resource('karyawan', KaryawanController::class);

Route::get('/', function () {
    return view('auth.login');
});
<<<<<<< HEAD
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/landingPage', [HomeController::class, 'index'])->name('landingPage');
=======

Route::middleware(['auth', 'verified','must-admin'])->group(function () {
    
    
    // Register only the index route
    Route::resource('daftarLayanan', LayananController::class)->only(['index']);
    // Route::resource('orderMasuk', OrderMasukController::class);
    Route::get('/order-masuk/belum-diambil', [OrderMasukController::class, 'belumDiambil'])->name('orderMasuk.belumDiambil');
    Route::resource('categori',CategoriController::class);
    Route::resource('order',OrderController::class);
    Route::post('/transaksi/update-status/{id}', [OrderController::class, 'updateStatus']);
>>>>>>> ac5a93aad188f3e4aa46d4e76834f9df84425dff


// Register only the index route
Route::resource('daftarLayanan', LayananController::class)->only(['index']);
Route::resource('layanan', LayananController::class)->only(['index', 'store', 'update']);
Route::resource('orderMasuk', OrderMasukController::class);
Route::resource('belumDiambil', OrderMasukController::class);

Route::resource('kategori', ApiCategoryLayananController::class);



Route::get('/kategori', function () {
    return view('kategori');
});
Route::get('/layanans', function () {
    return view('layanan');
});
Route::get('/orders', function () {
    return view('orderMasuk');
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
    });
// Route::middleware(['role:admin'])->group(function () {
//     Route::get('/home', [HomeController::class, 'index'])->name('home');
//     Route::get('/landingPage', [HomeController::class, 'index'])->name('landingPage');
    
    
//     // Register only the index route
//     Route::resource('daftarLayanan', LayananController::class)->only(['index']);
//     // Route::resource('orderMasuk', OrderMasukController::class);
//     Route::get('/order-masuk/belum-diambil', [OrderMasukController::class, 'belumDiambil'])->name('orderMasuk.belumDiambil');
//     Route::resource('categori',CategoriController::class);
//     Route::resource('order',OrderController::class);
//     Route::post('/transaksi/update-status/{id}', [OrderController::class, 'updateStatus']);



// Route::resource('kategori', ApiCategoryLayananController::class);



// Route::get('/kategori', function () {
//     return view('kategori');
// });
// Route::get('/layanans', function () {
//     return view('layanan');
// });
// Route::get('/orders', function () {
//     return view('orderMasuk');
// });});

// Route::middleware(['role:karyawan1'])->group(function () {
//     Route::get('/home', [HomeController::class, 'index'])->name('home');
//     Route::get('/landingPage', [HomeController::class, 'index'])->name('landingPage');
//     Route::get('/order-masuk/belum-diambil', [OrderMasukController::class, 'belumDiambil'])->name('orderMasuk.belumDiambil');
//     Route::resource('order',OrderController::class);
//     Route::post('/transaksi/update-status/{id}', [OrderController::class, 'updateStatus']);
//     Route::get('/orders', function () {
//         return view('orderMasuk');
// });
// });

<<<<<<< HEAD
// Route::middleware(['role:user'])->group(function () {
//     Route::get('/user', [UserController::class, 'index']);
// });

// Route::middleware(['role:member'])->group(function () {
//     Route::get('/member', [MemberController::class, 'index']);
// });
=======
// Route::middleware(['role:karyawan2'])->group(function () {
// Route::get('/home', [HomeController::class, 'index'])->name('home');
//     Route::get('/landingPage', [HomeController::class, 'index'])->name('landingPage');
//     Route::get('/order-masuk/belum-diambil', [OrderMasukController::class, 'belumDiambil'])->name('orderMasuk.belumDiambil');
//     Route::resource('order',OrderController::class);
//     Route::post('/transaksi/update-status/{id}', [OrderController::class, 'updateStatus']);
//     Route::get('/orders', function () {
//         return view('orderMasuk');
//     });});

>>>>>>> ac5a93aad188f3e4aa46d4e76834f9df84425dff
