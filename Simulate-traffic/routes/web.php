<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SupervisorController;
use App\Http\Controllers\MonitorController;
use Livewire\Volt\Volt;


Route::get('/semaforo', App\Livewire\SemaforoTable::class)->name('semaforo');
Route::get('/semaforo/add', App\Livewire\SemaforoForm::class);

Route::get('/userRegister', App\Livewire\UserTable::class)->name('userRegister');
//Route::get('/user/add', App\Livewire\SemaforoForm::class);
/*
Route::get('/semaforo', function () {
    return view('livewire.semaforo-table');
});*/


Route::get('/', function () {
    return view('welcome');
})->name('home'); // Ruta de inicio, llamada home

// Ruta para el dashboard (acceso general)
Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

// Asegúrate de que esta ruta no esté dentro de algún grupo de rutas con prefijos o middleware.
Route::get('gestionar-usuario', function () {
    return view('livewire.user-table');
});


  /*  Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');
*/

  /*  Route::prefix('admin')->group(function(){
        require base_path('Modules/Administrador/routes/web.php');
    });
    Route::prefix('supervisor')->group(function(){
        require base_path('Modules/Supervisor/routes/web.php');
    });
    Route::prefix('monitoreo')->group(function(){
        require base_path('Modules/Monitoreo/routes/web.php');
    });
*/
// Ruta para la página de archivo
Route::view('file', 'monitor.file')
    ->middleware(['auth', 'verified'])
    ->name('file');

//Route::view('register', 'livewire.auth.register')->name('register');





// Rutas protegidas por el middleware de autenticación
Route::middleware(['auth'])->group(function () {
    // Ruta para el perfil de configuración
    Route::redirect('settings', 'settings/profile');

    // Rutas de configuración
    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');

});

require __DIR__.'/auth.php';
