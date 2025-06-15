<?php

namespace App\Http\Controllers\Transaction;

use App\Models\History;
use Illuminate\Http\Request;

class HistoryController
{
    public function index (Request $request) {
        $issue = $request->input('issueid');

        if(!$issue){
            return response()->json([
                'success' => false,
                'code' => 400,
                'message' => 'issue id is required'
            ]);
        }

        $history = History::where('issueid', $issue)->orderBy('created_at', 'asc')->get();

        return response()->json([
            'success' => true,
            'code' => 200,
            'data' => $history
        ]);
    }

}
