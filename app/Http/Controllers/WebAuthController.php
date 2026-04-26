<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class WebAuthController extends Controller
{
    // Handle the Universal Login
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $user = Auth::user();

            // Universal Redirect based on Role
            if ($user->role === 'admin') {
                return redirect()->intended('/admin/dashboard');
            }

            // Default resident redirect
            return redirect()->intended('/certificates');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    // Handle Resident Registration
    public function register(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name'  => 'required|string|max:255',
            'email'      => 'required|email|unique:users,email',
            'password'   => 'required|min:8|confirmed', // Must be 8 chars AND match password_confirmation
        ], [
            // Custom Error Messages to make it look professional
            'password.min' => 'For security, your password must be at least 8 characters long.',
            'email.unique' => 'This email is already registered in the barangay portal.',
        ]);

        // 2. Save to Database
        $user = User::create([
            'name'     => $request->first_name . ' ' . $request->last_name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'role'     => 'resident', 
        ]);

        // 3. Log them in and redirect
        Auth::login($user);

        return redirect('/certificates');
    }

    // Handle Logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}