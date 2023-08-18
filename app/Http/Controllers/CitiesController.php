<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCitiesRequest as CreateRequest;
use App\Http\Requests\UpdateCitiesRequest as UpdateRequest;
use App\Http\Resources\CitiesListResource ;
use App\Http\Resources\CitiesSingleResource ;
use App\Models\City ;
use Illuminate\Support\Facades\Log;
use Illuminate\Routing\Controller as BaseController;


class CitiesController extends BaseController
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

            $records = City::orderBy('id','DESC')->get();
            
            return apiResponse(
                true,
                '',
                200,
                CitiesListResource::collection($records),
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
            $record = City::find($id);

            if ($record)
            {
                return apiResponse(
                    true,
                    '',
                    200,
                    new CitiesSingleResource($record)
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
            $data = City::create($request->all());
            
            return apiResponse(
                true,
                'Created Successfully',
                201,
                $data
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
            $record = City::find($id);
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
            $record = City::find($id);
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
