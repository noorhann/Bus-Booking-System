<?php

use App\Http\Controllers\TripsController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix'=>'trips/'], function() {
    Route::get('/', [TripsController::class, 'index'])->name('trips.index');
    Route::get('/{id}', [TripsController::class, 'show'])->name('trips.show');
    Route::post('/', [TripsController::class, 'store'])->name('trips.store');
    Route::post('/{id}', [TripsController::class, 'update'])->name('trips.update');
    Route::delete('/{id}', [TripsController::class, 'destroy'])->name('trips.destroy');
});