<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('portfolio.index');
});

require __DIR__.'/auth.php';
