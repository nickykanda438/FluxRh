<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AgentController;

Route::middleware('auth')->group(function () {
    Route::resource('agents', AgentController::class);
    Route::patch('/agents/{agent}/status', [AgentController::class, 'updateStatus'])->name('agents.update-status');
});
