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





