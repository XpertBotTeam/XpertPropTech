<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\TransactionsRequest;
use App\Models\Transactions;


class TransactionsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transactions = Transactions::all();

        return response()->json([
            'status' => true,
            'data' => $transactions,
            'message' => 'Transactions retrieved successfully.',
        ]);
    }

    

    /**
     * Store a newly created resource in storage.
     */
    public function store(TransactionsRequest $request)
    {
        $user = auth()->user();
        if ($user->id == $request->get('user_id')) { // Corrected usage of $request
            $transactions = Transactions::create($request->all());
            return response()->json([
                'status' => true,
                'data' => $transactions,
                'message' => 'Transactions Created Successfully'
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
