<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User; // Make sure this is here!
use Illuminate\Support\Facades\Hash; // Make sure this is here!

class AuthController extends Controller
{
    public function login(Request $request)
    {
        // 1. Validate the incoming request
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // 2. Find the user by their email
        $user = User::where('email', $request->email)->first();

        // 3. Check if user exists AND if the password hash matches
        if (! $user || ! Hash::check($request->password, $user->password)) {
            return response()->json([
                'message' => 'Invalid credentials'
            ], 401);
        }
        
        // 4. Generate the Sanctum Access Token
        $token = $user->createToken('OneBarangayToken')->plainTextToken;

        return response()->json([
            'message' => 'Login successful',
            'user' => $user,
            'token' => $token // This is the golden key!
        ], 200);
    }
}