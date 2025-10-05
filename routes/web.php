<?php

use App\Http\Controllers\LanguageController;
use Illuminate\Support\Facades\Route;

Route::get('/', fn () => view('welcome'));

// Languages Route
Route::controller(LanguageController::class)->prefix('language')->group(function () {
    Route::get('/', 'getLanguage')->name('get.language');
    Route::get('/{lang}', 'changeLanguage')->name('change.language');
});
