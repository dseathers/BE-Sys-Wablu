<?php

namespace App\Http\Controllers\Transaction;


use App\Models\TransRequestor;
use Illuminate\Http\Request;

class TransactionRequestor 
{
    public function index(Request $request)
    {
        $requestor = $request->input('requestor_id');

        if (!$requestor) {
            return response()->json([
                'success' => false,
                'message' => 'Requestor is required'
            ]);
        }

        $getList = TransRequestor::where('requestor_id', $requestor)->get();

        if ($getList->isEmpty()) {
            return response()->json([
                'success' => false,
                'message' => 'Data not found'
            ]);
        }

        return response()->json([
            'success' => true,
            'data' => $getList
        ]);
    }
}