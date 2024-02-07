<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\RedirectController;
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

Route::get('/', [RedirectController::class, 'index']);
Route::get('/cart', [RedirectController::class, 'cart']);

Auth::routes();

Route::get('/', [RedirectController::class, 'index'])->name('index');
Route::get('/cart', [RedirectController::class, 'cart'])->name('cart');
