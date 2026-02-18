<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;






// Route::prefix('revisor')->middleware(['auth', 'isRevisor'])->group(function () {    Route::get('/', [RevisorController::class, 'index'])->name('revisor.index');    Route::patch('{annuncio}/accept', [RevisorController::class, 'accept'])->name('revisor.accept');    Route::patch('{annuncio}/reject', [RevisorController::class, 'reject'])->name('revisor.reject');// });// Richiesta diventare revisore (esempio)// ────────────────────────────────────────────────Route::post('/become-revisor', [RevisorController::class, 'becomeRevisor'])    ->middleware('auth')    ->name('become.revisor');// Auth routes (già fornite da Laravel Breeze/Fortify/Jetstream)




Route::get('/', function () {
    return view('welcome');
});






Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');







Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});





Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);









require __DIR__.'/auth.php';
use App\Http\Controllers\Auth\ForgotPasswordController;

Route::get('/password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('/password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('/password/reset/{token}', [ForgotPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('/password/reset', [ForgotPasswordController::class, 'reset'])->name('password.update');