<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\RevisorController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AnnuncioController;


// Homepage pubblica (ospiti + loggati leggeri)

Route::get('/', [HomeController::class, 'welcome'])
    ->name('welcome');


// Dashboard utente autenticato


Route::get('/home', [HomeController::class, 'dashboard'])
    ->middleware('auth')
    ->name('home');

// Annunci (CRUD base)

Route::resource('annunci', AnnuncioController::class)
    ->only(['index', 'show', 'create', 'store', 'edit', 'update', 'destroy']);

Route::get('annunci/{annuncio:slug}', [AnnuncioController::class, 'show'])
    ->name('annunci.show');   // opzionale se vuoi slug invece di id


// Area revisori (protetta)
// ────────────────────────────────────────────────



// Route::prefix('revisor')->middleware(['auth', 'isRevisor'])->group(function () {
    Route::get('/', [RevisorController::class, 'index'])->name('revisor.index');
    Route::patch('{annuncio}/accept', [RevisorController::class, 'accept'])->name('revisor.accept');
    Route::patch('{annuncio}/reject', [RevisorController::class, 'reject'])->name('revisor.reject');
// });

// Richiesta diventare revisore (esempio)
// ────────────────────────────────────────────────
Route::post('/become-revisor', [RevisorController::class, 'becomeRevisor'])
    ->middleware('auth')
    ->name('become.revisor');

// Auth routes (già fornite da Laravel Breeze/Fortify/Jetstream)
require __DIR__.'/auth.php';
