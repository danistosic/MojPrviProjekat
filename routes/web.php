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
Route::get('/admin/add-product', [\App\Http\Controllers\ShopController::class, 'showAddProductForm']);

// STORE PRODUCT
Route::post('/admin/add-product', [\App\Http\Controllers\ShopController::class, 'storeProduct']);

// SHOW ALL PRODUCTS
Route::get('/admin/products', [\App\Http\Controllers\ShopController::class, 'showAllProducts']);





 