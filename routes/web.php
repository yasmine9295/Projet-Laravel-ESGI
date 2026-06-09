<?php

use App\Http\Controllers\CinemaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TodosController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [CinemaController::class, 'index'])
    ->middleware(['auth'])->name('dashboard');

Route::get('/films/{id}', [CinemaController::class, 'film'])
    ->middleware(['auth'])->name('film');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/todos', [TodosController::class, 'index']);
    Route::get('/todos/create', [TodosController::class, 'create']);
    Route::post('/todos/create', [TodosController::class, 'post']);

    Route::get('/todos/update/{id}', [TodosController::class, 'form_update']);
    Route::post('/todos/update', [TodosController::class, 'do_update']);

    Route::get('/todos/{id}', [TodosController::class, 'show'])
    -> name('show_todo');
    Route::get('/todos/delete/{id}', [TodosController::class, 'delete'])
    -> name('delete_todo');
});



require __DIR__.'/auth.php';
