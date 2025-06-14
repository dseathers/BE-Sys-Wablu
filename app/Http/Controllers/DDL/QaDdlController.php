<?php

namespace App\Http\Controllers\DDL;

use App\Models\QaDdl;
use Illuminate\Http\Request;

class QaDdlController
{
    public function index(){
        $Roles = QaDdl::all();
        return response()->json($Roles);
    }
}
