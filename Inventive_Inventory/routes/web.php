<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AccueilController;
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
Route::get('/stockIn', [AccueilController::class,'in']);
Route::get('/stockOut', [AccueilController::class,'out']);
Route::get('/login', [AccueilController::class,'login']);
Route::get('/research', [AccueilController::class,'research']);

/* Routes - User */
Route::get('/user', [UserController::class,'index'])->middleware('auth');

Route::get('/profile', [UserController::class,'profile'])->middleware('auth');

Route::get('/charts', [UserController::class,'charts'])->middleware('auth');

Route::get('/stock', [UserController::class,'stock'])->middleware('auth');

Route::get('/report', [UserController::class,'report'])->middleware('auth');

Route::get('/logout', [UserController::class,'logout'])->middleware('auth');

/* Routes - Admin */

Route::get('/admin', [UserController::class,'admin']);

Route::get('/chartsAdmin', [UserController::class,'chartsAdmin']);

Route::get('/sales', [UserController::class,'sales']);

Route::get('/adduser', [UserController::class,'adduser']);

Route::get('/manage', [UserController::class,'manage']);

Route::get('/hist', [UserController::class,'hist']);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
