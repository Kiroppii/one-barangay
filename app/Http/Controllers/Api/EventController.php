<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\CommunityEvent;
use App\Models\EventRegistration;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = CommunityEvent::all();
        return response()->json($events);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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

    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'user_id' => 'required|exists:users,id',
            'community_event_id' => 'required|exists:community_events,id',
        ]);

        // Prevent double registration
        $existing = EventRegistration::where('user_id', $validatedData['user_id'])
                        ->where('community_event_id', $validatedData['community_event_id'])
                        ->first();

        if ($existing) {
            return response()->json(['message' => 'You are already registered for this event.'], 400);
        }

        $registration = EventRegistration::create([
            'user_id' => $validatedData['user_id'],
            'community_event_id' => $validatedData['community_event_id'],
            'status' => 'Registered',
        ]);

        return response()->json([
            'message' => 'Successfully registered for the event!',
            'data' => $registration
        ], 201);
    }
}
