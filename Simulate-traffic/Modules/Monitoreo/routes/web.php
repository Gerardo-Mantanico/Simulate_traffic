<?php

use Illuminate\Support\Facades\Route;


Route::get('/dashboard', function () {
    return view('dashboard'); // Aquí 'mi-vista' es el nombre de tu vista
});