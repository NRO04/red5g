<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SavingAccountController extends Controller
{
    public function create(Request $request, \App\Models\SavingAccount $saving_account){

        try {
            foreach ($request->all() as $key => $value) {
                $saving_account->$key = $value;
            }
            $saving_account->save();
            return response()->json([
                'message' => 'Saving Account created successfully',
                'saving_account' => $saving_account
            ], 201);
        }catch (\Exception $e) {
            return response()->json([
                'message' => 'Error creating a new a saving account',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
