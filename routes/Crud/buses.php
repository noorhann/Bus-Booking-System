<?php

use App\Http\Controllers\BusesController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix'=>'buses/'], function() {
    Route::get('/', [BusesController::class, 'index'])->name('buses.index');
    Route::get('/{id}', [BusesController::class, 'show'])->name('buses.show');
    Route::post('/', [BusesController::class, 'store'])->name('buses.store');
    Route::post('/{id}', [BusesController::class, 'update'])->name('buses.update');
    Route::delete('/{id}', [BusesController::class, 'destroy'])->name('buses.destroy');
});