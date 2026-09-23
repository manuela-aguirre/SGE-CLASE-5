<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [DashboardController::class, 'welcome'])
    ->name('welcome');

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Módulo de Productos
    // Route::resource('products', ProductController::class)->names('products');
    // Módulo de Categorías
    // Route::resource('categories', CategoryController::class)->names('categories');
    // Módulo de Clientes
    // Route::resource('clients', ClientController::class)->names('clients');
    // Módulo de Ventas
    // Route::resource('sales', SaleController::class)->names('sales');
});

require __DIR__.'/auth.php';