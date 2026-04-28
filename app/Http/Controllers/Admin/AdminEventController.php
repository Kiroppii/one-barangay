<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CommunityEvent;
use App\Models\EventRegistration;
use App\Models\User;
use Illuminate\Http\Request;

class AdminEventController extends Controller
{
    public function index()
    {
        $events = CommunityEvent::withCount('registrations')->orderBy('event_date', 'desc')->get();
        $residents = User::where('role', 'resident')->get(); // Assuming 'resident' role exists
        return view('admin.events.index', compact('events', 'residents'));
    }

    public function show($id)
    {
        $event = CommunityEvent::with(['registrations.user'])->findOrFail($id);
        return view('admin.events.show', compact('event'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'event_date' => 'required|date',
            'location' => 'required|string|max:255',
        ]);

        CommunityEvent::create($validated);

        return back()->with('success', 'Event created successfully!');
    }

    public function registerResident(Request $request)
    {
        $validated = $request->validate([
            'community_event_id' => 'required|exists:community_events,id',
            'user_id' => 'required|exists:users,id',
        ]);

        $alreadyRegistered = EventRegistration::where('community_event_id', $validated['community_event_id'])
            ->where('user_id', $validated['user_id'])
            ->exists();

        if ($alreadyRegistered) {
            return back()->with('error', 'Resident is already registered for this event.');
        }

        EventRegistration::create([
            'community_event_id' => $validated['community_event_id'],
            'user_id' => $validated['user_id'],
            'status' => 'Registered',
        ]);

        return back()->with('success', 'Resident registered successfully!');
    }

    public function searchResidents(Request $request)
    {
        $search = $request->get('q');
        $residents = User::where('role', 'resident')
            ->where(function($query) use ($search) {
                $query->where('name', 'LIKE', "%{$search}%")
                      ->orWhere('email', 'LIKE', "%{$search}%");
            })
            ->get(['id', 'name', 'email']);

        return response()->json($residents);
    }
}
