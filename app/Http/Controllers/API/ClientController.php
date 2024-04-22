<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Client;
use App\Http\Requests\ClientRequest;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        {
            $client = Client::all();
            return response()->json([
                'status'=> true,
                'data'=>$client,
                'message'=>'client Retrieved Successfully'
            ]);
        }
    }

    

    /**
     * Store a newly created resource in storage.
     */
    public function store(ClientRequest $request)
    {
        $client = Client::create($request->all());
        return response()->json([
            'status'=> true,
            'data'=>$client,
            'message'=>'client Created Successfully'

        ]);
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $client = Client::find($id);
        if($client)
        {
            return response()->json([
                'status'=> true,
                'data'=>$client,
                'message'=>'Client Informations'
            ]);
        }else{
            return response()->json([
                'status'=> false,
                'data'=>$client,
                'message'=>'client not found'
            ]);
        }
     
    }

    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $client = Client::find($id);
        $client = $client->update($request->all());
        return response()->json([ 
            'status'=> true,
            'data'=>$client,
            'message'=>'Client Updated Successfully'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $client = Client::find($id);
        if(!is_null($client))
        {
            $client->delete();
            return response()->json([
                'status' => true,
                'data'=>null,
                'message' => 'Client deleted successfully'
            ]);
        }else{
            return response()->json([
                'status' => false,
                'data'=>null,
                'message' => 'Client not found'
                ]);
        }

    }
}
