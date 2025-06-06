<?php

namespace App\Http\Controllers\Transaction;


use App\Models\TransRequestor;
use Illuminate\Http\Request;

class TransactionRequestor 
{
    public function index(Request $request)
    {
        $createdBy = $request->input('created_by_id');

        if (!$createdBy) {
            return response()->json([
                'success' => false,
                'message' => 'created by id is required'
            ]);
        }

        $getList = TransRequestor::where('created_by_id', $createdBy)->get();

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