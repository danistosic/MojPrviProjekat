<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ShoppingCartController; 

// Public
Route::get('/', fn() => view('welcome'));
Route::get('/about', fn() => view('about'));
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/send-contact', [ContactController::class, 'sendContact'])->name('send.contact');

// Shop
Route::get('/shop', [ShopController::class, 'index'])->name('shop');

// SINGLE PRODUCT
Route::get('/products/{product}', [ProductsController::class, 'permalink'])->name('products.permalink');

// CART ADD (NOVO)
Route::post('/cart/add', [ShoppingCartController::class, 'addToCart'])->name('cart.add');
Route::get('/cart', [ShoppingCartController::class, 'index'])->name('cart.index');
Route::get('/cart/finish', [ShoppingCartController::class, 'finishOrder'])->name('cart.finish');
Route::get('/cart/remove/{index}', [ShoppingCartController::class, 'remove'])->name('cart.remove');

// Admin
Route::middleware(['auth'])
    ->prefix('admin')
    ->group(function () {

        // Products
        Route::controller(ProductsController::class)
            ->prefix('products')
            ->name('products.')
            ->group(function () {

                Route::get('/all', 'index')->name('all');
                Route::get('/add', 'showAddProductForm')->name('add');
                Route::post('/save', 'saveProduct')->name('create');
                Route::get('/edit/{product}', 'singleProduct')->name('single');
                Route::post('/save/{product}', 'edit')->name('save');
                Route::get('/delete/{product}', 'delete')->name('delete');
            });

        // Contacts
        Route::controller(ContactController::class)
            ->prefix('contact')
            ->name('contact.')
            ->group(function () {

                Route::get('/all', 'allContacts')->name('all');
                Route::post('/send', 'sendContact')->name('send');
                Route::get('/delete/{contact}', 'delete')->name('delete');
            });
    });

require __DIR__ . '/auth.php';
