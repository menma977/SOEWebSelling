<?php

use App\Http\Controllers\HomeController;
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

  Route::group(["prefix" => "user", "as" => "user."], function () {
    Route::get('/', [UserController::class, 'index'])->name('index');
    Route::get('/filter/{data?}', [UserController::class, 'filter'])->name('filter');
    Route::get('/store', [UserController::class, 'create'])->name('store');
    Route::post('/store', [UserController::class, 'store'])->name('store');
    Route::get('/update/{id}', [UserController::class, 'edit'])->name('update');
    Route::post('/update/{id}', [UserController::class, 'update'])->name('update');
  });
});

require __DIR__ . '/auth.php';
