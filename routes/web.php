<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class)
    ->name('home');

Route::get('/legal-notices', HomeController::class)
    ->name('legal.mentions');

Route::get('/privacy-policy', HomeController::class)
    ->name('legal.privacy');
