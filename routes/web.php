<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProductsController;

// Public
Route::get('/', fn() => view('welcome'));
Route::get('/about', fn() => view('about'));
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/send-contact', [ContactController::class, 'sendContact'])->name('send.contact');

// Shop
Route::get('/shop', [ShopController::class, 'index'])->name('shop');

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
