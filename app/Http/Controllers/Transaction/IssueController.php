<?php

namespace App\Http\Controllers\Transaction;

use App\Models\TransIssue;
use Illuminate\Http\Request;

class IssueController
{
    public function __invoke(Request $request)
    {
        $request->validate([
            'title'=> 'required|string|max:255',
            'issueid'=> 'nullable|string',
            'requestor'=> 'required|string',
            'acceptor'=> 'required|string',
            'status'=> 'required|string',
            'content'=> 'required|string',
            'path'=> 'nullable|string',
            'remarks'=>'nullable|string',
            'priority_id'=>'required|string',
            'created_at'=>'nullable|string',
            'created_by'=>'nullable|string',
        ]);

        $data = [
            'title'=> $request->input('title'),
            'requestor'=> $request->input('requestor'),
            'acceptor'=> $request->input('acceptor'),
            'status'=> $request->input('status'),
            'content'=> $request->input('content'),
            'path'=> $request->input('path'),
            'remarks'=> $request->input('remarks'),
            'priority_id'=> $request->input('priority_id'),
            'created_by'=> $request->input('created_by'),
        ];

        if (!is_null($request->input('issueid'))) {
            $data['issueid'] = $request->input('issueid');
        }

        $issue = TransIssue::create($data);

        return response()->json([
            'message' => 'issue saved successfully',
            'data' => $issue
        ]);

    }
}
