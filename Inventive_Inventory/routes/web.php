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
Route::get('/stockIn', [HomeController::class,'in']);
Route::get('/stockOut', [HomeController::class,'out']);
Route::get('/login', [HomeController::class,'login']);
Route::get('/research', [HomeController::class,'research']);

/* Routes - User */
Route::get('/user', [UserController::class,'index']);

Route::get('/profile', [UserController::class,'profile']);

Route::get('/charts', [UserController::class,'charts']);

Route::get('/stock', [UserController::class,'stock']);

Route::get('/report', [UserController::class,'report']);

Route::get('/logout', [UserController::class,'logout']);

/* Routes - Admin */

Route::get('/admin', [UserController::class,'admin']);

Route::get('/chartsAdmin', [UserController::class,'chartsAdmin']);

Route::get('/sales', [UserController::class,'sales']);

Route::get('/adduser', [UserController::class,'adduser']);

Route::get('/manage', [UserController::class,'manage']);