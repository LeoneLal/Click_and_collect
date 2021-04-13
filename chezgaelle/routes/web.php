<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;


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
    return view('index');
});

Route::get('/',[HomeController::class, 'index'])->name('index');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/categories', [CategoryController::class, 'index'])->name('index');
Route::get('/category/{id}', [CategoryController::class, 'show'])->name('show');
Route::get('/categories/create', [CategoryController::class, 'create'])->name('create');
Route::post('/categories/create', [CategoryController::class, 'store'])->name('store');;
Route::get('/category/{id}/update', [CategoryController::class, 'update'])->name('update');

Route::get('/products', [ProductController::class, 'index'])->name('index');
Route::get('/product/{id}', [ProductController::class, 'show'])->name('show');
Route::get('/products/create', [ProductController::class, 'create'])->name('create');
Route::post('/products/create', [ProductController::class, 'store'])->name('store');;
Route::get('/product/{id}/update', [ProductController::class, 'update'])->name('update');

require __DIR__.'/auth.php';
