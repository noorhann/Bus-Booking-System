<?php

use App\Http\Controllers\CitiesController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix'=>'cities/'], function() {
    Route::get('/', [CitiesController::class, 'index'])->name('cities.index');
    Route::get('/{id}', [CitiesController::class, 'show'])->name('cities.show');
    Route::post('/', [CitiesController::class, 'store'])->name('cities.store');
    Route::post('/{id}', [CitiesController::class, 'update'])->name('cities.update');
    Route::delete('/{id}', [CitiesController::class, 'destroy'])->name('cities.destroy');
});