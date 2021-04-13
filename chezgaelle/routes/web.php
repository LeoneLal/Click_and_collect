<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;


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

Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
Route::get('/categories/create', [CategoryController::class, 'create'])->name('category.create');
Route::post('/categories/create', [CategoryController::class, 'store'])->name('category.store');;
Route::get('/category/{id}/edit', [CategoryController::class, 'edit'])->name('category.edit');
Route::post('/category/{id}/edit', [CategoryController::class, 'update'])->name('category.update');
Route::get('/category/{id}/destroy', [CategoryController::class, 'destroy'])->name('category.destroy');

Route::get('/products', [ProductController::class, 'index'])->name('index');
Route::get('/product/{id}', [ProductController::class, 'show'])->name('show');
Route::get('/products/create', [ProductController::class, 'create'])->name('create');
Route::post('/products/create', [ProductController::class, 'store'])->name('store');;
Route::get('/product/{id}/update', [ProductController::class, 'update'])->name('update');

Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::get('/user/{id}/edit', [UserController::class, 'edit'])->name('user.edit');
Route::post('/user/{id}/edit', [UserController::class, 'update'])->name('user.update');
Route::get('/user/{id}/destroy', [UserController::class, 'destroy'])->name('user.destroy');

require __DIR__.'/auth.php';
