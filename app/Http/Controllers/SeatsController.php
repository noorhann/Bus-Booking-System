<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSeatsRequest as CreateRequest;
use App\Http\Requests\UpdateSeatsRequest as UpdateRequest;
use App\Http\Resources\SeatsListResource ;
use App\Http\Resources\SeatsSingleResource ;
use App\Models\Seat ;
use Illuminate\Support\Facades\Log;
use Illuminate\Routing\Controller as BaseController;


class SeatsController extends BaseController
{
   

    /**
     * Constructor.
    */
    public function __construct()
    {
        //
    }

    /**
    * Get All Records
    * @return \Illuminate\Http\JsonResponse
    */
    public function index()
    {
        try 
        {

            $records = Seat::orderBy('id','DESC')->get();
            
            return apiResponse(
                true,
                '',
                200,
                SeatsListResource::collection($records),
            );
        } 
        catch (\Throwable $th) 
        {
            Log::error($th);
        }
    }

    /**
    * Get Single Record
    * @param $id
    * @return \Illuminate\Http\JsonResponse
    */
    public function show($id)
    {
        try {
            $record = Seat::find($id);

            if ($record)
            {
                return apiResponse(
                    true,
                    '',
                    200,
                    new SeatsSingleResource($record)
                );
            }
            else 
            {
                return apiResponse(
                    true,
                    'Not Found !',
                    400,
                );
            }
        } 
        catch (\Throwable $th) 
        {
            Log::error($th);
        }
    }

    /**
    * Create a New Record
    * @param CreateRequest $request
    * @return \Illuminate\Http\JsonResponse
    */
    public function store(CreateRequest $request)
    {
        try 
        {
            $record = Seat::create($request->all());
            
            return apiResponse(
                true,
                'Created Successfully',
                201,
                $record
            );
        } 
        catch (\Throwable $th) 
        {
            Log::error($th);
        }
    }

    /**
    * Update Record
    * @param UpdateRequest $request
    * @return \Illuminate\Http\JsonResponse
    */
    public function update(UpdateRequest $request, $id)
    {
        try 
        {
            $record = Seat::find($id);
            if ($record)
            {   
                $record->update($request->all());
                
                return apiResponse(
                    true,
                    'Updated Successfully',
                    200,
                    $record
                );
            }
            else 
            {
                return apiResponse(
                    true,
                    'Not Found !',
                    400,
                );
            }
        } 
        catch (\Throwable $th) 
        {
            Log::error($th);
        }
    }

    /**
    * Delete Record
    * @param $id
    * @return \Illuminate\Http\JsonResponse
    */
    public function destroy($id)
    {
        try {
            $record = Seat::find($id);
            if ($record)
            {
                $record->delete();
                return apiResponse(
                    true,
                    'Deleted Successfully',
                    200,
                );
            }
            else 
            {
                return apiResponse(
                    true,
                    'Not Found !',
                    400,
                );
            }
        } 
        catch (\Throwable $th) 
        {
            Log::error($th);
        }
    }

}
