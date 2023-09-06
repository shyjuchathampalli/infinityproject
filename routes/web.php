<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

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



//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/*Route::group(['middleware' => ['auth']], function(){
    Route::resource('products', ProductController::class);
});*/

Route::group(['middleware' => ['auth', 'role:Admin']], function () {
    Route::resource('admin/products', ProductController::class);
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('admin/products', [App\Http\Controllers\ProductController::class, 'index'])->name('admin/products');
});

Route::group(['middleware' => ['auth', 'role:Editor']], function () {
    Route::resource('editor/products', ProductController::class);
});


Auth::routes();
