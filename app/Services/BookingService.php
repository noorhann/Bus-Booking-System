<?php
namespace App\Services;

use App\Http\Resources\SeatsListResource;
use App\Http\Resources\SeatsSingleResource;
use App\Models\Booking;
use App\Models\Bus;
use App\Models\IntermediateCity;
use App\Models\Seat;
use App\Models\Trip;

class BookingService 
{
    /**
     * Constructor.
     */
    public function __construct()
    {
        //
    }

    public function bookSeat($seatId ,$userId,$startCity, $endCity)
    {
        $seat = Seat::find($seatId);
        if (!$seat) 
        {
            return false;
        }
        
        if(!$this->isSeatAvailable($seatId , $startCity))
        {
            return apiResponse(
                false,
                'This Seat is not available',
                400,
            );
        }

        $booking = Booking::create([
            'seat_id' => $seatId ,
            'user_id' => $userId ,
            'start_city'=>$startCity,
            'endCity' => $endCity,
        ]);

        $this->markSeatAsBooked($seatId);

        $bus = Bus::find($seat->bus_id);
        $bus->available_seats = $bus->available_seats - 1 ;
        $bus->save();

        return apiResponse(
            true,
            'Booking created successfully' ,
            201,
            $booking
        );



    }

    public function getAvailableSeats($tripId,$startCity , $endCity)
    {
        $tripCities = $this->getTripCities($tripId);

        $startCityIndex = array_search($startCity, $tripCities);
        $endCityIndex = array_search($endCity, $tripCities);

        if ($startCityIndex === false || $endCityIndex === false || $startCityIndex >= $endCityIndex) 
        {
            return apiResponse(
                false,
                'no available seats found',
                200,
            );
        }
        
        $bus = Bus::whereTripId($tripId)->first();
        $seats = Seat::whereBusId($bus->id)->where('is_booked', 0)->get();
        
        // $bus = Bus::where('trip_id', $tripId)->whereHas('seats', function ($query) {
        //                 $query->where('is_booked', 1); 
        // })->with('seats')->first();

        if(!$seats)
        {
            $seat = $this->checkSeatsAfterBusFull($tripId, $startCity) ;
            if($seat)
            {
                $availableSeat = Seat::find($seat);
                return apiResponse(
                    true,
                    'Available seats retrived successfully',
                    200,
                    new SeatsSingleResource($seat),
                );

            }

            return apiResponse(
                false,
                'no available seats found',
                200,
            );
            
        }
        
        return apiResponse(
                true,
                'Available seats retrived successfully',
                200,
                SeatsListResource::collection($seats),
            );

    }

    private function getTripCities($tripId)
    {
        $cities = IntermediateCity::whereTripId($tripId)
                    ->orderby('sequence_number','ASC')
                    ->pluck('city_id')
                    ->toArray();
        
        $trip = Trip::find($tripId);

        array_unshift($cities, $trip->start_city);
        array_push($cities, $trip->end_city);

        return $cities;

    }
    
    private function isSeatAvailable($seatId,$startCity)
    {
        
        $seat = Seat::find($seatId);

        if (!$seat) {
            return false; 
        }

        if ($seat->is_booked == 1) {
            $bus = Bus::find($seat->bus_id);

            $seat = $this->checkSeatsAfterBusFull($bus->trip_id, $startCity);
            if(!$seat) 
            {
                return false;
            }  
        }

        return true;

    }

    private function checkSeatsAfterBusFull($tripId, $startCity)
    {
        $bus = Bus::whereTripId($tripId)->with('seats')->first();
        $seatIds = $bus->seats->pluck('id')->toArray();
        $bookings = Booking::whereIn('seat_id',$seatIds)->get();

        $tripCities = $this->getTripCities($tripId);
        $startCityIndex = array_search($startCity, $tripCities);
        if($startCityIndex)
        {

            foreach ($bookings as $booking)
            {
                $endCityIndex = array_search($booking->end_city, $tripCities);
     
                if($endCityIndex && $endCityIndex <= $startCityIndex)
                {
                    return $booking->seat_id;
                }
            }
        }
        return false;
         

    }

    private function markSeatAsBooked($seatId)
    {
        $seat = Seat::find($seatId);
        $seat->is_booked = 1 ;
        $seat->save();
    }
}