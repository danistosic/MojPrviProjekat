<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\ContactController;

// statične stranice
Route::view('/about', 'about');

// početna preko controllera
Route::get('/', [HomepageController::class, 'index']);

// shop preko controllera
Route::get('/shop', [ShopController::class, 'index']);

// kontakt preko controllera
Route::get('/contact', [ContactController::class, 'index']);

Route::get('/admin/all-contacts', [\App\Http\Controllers\ContactController::class, 'allContacts']);

Route::post('/send-contact', [\App\Http\Controllers\ContactController::class, 'sendContact']);

// ADD PRODUCT FORM
Route::get('/admin/add-product', [\App\Http\Controllers\ShopController::class, 'showAddProductForm'])
    ->name('admin.add-product');   // omogućuje pozivanje rute preko njenog imena (npr. u Blade-u route('admin.add-product')) ime u zagradi moze biti bilo koje

// STORE PRODUCT
Route::post('/admin/add-product', [\App\Http\Controllers\ShopController::class, 'storeProduct']);

// SHOW ALL PRODUCTS
Route::get('/admin/products', [\App\Http\Controllers\ShopController::class, 'showAllProducts']);

// /admin/all-products -> Prikaz svih proizvoda u HTML tablici
Route::get('/admin/all-products', [\App\Http\Controllers\ProductsController::class, 'index']);

// /admin/delete-product/{product} -> Brisanje jednog proizvoda po ID-u
Route::get('/admin/delete-product/{product}', [\App\Http\Controllers\ProductsController::class, 'delete']);

// /admin/delete-contact/2 → Brisanje kontakta po ID-u
Route::get('/admin/delete-contact/{contact}', [\App\Http\Controllers\ContactController::class, 'delete']);

// Prikazuje HTML formu za dodavanje novog proizvoda
Route::view('/admin/add-product', 'addProduct');

// Prikazuje formu za uređivanje proizvoda po ID-u
Route::get('/admin/product/edit/{id}', [\App\Http\Controllers\ProductsController::class, 'singleProduct'])
    ->name('product.edit');

// Spremanje izmijenjenog proizvoda
Route::post('/admin/product/save/{id}', [\App\Http\Controllers\ProductsController::class, 'edit'])
    ->name('product.save');









 