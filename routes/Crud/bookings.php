<?php

use App\Http\Controllers\BookingsController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix'=>'bookings/'], function() {
    Route::get('/', [BookingsController::class, 'index'])->name('bookings.index');
    Route::get('/{id}', [BookingsController::class, 'show'])->name('bookings.show');
    Route::post('/', [BookingsController::class, 'store'])->name('bookings.store');
    Route::post('/{id}', [BookingsController::class, 'update'])->name('bookings.update');
    Route::delete('/{id}', [BookingsController::class, 'destroy'])->name('bookings.destroy');
});