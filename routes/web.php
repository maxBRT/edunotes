<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SchoolClassController;
use App\Http\Controllers\NotesController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

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
