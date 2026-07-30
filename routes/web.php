<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\SeoController;
use App\Http\Middleware\TrackUniqueVisit;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class)
    ->middleware(TrackUniqueVisit::class)
    ->name('home');

Route::get('/legal-notices', HomeController::class)
    ->name('legal.mentions');

Route::get('/privacy-policy', HomeController::class)
    ->name('legal.privacy');

Route::get('/robots.txt', [SeoController::class, 'robots'])
    ->name('seo.robots');

Route::get('/sitemap.xml', [SeoController::class, 'sitemap'])
    ->name('seo.sitemap');

Route::get('/open-graph/hero.jpg', [SeoController::class, 'openGraphImage'])
    ->name('seo.og-image');
