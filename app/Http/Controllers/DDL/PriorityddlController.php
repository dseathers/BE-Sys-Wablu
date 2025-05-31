<?php

namespace App\Http\Controllers\DDL;

use App\Models\Priorityddl;
use Illuminate\Http\Request;

class PriorityddlController
{
    public function index(){
        $priority = Priorityddl::all();
        return response()->json($priority);
    }
}
