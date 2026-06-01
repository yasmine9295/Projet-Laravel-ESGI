<?php

use App\Http\Controllers\TodosController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/todos', [TodosController::class, 'index']);
Route::get('/todos/create', [TodosController::class, 'create']);
Route::post('/todos/create', [TodosController::class, 'post']);
Route::get('/todos/{id}', [TodosController::class, 'show']);
