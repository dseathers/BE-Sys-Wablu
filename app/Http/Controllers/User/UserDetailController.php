<?php

namespace App\Http\Controllers\User;

use App\Models\UserList;
use Illuminate\Http\Request;

class UserDetailController
{
    public function index(Request $request)
    {
        $team_id = $request->input('team_id');

        if(!$team_id){
            return response()->json([
                'success' => false,
                'message' => 'team id is required'
            ]);
        }

        $userDetail = UserList::Where('team_id', $team_id)->get();
        return response()->json([
            'success' => true,
            'code'=> 200,
            'data' => $userDetail
        ]);
    }
}
