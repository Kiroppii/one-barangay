<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class WebAuthController extends Controller
{
    // ==========================================
    // 1. RESIDENT AUTHENTICATION
    // ==========================================

    public function showLoginForm()
    {
        // Make sure your view is at resources/views/auth/login.blade.php
        return view('auth.login');
    }

    public function showRegisterForm()
    {
        // Make sure your view is at resources/views/auth/register.blade.php
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'first_name'     => 'required|string|max:255',
            'last_name'      => 'required|string|max:255',
            'email'          => 'required|email|unique:users,email',
            'contact_number' => 'required|digits:11',
            'birthday'       => 'required|date|before:today',
            'address'        => 'required|string|max:255',
            'password'       => 'required|min:8|confirmed',
        ]);

        $user = User::create([
            'name'           => $request->first_name . ' ' . $request->last_name,
            'email'          => $request->email,
            'contact_number' => $request->contact_number,
            'birthday'       => $request->birthday,
            'address'        => $request->address,
            'password'       => Hash::make($request->password),
            'role'           => 'resident', // Standard user role
        ]);

        Auth::login($user);
        return redirect('/dashboard');
    }

    // ==========================================
    // 2. ADMIN REGISTRATION PORTAL
    // ==========================================

    public function showAdminRegisterForm()
    {
        return view('auth.admin-register');
    }

    public function registerAdmin(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name'  => 'required|string|max:255',
            'email'      => 'required|email|unique:users,email',
            'password'   => 'required|min:8|confirmed',
        ]);

        $admin = User::create([
            'name'     => $request->first_name . ' ' . $request->last_name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'role'     => 'admin', // Forces the account to be an Admin
        ]);

        Auth::login($admin);
        return redirect('/admin/dashboard'); 
    }

    // ==========================================
    // 3. CORE LOGIN & LOGOUT LOGIC
    // ==========================================

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $redirectPath = Auth::user()->role === 'admin'
                ? route('admin.dashboard')
                : route('dashboard');

            return redirect()->intended($redirectPath);
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect('/login');
    }
}