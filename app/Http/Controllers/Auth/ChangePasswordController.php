<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use App\Models\User;

class ChangePasswordController
{
    public function update(Request $request)
    {
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'id' => 'required',
            'current_password' => 'required|string',
            'new_password' => 'required|string|min:8', // include new_password_confirmation
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validasi gagal',
                'errors' => $validator->errors()
            ], 422);
        }

        // Cari user berdasarkan ID
        $user = User::find($request->id);

        // Cek apakah current password cocok
        if (!Hash::check($request->current_password, $user->password)) {
            return response()->json([
                'success' => false,
                'message' => 'Current Password Not Match'
            ], 403);
        }

        // Update password
        $user->password = $request->new_password;
        $user->save();

        return response()->json([
            'success' => true,
            'code' => 200,
            'message' => 'Change Password Success'
        ]);
    }
}
}