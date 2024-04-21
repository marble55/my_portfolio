<?php

use App\Http\Controllers\HeroSectionController;
use App\Http\Controllers\IndexController;
use Illuminate\Support\Facades\Route;

Route::get('/', [IndexController::class, 'index']);

Route::resource('hero', HeroSectionController::class)
    ->only(['edit', 'update']);

require __DIR__.'/auth.php';
