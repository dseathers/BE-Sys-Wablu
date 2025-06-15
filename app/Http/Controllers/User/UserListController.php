<?php

namespace App\Http\Controllers\User;

use App\Models\UserList;
use Illuminate\Http\Request;

class UserListController
{
    public function index(Request $request){
        $pageSize = (int) $request->input('pageSize', 10);
        $pageNumber = (int) $request->input('pageNumber', 0);
        $orderBy = $request->input('orderBy', 'desc');
        $sortBy = $request->input('sortBy', 'created_date');
        $search = $request->input('search');

        $orderBy = !empty($orderBy) ? $orderBy : 'desc';
        $sortBy = !empty($sortBy) ? $sortBy : 'created_date';

        $offset = $pageNumber * $pageSize;

        $query = UserList::query();

        if (!empty($search)) {
        $query->where('filter', 'ILIKE', '%' . $search . '%');
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
