<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CommunityEvent;
use App\Models\EventRegistration;
use Illuminate\Support\Facades\Auth;

class WebEventController extends Controller
{
    public function register($id)
    {
        $event = CommunityEvent::findOrFail($id);
        $userId = Auth::id();

        // Check if they are already registered so we don't duplicate!
        $alreadyRegistered = EventRegistration::where('user_id', $userId)
                                              ->where('community_event_id', $id)
                                              ->exists();

        if ($alreadyRegistered) {
            return back()->with('error', 'You are already registered for this event!');
        }

        // Create the registration
        EventRegistration::create([
            'user_id' => $userId,
            'community_event_id' => $id,
            'status' => 'Registered'
        ]);

        return back()->with('success', 'Successfully registered for ' . $event->title . '!');
    }

    public function index()
    {
        // Fetch all events, ordering by the date they happen
        $events = CommunityEvent::orderBy('event_date', 'asc')->get();
        
        return view('events.index', compact('events'));
    }
}