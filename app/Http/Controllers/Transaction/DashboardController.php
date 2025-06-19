<?php

namespace App\Http\Controllers\Transaction;

use App\Models\DashboardAdmin;
use Illuminate\Http\Request;

class DashboardController
{
        public function index(){
        $data = DashboardAdmin::all();
        return response()->json($data);
    }
}
