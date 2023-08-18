<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateIntermediateCitiesRequest as CreateRequest;
use App\Http\Requests\UpdateIntermediateCitiesRequest as UpdateRequest;
use App\Http\Resources\IntermediateCitiesListResource ;
use App\Http\Resources\IntermediateCitiesSingleResource ;
use App\Models\IntermediateCity ;
use Illuminate\Support\Facades\Log;
use Illuminate\Routing\Controller as BaseController;


class IntermediatecitiesController extends BaseController
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

            $records = IntermediateCity::orderBy('id','DESC')->get();
            
            return apiResponse(
                true,
                '',
                200,
                IntermediateCitiesListResource::collection($records),
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
            $record = IntermediateCity::find($id);

            if ($record)
            {
                return apiResponse(
                    true,
                    '',
                    200,
                    new IntermediateCitiesSingleResource($record)
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
            $record = IntermediateCity::create($request->all());
            
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
            $record = IntermediateCity::find($id);
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
            $record = IntermediateCity::find($id);
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
