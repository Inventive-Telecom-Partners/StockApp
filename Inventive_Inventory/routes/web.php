<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
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

// Route::get('/', function () {
//     return view('home');
// });

/* Routes - Home */
Route::get('/', [HomeController::class,'index']);
Route::get('/StockIn', [HomeController::class,'in']);
Route::get('/StockOut', [HomeController::class,'out']);
Route::get('/Login', [HomeController::class,'login']);

/* Routes - User */
Route::get('/user', [UserController::class,'index']);

Route::get('/profile', [UserController::class,'profile']);

Route::get('/charts', [UserController::class,'charts']);

Route::get('/stock', [UserController::class,'stock']);

Route::get('/report', [UserController::class,'report']);

Route::get('/logout', [UserController::class,'logout']);

Route::get('/admin', [UserController::class,'admin']);