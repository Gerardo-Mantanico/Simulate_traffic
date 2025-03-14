<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Route::get('/', function () {
    return view('/welcome');
})->name('home');

Route::view('dashboard', 'monitor.dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('file', 'monitor.file')
    ->middleware(['auth', 'verified'])
    ->name('file');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
});

require __DIR__.'/auth.php';

//https://github.com/DaniCodex/traffic-light-semaforo/blob/master/index.html
