<?php

namespace App\Http\Controllers\Transaction;

use App\Models\DashboadUserSummary;
use Illuminate\Http\Request;

class DashboardSumUserController
{
        public function index(){
        $data = DashboadUserSummary::all();
        return response()->json($data);
    }
}
