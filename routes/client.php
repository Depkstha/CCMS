<?php
use App\Http\Controllers\WebsiteController;
use Illuminate\Support\Facades\Route;

Route::get('{parent?}/{slug}', [WebsiteController::class, 'loadPage'])
    ->name('page.load');

// Route::fallback([WebsiteController::class, 'fallback']);
