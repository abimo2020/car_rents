<?php

use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;


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
    return redirect('/login');
});

Route::get('/login', function () {
    return view('auth.login');
});

Route::get('/dashboard', [OrderController::class, 'dashboard'])->name('dashboard');

Route::post('/login', [UserController::class, 'login'])->name('login');

Route::get('logout', [UserController::class, 'logout']);

Route::get('/orders', [OrderController::class, 'get'])->name('orders.index');

Route::get('/create-order', [OrderController::class, 'create'])->name('orders.create');

Route::post('/orders', [OrderController::class, 'store'])->name('orders.store');

Route::put('/order-approved/{id}', [OrderController::class, 'approve'])->name("orders.approve");

Route::put('/order-returned/{id}', [OrderController::class, 'returned'])->name("orders.returned");
