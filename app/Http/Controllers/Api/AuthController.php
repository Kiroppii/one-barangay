<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Check if the credentials match our database
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user();
            
            // Generate the Sanctum Access Token
            $token = $user->createToken('OneBarangayToken')->plainTextToken;

            return response()->json([
                'message' => 'Login successful',
                'user' => $user,
                'token' => $token // This is the golden key!
            ], 200);
        }

        // If credentials fail
        return response()->json(['message' => 'Invalid credentials'], 401);
    }

    public function register(Request $request)
    {
        // 1. Validate the incoming data for both the user account and the profile
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'purok' => 'required|string|max:255',
            'contact_number' => 'nullable|string|max:20',
        ]);

        // 2. Create the core User account
        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => bcrypt($validatedData['password']),
            'role' => 'resident', // Automatically assign the resident role
        ]);

        // 3. Create the linked Resident Profile
        $user->profile()->create([
            'first_name' => $validatedData['first_name'],
            'last_name' => $validatedData['last_name'],
            'purok' => $validatedData['purok'],
            'contact_number' => $validatedData['contact_number'] ?? null,
        ]);

        // 4. Generate an access token so they are instantly logged in
        $token = $user->createToken('OneBarangayToken')->plainTextToken;

        return response()->json([
            'message' => 'Resident registered successfully.',
            'user' => $user->load('profile'),
            'token' => $token
        ], 201);
    }
}