<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/auth/home', [App\Http\Controllers\Auth\HomeController::class, 'index'])->name('auth.home')->middleware('isAdmin');
Route::get('/user/home', [App\Http\Controllers\User\HomeController::class, 'index'])->name('user.home');
Route::get('/product', [App\Http\Controllers\Auth\AdminController::class, 'product']);
Route::get('/showproduct', [App\Http\Controllers\Auth\AdminController::class, 'showproduct']);
Route::post('/uploadproduct', [App\Http\Controllers\Auth\AdminController::class, 'uploadproduct']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
