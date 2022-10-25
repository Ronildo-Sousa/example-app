<?php

use App\Http\Controllers\SearchController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

require __DIR__.'/auth.php';

Route::middleware(['auth:sanctum'])->group(function () {
    Route::apiResource('searches', SearchController::class);
});