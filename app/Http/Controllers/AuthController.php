<?php

namespace App\Http\Controllers;

use App\Models\Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    /**
     * Create a new user.
     */
    public function createUser(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:auth,email',
            'username' => 'required|string|max:255',
            'role_id' => 'nullable|exists:roles,id',
        ]);

        try {
            $user = Auth::create([
                'username' => $request->input('username'),
                'email' => $request->input('email'),
                'role_id' => $request->input('role_id', null),
            ]);

            return response()->json([
                'message' => 'User created successfully',
                'user' => $user,
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed to create user',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Get all users with their roles.
     */
    public function getAllUsers()
    {
        try {
            $users = Auth::with('role')->get();

            return response()->json($users, 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed to fetch users',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Assign a role to a user.
     */
    public function assignRole(Request $request, $id)
    {
        $request->validate([
            'role_id' => 'required|exists:roles,id',
        ]);

        try {
            $user = Auth::findOrFail($id);
            $user->role_id = $request->role_id;
            $user->save();

            return response()->json([
                'message' => 'Role assigned successfully',
                'user' => $user,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed to assign role',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
