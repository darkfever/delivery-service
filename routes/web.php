<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\OrdersController;
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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//admin_panel
Route::middleware(['role:admin'])->prefix('admin')->group(function () {
    Route::get('/', [App\Http\Controllers\Admin\AdminController::class, 'index'])->name('homeAdmin');
    Route::get('/users', [App\Http\Controllers\Admin\UserController::class, 'index'])->name('users');
    Route::resource('user', UserController::class);
    Route::get('orders', [App\Http\Controllers\Admin\OrdersController::class, 'index'])->name('orders');
    Route::resource('order', OrdersController::class);
});

//operator
Route::middleware(['role:operator'])->prefix('operator')->group(function () {
    //products
    Route::get('/products', [App\Http\Controllers\Admin\ProductsController::class, 'index'])->name('products');
    Route::post('/addproduct', [App\Http\Controllers\Admin\ProductsController::class, 'create'])->name('add-product');
    Route::get('/destroyproduct/{id}', [App\Http\Controllers\Admin\ProductsController::class, 'destroy'])->name('destroyproduct');
    Route::get('/showproduct/{id}', [App\Http\Controllers\Admin\ProductsController::class, 'show'])->name('showproduct');
    Route::post('/updateproduct/{id}', [App\Http\Controllers\Admin\ProductsController::class, 'update'])->name('updateproduct');
});