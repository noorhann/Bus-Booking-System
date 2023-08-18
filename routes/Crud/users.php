<?php

use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix'=>'users/'], function() {
    Route::get('/', [UsersController::class, 'index'])->name('users.index');
    Route::get('/{id}', [UsersController::class, 'show'])->name('users.show');
    Route::post('/', [UsersController::class, 'store'])->name('users.store');
    Route::post('/{id}', [UsersController::class, 'update'])->name('users.update');
    Route::delete('/{id}', [UsersController::class, 'destroy'])->name('users.destroy');
});