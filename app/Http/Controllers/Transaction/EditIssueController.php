<?php

namespace App\Http\Controllers\Transaction;

use App\Models\TransRequestorDtl;
use Illuminate\Http\Request;

class EditIssueController
{
    public function index(Request $request)
    {
        $id = $request->input('id');
        if (!$id) {
            return response()->json([
                'success' => false,
                'message' => 'id is required'
            ], 400);
        }

        $issueid = $request->input('issueid');
        if (!$issueid) {
            return response()->json([
                'success' => false,
                'message' => 'issueid is required'
            ], 400);
        }

        $getIssue = TransRequestorDtl::where('id', $id)
                        ->where('issueid', $issueid)
                        ->get();

        if ($getIssue->isEmpty()) {
            return response()->json([
                'success' => false,
                'message' => 'Issue not found'
            ], 400);
        }

        return response()->json([
            'success' => true,
            'message' => 'success',
            'data' => $getIssue
        ], 200);
    }
}
