<?php

use App\Http\Controllers\ContactMessageController;
use App\Http\Controllers\HeroSectionController;
use App\Http\Controllers\IndexController;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Support\Facades\Route;

Route::get('/', [IndexController::class, 'index']);

Route::resource('hero', HeroSectionController::class)
    ->only(['edit', 'update']);

Route::resource('message', ContactMessageController::class)
    ->only(['store', 'destroy']);

Route::post('contact', [ContactMessageController::class, 'store'])->name('contact.store');

require __DIR__ . '/auth.php';
