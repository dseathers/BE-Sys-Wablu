<?php

namespace App\Http\Controllers\Transaction;

use App\Models\TransRequestor;
use Illuminate\Http\Request;

class TransactionRequestor
{
    public function index(Request $request)
    {
    $createdBy = $request->input('created_by_id');
    $acceptor = $request->input('acceptor_id');
    $pageSize = (int) $request->input('pageSize', 10);
    $pageNumber = (int) $request->input('pageNumber', 0);
    $orderBy = $request->input('orderBy', 'desc');
    $sortBy = $request->input('sortBy', 'issueid');
    $search = $request->input('search');
    $status = $request->input('status');
    $priority = $request->input('priority');
    $assignee = $request->input('assignee');

    $orderBy = !empty($orderBy) ? $orderBy : 'desc';
    $sortBy = !empty($sortBy) ? $sortBy : 'created_at';

    if (!$createdBy) {
        return response()->json([
            'success' => false,
            'message' => 'created_by_id is required'
        ]);
    }

    if (!$acceptor){
        return response()->json([
            'success' => false,
            'message' => 'acceptor_id is required'
        ]);
    }

    $offset = $pageNumber * $pageSize;

    $query = TransRequestor::where(function($q) use ($createdBy, $acceptor) {
    $q->where('created_by_id', $createdBy)
      ->orWhere('acceptor_id', $acceptor);
});

    if (!empty($search)) {
        $query->where('filter', 'ILIKE', '%' . $search . '%');
    }

    if(!empty($status)){
        $query->where('status_id', $status);
    }

    if(!empty($priority)){
        $query->where('priority_id', $priority);
    }

    if(!empty($assignee)){
        $query->where('acceptor_id', $assignee);
    }

    $total = $query->count();

    $getList = $query->orderBy($sortBy, $orderBy)
        ->offset($offset)
        ->limit($pageSize)
        ->get();

    if ($getList->isEmpty()) {
        return response()->json([
            'success' => false,
            'message' => 'Data not found'
        ]);
    }

    return response()->json([
        'success' => true,
        'total' => $total,
        'data' => $getList
    ]);
}
}
