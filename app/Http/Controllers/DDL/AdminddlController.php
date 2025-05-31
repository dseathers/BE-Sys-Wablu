<?php

namespace App\Http\Controllers\DDL;

use App\Models\Adminddl;
use Illuminate\Http\Request;

class AdminddlController
{
    public function index(){
        $Roles = Adminddl::all();
        return response()->json($Roles);
    }
}
