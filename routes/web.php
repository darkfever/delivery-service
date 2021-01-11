<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\OrdersController;
use App\Http\Controllers\User\OrdersController as UOController;
use App\Http\Controllers\Operator\HomeController;
use App\Http\Controllers\Operator\OrdersController as OOController;
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
    Route::resources([
        '/' => AdminController::class,
        'user' => UserController::class,
        'orders' => OrdersController::class,
    ]);
});

//user_panel
Route::middleware(['role:user'])->prefix('user')->group(function () {
    Route::resource('userorders', UOController::class);
    Route::get('update/{id}', [UOController::class, 'update'])->name('update');

});

//operator
Route::middleware(['role:operator'])->prefix('operator')->group(function () {
    Route::get('processing', [OOController::class, 'processingorders'])->name('processing');
    Route::get('created', [OOController::class, 'createdorders'])->name('createdorders');
    Route::get('send', [OOController::class, 'sendorders'])->name('sendorders');
    Route::get('end', [OOController::class, 'endorders'])->name('endorders');
    Route::get('cancel/{id}', [OOController::class, 'cancelorders'])->name('cancel');
    Route::resources([
        '/home' => HomeController::class,
        'operorder' => App\Http\Controllers\Operator\OrdersController::class
    ]);
});

//courier
Route::middleware(['role:courier'])->prefix('courier')->group(function () {
    Route::get('/', [App\Http\Controllers\Courier\HomeController::class, 'index'])->name('courierhome');
    Route::get('/courier_orders', [App\Http\Controllers\Courier\OrdersController::class, 'orders'])->name('courier_orders');
    Route::get('/courierend', [App\Http\Controllers\Courier\OrdersController::class, 'courierend'])->name('courierend');
    Route::get('/courierupdate/{id}', [App\Http\Controllers\Courier\OrdersController::class, 'courierupdate'])->name('courierupdate');
    //courierend
});

