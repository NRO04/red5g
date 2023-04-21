<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Client extends Controller
{

    public function create(Request $request, \App\Models\Client $client){

        try {
            foreach ($request->all() as $key => $value) {
                $client->$key = $value;
            }
            $client->save();
            return response()->json([
                'message' => 'Client created successfully',
                'client' => $client
            ], 201);
        }catch (\Exception $e) {
            return response()->json([
                'message' => 'Error creating a new client',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
