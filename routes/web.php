<?php

use App\Http\Controllers\ContactMessageController;
use App\Http\Controllers\HeroSectionController;
use App\Http\Controllers\IndexController;
use Illuminate\Support\Facades\Route;

Route::get('/', [IndexController::class, 'index'])->name('index');

Route::resource('hero', HeroSectionController::class)
    ->only(['edit', 'update']);

Route::resource('message', ContactMessageController::class)
    ->only(['store', 'destroy']);

// Route::post('contact', [ContactMessageController::class, 'store'])->name('contact.store');

Route::middleware(['antispam:3,5'])->group(function(){
    Route::post('contact-send', [ContactMessageController::class, 'sendEmail'])->name('contact.send');
});

require __DIR__ . '/auth.php';
