<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ProfileController;

/*
|--------------------------------------------------------------------------
| Public pages
|--------------------------------------------------------------------------
*/

// Početna stranica
Route::get('/', function () {
    return view('welcome');
});

// About stranica
Route::get('/about', function () {
    return view('about');
});

// Contact stranica (GET)
Route::get('/contact', [ContactController::class, 'index'])->name('contact');

// Slanje contact forme (POST)
Route::post('/send-contact', [ContactController::class, 'sendContact'])->name('send.contact');


/*
|--------------------------------------------------------------------------
| Shop
|--------------------------------------------------------------------------
*/

// Prikaz shop stranice
Route::get('/shop', [ShopController::class, 'index'])->name('shop');


/*
|--------------------------------------------------------------------------
| Admin Products
|--------------------------------------------------------------------------
*/

// Prikaz svih proizvoda
Route::get('/admin/all-products', [ProductsController::class, 'index'])->name('products.all');

// Forma za dodavanje proizvoda (GET)
Route::get('/admin/add-product', [ShopController::class, 'showAddProductForm'])->name('product.add');

// Spremanje proizvoda (POST)
Route::post('/admin/add-product', [ShopController::class, 'storeProduct'])->name('product.store');

// Brisanje proizvoda
Route::delete('/admin/delete-product/{product}', [ProductsController::class, 'delete'])->name('product.delete');

// Edit proizvoda — forma
Route::get('/admin/edit-product/{product}', [ProductsController::class, 'singleProduct'])->name('product.edit');

// Edit proizvoda — spremanje
Route::patch('/admin/edit-product/{product}', [ProductsController::class, 'edit'])->name('product.update');


/*
|--------------------------------------------------------------------------
| Auth (Laravel Breeze)
|--------------------------------------------------------------------------
*/

require __DIR__.'/auth.php';
