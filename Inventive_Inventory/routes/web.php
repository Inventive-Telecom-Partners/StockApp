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

Route::get('/',[App\Http\Controllers\AccueilController::class, 'index']);
Route::get('/stockIn',[App\Http\Controllers\AccueilController::class, 'stockIn']);
Route::post('/stockInCreate',[App\Http\Controllers\AccueilController::class,'insertStockIn']);
Route::get('/stockOut',[App\Http\Controllers\AccueilController::class, 'stockOut']);
Route::get('/stockOut2/{serial}',[App\Http\Controllers\AccueilController::class, 'stockOut2']);
Route::delete('/stockOutDel',[App\Http\Controllers\AccueilController::class, 'stockOutDel']);
Route::get('/research',[App\Http\Controllers\AccueilController::class, 'research']);


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

/* Routes - Admin */
Route::prefix('/admin')->middleware(['auth'])->group(function () {

    Route::get('/profil',[App\Http\Controllers\admin\ProfileController::class, 'index']);
    Route::put('updateMe/{my_id}',[App\Http\Controllers\admin\ProfileController::class,'update']);

    Route::get('/adduser', [App\Http\Controllers\admin\UserController::class,'index']);
    Route::post('/create',[App\Http\Controllers\admin\UserController::class,'insert']);
    Route::get('/edit/{user_id}',[App\Http\Controllers\admin\UserController::class,'edit']);
    Route::put('updateUser/{user_id}',[App\Http\Controllers\admin\UserController::class,'update']);
    Route::delete('/delete/{user_id}',[App\Http\Controllers\admin\UserController::class,'delete']);
    Route::post('/createJob',[App\Http\Controllers\admin\UserController::class,'insertJob']);
    Route::get('/editJob/{job_id}',[App\Http\Controllers\admin\UserController::class,'editJob']);
    Route::put('updateJob/{job_id}',[App\Http\Controllers\admin\UserController::class,'updateJob']);
    Route::delete('/deleteJob/{job_id}',[App\Http\Controllers\admin\UserController::class,'deleteJob']);

    Route::get('/stock', [App\Http\Controllers\admin\StockController::class,'index']);
    Route::get('/manage', [App\Http\Controllers\admin\StockController::class,'manage']);
    Route::post('/createStock',[App\Http\Controllers\admin\StockController::class,'insertStock']);
    Route::get('/editStock/{stock_id}',[App\Http\Controllers\admin\StockController::class,'editStock']);
    Route::put('updateStock/{stock_id}',[App\Http\Controllers\admin\StockController::class,'updateStock']);
    Route::delete('/deleteStock/{stock_id}',[App\Http\Controllers\admin\StockController::class,'deleteStock']);
    Route::post('/createShelf',[App\Http\Controllers\admin\StockController::class,'insertShelf']);
    Route::get('/editShelf/{shelf_id}',[App\Http\Controllers\admin\StockController::class,'editShelf']);
    Route::put('updateShelf/{shelf_id}',[App\Http\Controllers\admin\StockController::class,'updateShelf']);
    Route::delete('/deleteShelf/{shelf_id}',[App\Http\Controllers\admin\StockController::class,'deleteShelf']);
    Route::post('/createLevel',[App\Http\Controllers\admin\StockController::class,'insertLevel']);
    Route::get('/editLevel/{level_id}',[App\Http\Controllers\admin\StockController::class,'editLevel']);
    Route::put('updateLevel/{level_id}',[App\Http\Controllers\admin\StockController::class,'updateLevel']);
    Route::delete('/deleteLevel/{level_id}',[App\Http\Controllers\admin\StockController::class,'deleteLevel']);
    
    Route::get('/charts', [App\Http\Controllers\admin\ChartController::class,'index']);
    Route::get('/chartsAdmin', [App\Http\Controllers\admin\ChartController::class,'chartsAdmin']);

    Route::get('/report', [App\Http\Controllers\admin\ReportController::class,'index']);

    Route::get('/item', [App\Http\Controllers\admin\SalesController::class,'index']);
    Route::get('/seeItem/{element_id}/{level_id}', [App\Http\Controllers\admin\SalesController::class,'display']); 

    Route::get('/hist', function () {
        return view('hist');
    });

    Route::get('/logout', [App\Http\Controllers\admin\AdminController::class,'logout']);

    


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