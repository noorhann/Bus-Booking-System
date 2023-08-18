<?php

use App\Http\Controllers\SeatsController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix'=>'seats/'], function() {
    Route::get('/', [SeatsController::class, 'index'])->name('seats.index');
    Route::get('/{id}', [SeatsController::class, 'show'])->name('seats.show');
    Route::post('/', [SeatsController::class, 'store'])->name('seats.store');
    Route::post('/{id}', [SeatsController::class, 'update'])->name('seats.update');
    Route::delete('/{id}', [SeatsController::class, 'destroy'])->name('seats.destroy');
});