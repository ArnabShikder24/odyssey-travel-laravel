<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    public function createUser(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'username' => 'required|string|max:255',
        ]);

        $username = $request->input('username');
        $email = $request->input('email');

        try {
            DB::table('auth')->insert([
                'username' => $username,
                'email' => $email,
            ]);

            return response()->json([
                'message' => 'User created successfully',
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed to create user',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function getAllUsers()
    {
        try {
            $users = DB::table('auth')->get();
            return response()->json($users, 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed to fetch users',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}

