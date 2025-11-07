<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SchoolClassController;
use App\Http\Controllers\NotesController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\LoginController;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::view('/login', 'auth.login')->name('login');
Route::view('/register', 'auth.register')->name('register');

Route::post('/register', RegisterController::class);
Route::post('/login', LoginController::class);
Route::post('/logout', LogoutController::class)->name('logout');


Route::middleware('auth')->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');

    Route::get('/notes/create', [NotesController::class, 'create'])
        ->name('notes.create');

    Route::post('/notes', [NotesController::class, 'store'])
        ->name('notes.store');

    Route::get('/notes/{note}', [NotesController::class, 'show'])
        ->name('notes.show');

    Route::get('/notes/{note}/edit', [NotesController::class, 'edit'])
        ->name('notes.edit');

    Route::put('/notes/{note}', [NotesController::class, 'update'])
        ->name('notes.update');

    Route::delete('/notes/{note}', [NotesController::class, 'destroy'])
        ->name('notes.destroy');

    Route::get('/schoolclasses/create', [SchoolClassController::class, 'create'])
        ->name('schoolclasses.create');

    Route::post('/schoolclasses', [SchoolClassController::class, 'store'])
        ->name('schoolclasses.store');

    Route::get('/schoolclasses/{schoolclass}', [SchoolClassController::class, 'show'])
        ->name('schoolclasses.show');

    Route::put('/schoolclasses/{schoolclass}', [SchoolClassController::class, 'update'])
        ->name('schoolclasses.update');

    Route::get('/schoolclasses/{schoolclass}/edit', [SchoolClassController::class, 'edit'])
        ->name('schoolclasses.edit');
});
