<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController; // Corrección aquí

Route::get('/dashboard', [AdminController::class, 'index'])->name('administrador.dashboard');