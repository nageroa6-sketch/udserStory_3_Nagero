<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\RevisorController;
use App\Http\Controllers\HomeController;

// HOME + WELCOME
Route::get('/', function () {
    return view('welcome');
});

// AUTENTICAZIONE (laravel/ui)
Auth::routes();

// DASHBOARD STANDARD
Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

// ROTTE REVISIONE (SOLO REVISORES)
Route::middleware(['auth', 'is_revisor'])->prefix('revisor')->name('revisor.')->group(function () {
    Route::get('/dashboard', [RevisorController::class, 'index'])->name('dashboard');
    Route::patch('/annunci/{annuncio}/accetta', [RevisorController::class, 'accept'])->name('accept');
    Route::delete('/annunci/{annuncio}/rifiuta', [RevisorController::class, 'reject'])->name('reject');
    Route::post('/annulla', [RevisorController::class, 'undo'])->name('undo');
});

// HOME
Route::get('/home', [HomeController::class, 'index'])->name('home');
