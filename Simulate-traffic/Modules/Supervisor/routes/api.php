<?php

use Illuminate\Support\Facades\Route;
use Modules\Supervisor\Http\Controllers\SupervisorController;

Route::middleware(['auth:sanctum'])->prefix('v1')->group(function () {
    Route::apiResource('supervisor', SupervisorController::class)->names('supervisor');
});
