<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AgentController;

Route::resource('agents', AgentController::class);