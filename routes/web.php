<?php

use App\Http\Controllers\CinemaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TodosController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\SeanceController;
use App\Http\Controllers\SalleController;


Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [CinemaController::class, 'index'])->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/reservations', [ReservationController::class, 'index'])->name('reservations.index');
    Route::get('/reservations/create/{id}', [ReservationController::class, 'create'])->name('reservations.create');
    Route::post('/reservations', [ReservationController::class, 'store'])->name('reservations.store');
    Route::delete('/reservations/{reservation}', [ReservationController::class, 'destroy'])->name('reservations.destroy');

    Route::get('/films/create', [CinemaController::class, 'create'])->name('films.create');
    Route::post('/films', [CinemaController::class, 'store'])->name('films.store');
    Route::post('/films/update', [CinemaController::class, 'update'])->name('films.update');
    Route::post('/films/delete/{id}', [CinemaController::class, 'delete'])->name('films.delete');
    Route::get('/films/{id}/edit', [CinemaController::class, 'edit'])->name('films.edit');
    Route::get('/films/{id}', [CinemaController::class, 'film'])->name('film');


    Route::get('/admin/seances', [SeanceController::class, 'index'])->name('admin.seances');
    Route::get('/admin/seances/create', [SeanceController::class, 'create'])->name('admin.seances.create');
    Route::post('/admin/seances/create', [SeanceController::class, 'store'])->name('admin.seances.store');
    Route::get('/admin/seances/{id}/edit', [SeanceController::class, 'edit'])->name('admin.seances.edit');
    Route::post('/admin/seances/update', [SeanceController::class, 'update'])->name('admin.seances.update');

    
    Route::get('/salles', [SalleController::class, 'index'])->name('salle.index');
    Route::get('/salles/create', [SalleController::class, 'create'])->name('salle.create');
    Route::post('/salle', [SalleController::class, 'store'])->name('salle.store');
    Route::put('/salle/update', [SalleController::class, 'update'])->name('salle.update');
    Route::post('/salle/delete/{id}', [SalleController::class, 'delete'])->name('salle.delete');
    Route::get('/salle/{id}/edit', [SalleController::class, 'edit'])->name('salle.edit');
    Route::get('/salle/{id}', [SalleController::class, 'show'])->name('salle');
    Route::post('/admin/seances/delete/{id}', [SeanceController::class, 'delete'])->name('admin.seances.delete');
});


Route::any('captcha-test', function() {
        if (request()->getMethod() == 'POST') {
            $rules = ['captcha' => 'required|captcha'];
            $validator = validator()->make(request()->all(), $rules);
            if ($validator->fails()) {
                echo '<p style="color: #ff0000;">Incorrect!</p>';
            } else {
                echo '<p style="color: #00ff30;">Matched :)</p>';
            }
        }
    
        $form = '<form method="post" action="captcha-test">';
        $form .= '<input type="hidden" name="_token" value="' . csrf_token() . '">';
        $form .= '<p>' . captcha_img() . '</p>';
        $form .= '<p><input type="text" name="captcha"></p>';
        $form .= '<p><button type="submit" name="check">Check</button></p>';
        $form .= '</form>';
        return $form;
    });
require __DIR__.'/auth.php';
