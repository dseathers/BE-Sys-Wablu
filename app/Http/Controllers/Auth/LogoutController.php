<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Sanctum\PersonalAccessToken;

class LogoutController
{
    public function logout(Request $request)
    {
        // Ambil token dari Authorization header
        $authHeader = $request->header('Authorization');
    
        if (!$authHeader || !str_starts_with($authHeader, 'Bearer ')) {
            return response()->json([
                'success' => false,
                'message' => 'Authorization token not found'
            ], 401);
        }
    
        $tokenValue = str_replace('Bearer ', '', $authHeader);
    
        // Hapus token dari database
        $token = PersonalAccessToken::findToken($tokenValue);
    
        if ($token) {
            $token->delete();
    
            return response()->json([
                'success' => true,
                'message' => 'Logout successful'
            ]);
        }
    
        return response()->json([
            'success' => false,
            'message' => 'Token not found or already invalid'
        ], 404);
    }
}
