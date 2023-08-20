<?php

namespace App\Http\Controllers\UserPortal;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateBookingsRequest;
use App\Services\BookingService;
use Illuminate\Http\Request;

class BookingsController extends Controller
{
    public function bookSeat(CreateBookingsRequest $request)
    {
        $booking = new BookingService;
        return $booking->bookSeat($request->seat_id , $request->user_id , $request->start_city , $request->end_city);
    }

    // list of available seats to be booked for user trip
    public function availableSeats(Request $request)
    {
        $booking = new BookingService;
        return $booking->getAvailableSeats($request->trip_id, $request->start_city, $request->end_city);

    }

}
