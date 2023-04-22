<?php

namespace App\Http\Controllers;

use App\Models\SavingAccount;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{
    public function create(Request $request, \App\Models\Transaction $transaction, SavingAccount $saving_account): \Illuminate\Http\JsonResponse
    {

        try {

            DB::beginTransaction();
            foreach ($request->all() as $key => $value) {
                if($key != 'amount'){
                    $transaction->$key = $value;
                }
            }

            $saving_account = $saving_account->find($request->get('saving_account_id'));
            $current_balance = $saving_account['balance'];
            $final_balance = $current_balance - $request->get('amount');
            $transaction_date = now();
            $transaction->current_balance = $current_balance;
            $transaction->final_balance = $final_balance;
            $transaction->transaction_date = $transaction_date;
            $transaction->transaction_status = 1;
            $transaction->save();
            DB::commit();
            return response()->json([
                'message' => 'Transaction created successfully',
                'transaction' => $transaction
            ], 201);

        }catch (\Exception $e) {
            return response()->json([
                'message' => 'Error creating the transaction',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function getTransactions(Transaction $transaction): \Illuminate\Database\Eloquent\Collection|\Illuminate\Http\JsonResponse
    {

        try {
            return $transaction->all();
        }catch (\Exception $e) {
            return response()->json([
                'message' => 'Error getting the transactions',
                'error' => $e->getMessage()
            ], 500);
        }

    }
}
