<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('accueil');
});
Route::get('/stockIn', function () {
    return view('stockIn');
});
Route::get('/stockOut', function () {
    return view('stockOut');
});
Route::get('/research', function () {
    return view('research');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

/* Routes - Admin */
Route::prefix('/admin')->group(function () {

    Route::get('/profil',[App\Http\Controllers\admin\ProfileController::class, 'index']);
    Route::get('/adduser', [App\Http\Controllers\admin\UserController::class,'index']);
    Route::get('/charts', [App\Http\Controllers\admin\ChartController::class,'index']);
    Route::get('/chartsAdmin', [App\Http\Controllers\admin\ChartController::class,'chartsAdmin']);
    Route::get('/report', [App\Http\Controllers\admin\ReportController::class,'index']);
    Route::get('/sales', [App\Http\Controllers\admin\SalesController::class,'index']);
    Route::get('/manage', [App\Http\Controllers\admin\StockController::class,'manage']);
    Route::get('/stock', [App\Http\Controllers\admin\StockController::class,'index']);
    Route::get('/logout', [App\Http\Controllers\admin\AdminController::class,'logout']);

    Route::get('/hist', function () {
        return view('hist');
    });


});

/* Routes - User */
Route::prefix('/user')->group(function () {

    Route::get('/profil',[App\Http\Controllers\user\ProfileController::class, 'index']);
    Route::get('/charts', [App\Http\Controllers\user\ChartController::class,'index']);
    Route::get('/report', [App\Http\Controllers\user\ReportController::class,'index']);
    Route::get('/stock', [App\Http\Controllers\user\StockController::class,'index']);
    Route::get('/logout', [App\Http\Controllers\user\UserController::class,'logout']);

    Route::get('/hist', function () {
        return view('hist');
    });

});