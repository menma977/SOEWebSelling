<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\UserController;
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
  return redirect('login');
});

Route::middleware('auth')->group(function () {
  Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');
  Route::get('/debit', [HomeController::class, 'debitCreate'])->name('sell.debit');
  Route::post('/debit', [HomeController::class, 'debitStore'])->name('sell.debit');
  Route::get('/credit', [HomeController::class, 'creditCreate'])->name('sell.credit');
  Route::post('/credit', [HomeController::class, 'creditStore'])->name('sell.credit');

  Route::group(["prefix" => "user", "as" => "user."], function () {
    Route::get('/', [UserController::class, 'index'])->name('index');
    Route::get('/filter/{data?}', [UserController::class, 'filter'])->name('filter');
    Route::get('/store', [UserController::class, 'create'])->name('store');
    Route::post('/store', [UserController::class, 'store'])->name('store');
    Route::get('/update/{id}', [UserController::class, 'edit'])->name('update');
    Route::post('/update/{id}', [UserController::class, 'update'])->name('update');
  });

  Route::group(["prefix" => "category", "as" => "category."], function () {
    Route::get('/', [CategoryController::class, 'index'])->name('index');
    Route::get('/show/{data?}', [CategoryController::class, 'show'])->name('show');
    Route::post('/store/{id?}', [CategoryController::class, 'store'])->name('store');
    Route::get('/delete/{id}', [CategoryController::class, 'destroy'])->name('destroy');
    Route::group(["prefix" => "sub", "as" => "sub."], function () {
      Route::get('/', [SubCategoryController::class, 'index'])->name('index');
      Route::get('/show/{data?}', [SubCategoryController::class, 'show'])->name('show');
      Route::post('/store/{id?}', [SubCategoryController::class, 'store'])->name('store');
      Route::get('/delete/{id}', [SubCategoryController::class, 'destroy'])->name('destroy');
    });
  });

  Route::group(["prefix" => "supplier", "as" => "supplier."], function () {
    Route::get('/', [SupplierController::class, 'index'])->name('index');
    Route::get('/filter/{data?}', [SupplierController::class, 'show'])->name('filter');
    Route::get('/store', [SupplierController::class, 'create'])->name('store');
    Route::post('/store', [SupplierController::class, 'store'])->name('store');
    Route::get('/update/{id}', [SupplierController::class, 'edit'])->name('update');
    Route::post('/update/{id}', [SupplierController::class, 'update'])->name('update');
    Route::get('/delete/{id}', [SupplierController::class, 'destroy'])->name('destroy');
  });

  Route::group(["prefix" => "product", "as" => "product."], function () {
    Route::get('/', [ProductController::class, 'index'])->name('index');
    Route::get('/filter/{data?}', [ProductController::class, 'show'])->name('filter');
    Route::get('/store', [ProductController::class, 'create'])->name('store');
    Route::post('/store', [ProductController::class, 'store'])->name('store');
    Route::get('/update/{id}', [ProductController::class, 'edit'])->name('update');
    Route::post('/update/{id}', [ProductController::class, 'update'])->name('update');
    Route::get('/delete/{id}', [ProductController::class, 'destroy'])->name('destroy');
  });

});

require __DIR__ . '/auth.php';
