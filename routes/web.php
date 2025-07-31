<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ZonaController;

Route::get('/pruebas', function () {
    return view('pruebas');
});

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/zonas/crear', [ZonaController::class, 'create'])->name('zonas.create');

Route::get('/zonas/{zona}/editar', [ZonaController::class, 'edit'])->name('zonas.edit');

Route::put('/zonas/{zona}', [ZonaController::class, 'update'])->name('zonas.update');