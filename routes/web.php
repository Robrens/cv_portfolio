<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\SeoController;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class)
    ->name('home');

Route::get('/legal-notices', HomeController::class)
    ->name('legal.mentions');

Route::get('/privacy-policy', HomeController::class)
    ->name('legal.privacy');

Route::get('/robots.txt', [SeoController::class, 'robots'])
    ->name('seo.robots');

Route::get('/sitemap.xml', [SeoController::class, 'sitemap'])
    ->name('seo.sitemap');