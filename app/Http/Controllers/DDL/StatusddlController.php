<?php

namespace App\Http\Controllers\DDL;

use App\Models\Statusddl;

class StatusddlController
{
    public function index(){
        $status = Statusddl::all();
        return response()->json($status);
    }
}
