<?php

use App\Http\Controllers\IntermediatecitiesController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix'=>'intermediatecities/'], function() {
    Route::get('/', [IntermediatecitiesController::class, 'index'])->name('intermediatecities.index');
    Route::get('/{id}', [IntermediatecitiesController::class, 'show'])->name('intermediatecities.show');
    Route::post('/', [IntermediatecitiesController::class, 'store'])->name('intermediatecities.store');
    Route::post('/{id}', [IntermediatecitiesController::class, 'update'])->name('intermediatecities.update');
    Route::delete('/{id}', [IntermediatecitiesController::class, 'destroy'])->name('intermediatecities.destroy');
});