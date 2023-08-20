<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserPortal\BookingsController;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Services\BookingService;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['prefix' => '/auth'], function () {
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/login', [AuthController::class, 'login']);
});

Route::group(['prefix' => '/userPortal', 'middleware' => ['auth']], function () {
    Route::post('/bookSeat', [BookingsController::class, 'bookSeat']);
    Route::get('/availableSeats', [BookingsController::class, 'availableSeats']);

});
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
