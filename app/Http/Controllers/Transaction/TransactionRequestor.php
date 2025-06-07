<?php

namespace App\Http\Controllers\Transaction;

use App\Models\TransRequestor;
use Illuminate\Http\Request;

class TransactionRequestor
{
    public function index(Request $request)
    {
    $createdBy = $request->input('created_by_id');
    $pageSize = (int) $request->input('pageSize', 10);
    $pageNumber = (int) $request->input('pageNumber', 0);
    $orderBy = $request->input('orderBy', 'desc');
    $sortBy = $request->input('sortBy', 'issueid');
    $search = $request->input('search'); // Tambahan: input search dari user

    $orderBy = !empty($orderBy) ? $orderBy : 'desc';
    $sortBy = !empty($sortBy) ? $sortBy : 'issueid';

    if (!$createdBy) {
        return response()->json([
            'success' => false,
            'message' => 'created_by_id is required'
        ]);
    }

    $offset = $pageNumber * $pageSize;

    $query = TransRequestor::where('created_by_id', $createdBy);

    if (!empty($search)) {
        $query->where('filter', 'ILIKE', '%' . $search . '%'); // pakai ILIKE untuk case-insensitive (PostgreSQL)
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
