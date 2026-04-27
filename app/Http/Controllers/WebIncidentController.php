<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\IncidentReport; // Ensure your model is linked
use Illuminate\Support\Facades\Auth;

class WebIncidentController extends Controller
{
    public function store(Request $request)
    {
        // 1. Validate the form data
        $request->validate([
            'incident_type' => 'required|string',
            'location' => 'required|string',
            'description' => 'required|string',
        ]);

        // 2. Save to the database
        IncidentReport::create([
            'user_id' => Auth::id(),
            'incident_type' => $request->incident_type,
            'location' => $request->location,
            'description' => $request->description,
            'status' => 'Pending'
        ]);

        // 3. Redirect back to the list with a success message
        return redirect('/incidents')->with('success', 'Your incident report has been submitted successfully!');
    }

    public function index()
    {
        // Fetch incidents for the logged-in user, newest first
        $incidents = IncidentReport::where('user_id', Auth::id())
                                   ->orderBy('created_at', 'desc')
                                   ->get();

        return view('incidents.index', compact('incidents'));
    }
}