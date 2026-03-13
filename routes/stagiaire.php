<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StagiaireController;

Route::resource('stagiaires',StagiaireController::class);