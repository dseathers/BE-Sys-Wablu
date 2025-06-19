<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\CoreTeam;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class RegisterController
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:100',
            'email' => 'required|string|email|max:100|unique:users',
            'password' => 'required|string|min:6',
            'role_id' => 'required',
            'file_id'=>'nullable'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation error',
                'errors' => $validator->errors()
            ], 422);
        }
        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'role_id'  => $request->role_id,
            'password' => Hash::make($request->password),
        ]);

        CoreTeam::create([
            'team_name' => $request->name,
            'email'     => $request->email,
            'role_id'   => $request->role_id,
            'file_id'   => $request->file_id
        ]);

        return response()->json([
            'success' => true,
            'message' => 'User created successfully',
            'data' => $user
        ], 201);
    }
}
