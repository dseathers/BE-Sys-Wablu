<?php

namespace App\Http\Controllers\Transaction;

use App\Models\TransRequestor;
use Illuminate\Http\Request;

class TransactionReqDtl
{
    public function index(Request $request)
    {
        $createdBy = $request->input('created_by_id');

        if(!$createdBy){
            return response()->json([
                'success' => false,
                'message' => 'created by id is required'
            ]);
        }

        $issueId = $request->input('issueid');

        if(!$issueId){
            return response()->json([
                'success' => false,
                'message' => 'issue id is required'
            ]);
        }

        $getListDtl = TransRequestor::where('created_by_id', $createdBy)->where('issueid', $issueId)->get();

        if($getListDtl->isEmpty()){
            return response()->json([
                'success'=> false,
                'message'=> 'Data not found'
            ]);
        }

        return response()->json([
            'success'=> true,
            'data'=> $getListDtl
        ]);
    }
}
