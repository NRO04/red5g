<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Transaction extends Controller
{
    public function create(Request $request, \App\Models\Transaction $transaction){

        try {
            foreach ($request->all() as $key => $value) {
                $transaction->$key = $value;
            }
            $transaction->save();
            return response()->json([
                'message' => 'Client created successfully',
                'transaction' => $transaction
            ], 201);
        }catch (\Exception $e) {
            return response()->json([
                'message' => 'Error creating the transaction',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
