<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Route::get('/', HomeController::class)
    ->name('home');

Route::view('/legal-notices', 'legal.legal-notices')
    ->name('legal.mentions');

Route::view('/privacy-notices', 'legal.privacy-notices')
    ->name('legal.privacy');
