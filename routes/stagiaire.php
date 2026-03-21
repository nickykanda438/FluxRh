<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StagiaireController;

Route::middleware('auth')->group(function () {
    Route::resource('stagiaires', StagiaireController::class);
});
