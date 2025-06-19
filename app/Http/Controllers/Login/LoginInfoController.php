<?php

namespace App\Http\Controllers\Login;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LoginInfo;

class LoginInfoController 
{
    public function index(Request $request)
    {
        $email = $request->input('email');
    
        if (!$email) {
            return response()->json([
                'success' => false,
                'message' => 'Email is required'
            ], 400);
        }
    
        $loginInfo = LoginInfo::where('email', $email)->get();
    
        if ($loginInfo->isEmpty()) {
            return response()->json([
                'success' => false,
                'message' => 'No data found for this email'
            ], 404);
        }
    
        return response()->json([
            'success' => true,
            'data' => $loginInfo
        ]);
    }



    
}
