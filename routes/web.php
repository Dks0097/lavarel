<?php

use App\Http\Controllers\Admin\MainConTroller;
use App\Http\Controllers\Admin\Users\LoginController;
use App\Http\Controllers\AdminCategorysController;
use App\Http\Controllers\AdminProductsController;
use App\Http\Controllers\ProductsController;

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

Route::get('admin/users/login', [LoginController::class, 'index'])->name('login');
Route::post('admin/users/login/store', [LoginController::class, 'store']);
Route::get('/',[ProductsController::class,'index'] )->name('home');
Route::get('sanpham',[ProductsController::class,'sanphams'] )->name('sanpham');
Route::middleware(['auth'])->group(function () {
    Route::get('admin/main',[MainConTroller::class,'index'] )->name('admin') ;

});
Route::resource('products',
ProductsController::class);
// Route::get('product/{id}','App\Http\Controllers\ProductsController@sanphams' )->name('product');
Route::resource('admin/product',
AdminProductsController::class);
Route::resource('admin/categorys',
AdminCategorysController::class);