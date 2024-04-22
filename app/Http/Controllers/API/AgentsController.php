<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AgentsRequest;
use App\Models\Agents;

class AgentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $agents = Agents::all();
        return response()->json([
            'status'=> true,
            'data'=>$agents,
            'message'=>'Agents Retrieved Successfully'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
   
    public function store(AgentsRequest $request)
    {
        $agents = Agents::create($request->all());
        return response()->json([
            'status'=> true,
            'data'=>$agents,
            'message'=>'Agents Created Successfully'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $agents = Agents::find($id);
        if($agents)
        {
            return response()->json([
                'status'=> true,
                'data'=>$agents,
                'message'=>'Agents Informations'
            ]);
        }else{
            return response()->json([
                'status'=> false,
                'data'=>$agents,
                'message'=>'Agents not found'
            ]);
        }
     
    }

    

    /**
     * Update the specified resource in storage.
     */
    public function update(AgentsRequest $request, string $id)
{
    // Find the agent by ID
    $agent = Agents::find($id);

    // Check if the agent exists
    if ($agent) {
        // Validate the incoming request data based on the defined rules
        $validatedData = $request->validated();

        // Update the agent with the validated data
        $agent->update($validatedData);

        // Return a JSON response indicating success
        return response()->json([
            'status' => true,
            'data' => $agent,
            'message' => 'Agent updated successfully'
        ]);
    } else {
        // Return a JSON response indicating failure if the agent is not found
        return response()->json([
            'status' => false,
            'data' => null,
            'message' => 'Agent not found'
        ], 404);
    }
}

    
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $result = Agents::destroy($id);
       
        if($result)
        {
            return response()->json([ 
                'status'=> true,
                'data'=>null,
                'message'=>'Agents deleted Successfully'
            ]);

        }else{
            return response()->json([ 
                'status'=> false,
                'data'=>null,
                'message'=>'Agents not found'
            ]);
        }
    }
}
