<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Models\CoreTeam;

class EditUserController
{
    public function updateRoleAndFile(Request $request)
    {
        $request->validate([
            'team_id' => 'required',
            'role_id' => 'required|string',
            'file_id' => 'nullable|string'
        ]);

        try {
            $team = CoreTeam::find($request->team_id);
            $team->role_id = $request->role_id;
            $team->file_id = $request->file_id;
            $team->save();

            return response()->json([
                'success' => true,
                'message' => 'User updated successfully',
                'data' => $team
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to update user',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
