<?php

use App\Http\Controllers\GuruController;
use App\Http\Controllers\ProfileController;
use \App\Http\Controllers\Auth\AuthenticatedSessionController;
use Illuminate\Support\Facades\Route;

Route::get('/', [AuthenticatedSessionController::class, 'create'])->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('guru', GuruController::class)->except(['show', 'destroy']);

    Route::put('/gurustatus/{id}', [GuruController::class, 'updatestatus'])->name('guru.updatestatus');


});

require __DIR__.'/auth.php';



