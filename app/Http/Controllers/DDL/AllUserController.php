<?php

namespace App\Http\Controllers\DDL;

use App\Models\AllUserRoleDdl;
use Illuminate\Http\Request;

class AllUserController
{
        public function index(){
        $roles = AllUserRoleDdl::all();
        return response()->json([
            'status' => 'success',  
            'code' => 200,
            'data' => $roles
        ]);
    }
}
