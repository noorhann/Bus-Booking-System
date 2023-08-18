<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUsersRequest as CreateRequest;
use App\Http\Requests\UpdateUsersRequest as UpdateRequest;
use App\Http\Resources\UsersListResource ;
use App\Http\Resources\UsersSingleResource ;
use App\Models\User ;
use Illuminate\Support\Facades\Log;
use Illuminate\Routing\Controller as BaseController;


class UsersController extends BaseController
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

            $records = User::orderBy('id','DESC')->get();
            
            return apiResponse(
                true,
                '',
                200,
                UsersListResource::collection($records),
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
            $record = User::find($id);

            if ($record)
            {
                return apiResponse(
                    true,
                    '',
                    200,
                    new UsersSingleResource($record)
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
            $record = User::create($request->all());
            
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
            $record = User::find($id);
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
            $record = User::find($id);
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
