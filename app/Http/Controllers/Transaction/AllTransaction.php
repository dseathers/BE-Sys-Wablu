<?php

namespace App\Http\Controllers\Transaction;

use App\Models\TransRequestor;
use Illuminate\Http\Request;

class AllTransaction
{
    public function index(Request $request)
    {
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

    $offset = $pageNumber * $pageSize;

    $query = TransRequestor::query();

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
