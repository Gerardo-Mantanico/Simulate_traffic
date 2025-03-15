<?php

use Illuminate\Support\Facades\Route;
use Modules\Monitoreo\Http\Controllers\MonitoreoController;

Route::middleware(['auth:sanctum'])->prefix('v1')->group(function () {
    Route::apiResource('monitoreo', MonitoreoController::class)->names('monitoreo');
});
