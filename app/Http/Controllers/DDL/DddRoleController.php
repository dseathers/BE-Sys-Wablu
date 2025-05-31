<?php

namespace App\Http\Controllers\DDL;

use App\Models\Role;

class DddRoleController 
{
    public function index(){
        $roles = Role::all();
        return response()->json($roles);
    }
}
