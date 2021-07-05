<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('index');
    Route::get('/logout', [AdminController::class, 'logout'])->name('logout');
    Route::prefix('product')->as('product.')->group(function () {
        Route::get('/index', [AdminController::class, 'product'])->name('index');
        Route::get('/add', [ProductController::class, 'add'])->name('add');
    });
    Route::prefix('category')->as('product.')->group(function () {
        Route::get('/index', [AdminController::class, 'product'])->name('index');
        Route::get('/add', [CategoryController::class, 'add'])->name('add');
    });
    Route::prefix('brand')->as('product.')->group(function () {
        Route::get('/index', [AdminController::class, 'product'])->name('index');
        Route::get('/add', [BrandController::class, 'add'])->name('add');
    });
});
