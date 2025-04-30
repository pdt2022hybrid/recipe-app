<?php

use App\Http\Controllers\HomeController;

Route::name('api.')->group(function () {
    Route::get('home/search', [HomeController::class, 'apiSearch'])->name('home.search');
});
