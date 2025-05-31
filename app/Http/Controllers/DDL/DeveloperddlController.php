<?php

namespace App\Http\Controllers\DDl;

use App\Models\DeveloperDdl;
use Illuminate\Http\Request;

class DeveloperddlController
{
    public function index(){
        $Roles = DeveloperDdl::all();
        return response()->json($Roles);
    }
}
