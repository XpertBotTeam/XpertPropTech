<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\PropertiesRequest;
use App\Models\Properties;



class PropertiesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $properties = Properties::all();

        return response()->json([
            'status' => true,
            'data' => $properties,
            'message' => 'Properties retrieved successfully.',
        ]);
    }

    

    /**
     * Store a newly created resource in storage.
     */
    public function store(PropertiesRequest $request)
    {
        $user = auth()->user();
        if ($user->id == $request->get('user_id')) { // Corrected usage of $request
            $properties = Properties::create($request->all());
            return response()->json([
                'status' => true,
                'data' => $properties,
                'message' => 'Properties Created Successfully'
            ]);
        } else {
            return response()->json([
                'status' => false,
                'data' => null,
                'message' => 'User is not authenticated'
            ]);
        }
    }
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $properties = Properties::find($id);
        if(!is_null($properties))
        {
            return response()->json([
                'status'=>true,
                'data'=>$properties,
                'message'=>'Properties data returned successfully'
            ]);
        }else{
            return response()->json([
                'status'=>false,
                'data'=>null,
                'message'=>'Properties data not found'
            ]);
            
        }
    }

   
    /**
     * Update the specified resource in storage.
     */
    public function update(PropertiesRequest $request, string $id)
{
    $user = auth()->user();
    if ($user->id == $request->get('user_id')) {
        $properties = Properties::find($id);
        if (!is_null($properties)) {
            $properties->update($request->all()); // Corrected method call
            return response()->json([
                'status' => true,
                'data' => $properties,
                'message' => 'Properties Updated successfully'
            ]);
        } else {
            return response()->json([
                'status' => false,
                'data' => null,
                'message' => 'User not authenticated'
            ]);
        }
    }
    // Handle case where user is not authenticated for the given user_id
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $properties = Properties::find($id);
        if(!is_null($properties))
        {
            $properties->delete();
            return response()->json([
                'status' => true,
                'data'=>null,
                'message' => 'Properties deleted successfully'
            ]);
        }else{
            return response()->json([
                'status' => false,
                'data'=>null,
                'message' => 'Properties not found'
                ]);
        }
    }
}
