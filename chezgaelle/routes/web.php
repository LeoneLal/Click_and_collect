<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GalleryController;


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
    if( \Auth::user()->role == 'Administrateur')
        return view('dashboard');
    else
        return redirect()->route('index');
})->middleware(['auth'])->name('dashboard');

// Routes for product categories
Route::get('/admin/categories', [CategoryController::class, 'index'])->name('categories.index');
Route::get('/categories/create', [CategoryController::class, 'create'])->name('category.create');
Route::post('/categories/create', [CategoryController::class, 'store'])->name('category.store');;
Route::get('/category/{id}/edit', [CategoryController::class, 'edit'])->name('category.edit');
Route::post('/category/{id}/edit', [CategoryController::class, 'update'])->name('category.update');
Route::get('/category/{id}/destroy', [CategoryController::class, 'destroy'])->name('category.destroy');

// Routes for products
Route::get('/admin/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/product/{id}', [ProductController::class, 'show'])->name('product.show');
Route::get('/products/create', [ProductController::class, 'create'])->name('product.create');
Route::post('/products/create', [ProductController::class, 'store'])->name('product.store');;
Route::get('/product/{id}/edit', [ProductController::class, 'edit'])->name('product.edit');
Route::post('/product/{id}/edit', [ProductController::class, 'update'])->name('product.update');
Route::get('/product/{id}/destroy', [ProductController::class, 'destroy'])->name('product.destroy');

// Routes for user 
Route::get('/admin/users', [UserController::class, 'index'])->name('users.index');
Route::get('/user/{id}/edit', [UserController::class, 'edit'])->name('user.edit');
Route::post('/user/{id}/edit', [UserController::class, 'update'])->name('user.update');
Route::get('/user/{id}/destroy', [UserController::class, 'destroy'])->name('user.destroy');

// Routes for pictures gallery
Route::get('/admin/gallery', [GalleryController::class, 'index'])->name('gallery.index');
Route::get('/gallery', [GalleryController::class, 'pictures'])->name('gallery.pictures');
Route::get('/gallery/create', [GalleryController::class, 'create'])->name('gallery.create');
Route::post('/gallery/create', [GalleryController::class, 'store'])->name('gallery.create');
Route::get('/gallery/{id}/destroy', [GalleryController::class, 'destroy'])->name('gallery.destroy');

require __DIR__.'/auth.php';
