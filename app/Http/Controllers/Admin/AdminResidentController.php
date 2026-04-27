<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\Mail\ResidentWelcomeMail;

class AdminResidentController extends Controller
{
    // List all residents
    public function index()
    {
        $residents = User::where('role', 'resident')->latest()->get();
        return view('admin.residents.index', compact('residents'));
    }

    // Show the creation form
    public function create()
    {
        return view('admin.residents.create');
    }

    // Automated Workflow: Save Resident -> Generate Password -> Send Email
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name'  => 'required|string|max:255',
            'email'      => 'required|email|unique:users,email',
        ]);

        // 1. Generate a secure, random 10-character password
        $temporaryPassword = Str::random(10);

        // 2. Save the new resident
        $resident = User::create([
            'name'     => $request->first_name . ' ' . $request->last_name,
            'email'    => $request->email,
            'password' => Hash::make($temporaryPassword),
            'role'     => 'resident',
        ]);

        // 3. Automation Integration: Dispatch the Welcome Email
        // Note: For this to work in local dev without crashing, ensure MAIL_MAILER=log is in your .env
        try {
            Mail::to($resident->email)->send(new ResidentWelcomeMail($resident, $temporaryPassword));
            $mailStatus = "An email containing their temporary password has been sent automatically.";
        } catch (\Exception $e) {
            $mailStatus = "Resident created, but the email notification failed to send. Temporary Password: " . $temporaryPassword;
        }

        return redirect('/admin/residents')->with('success', 'Resident registered successfully! ' . $mailStatus);
    }
}
