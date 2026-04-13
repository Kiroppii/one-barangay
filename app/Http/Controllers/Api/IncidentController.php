<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\IncidentReport;
use Illuminate\Http\Request;

class IncidentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $incidents = IncidentReport::with('user')->get();
        return response()->json($incidents);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'user_id' => 'required|exists:users,id',
            'incident_type' => 'required|string|max:255',
            'description' => 'required|string',
            'location' => 'required|string|max:255',
        ]);

        $incident = IncidentReport::create([
            'user_id' => $validatedData['user_id'],
            'incident_type' => $validatedData['incident_type'],
            'description' => $validatedData['description'],
            'location' => $validatedData['location'],
            'status' => 'Pending',
        ]);

        return response()->json([
            'message' => 'Incident reported successfully.',
            'data' => $incident
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
