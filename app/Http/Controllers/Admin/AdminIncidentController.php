<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\IncidentReport; // Using your Incident model

class AdminIncidentController extends Controller
{
    // 1. DYNAMIC INDEX (Handles Search, Filter, and Export)
    public function index(Request $request)
    {
        $query = IncidentReport::with('user')->orderBy('created_at', 'desc');

        // Handle Search (Searches Incident Type, Location, and Resident Name)
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('incident_type', 'LIKE', "%{$search}%")
                  ->orWhere('location', 'LIKE', "%{$search}%") // Added location search
                  ->orWhereHas('user', function($userQuery) use ($search) {
                      $userQuery->where('name', 'LIKE', "%{$search}%");
                  });
            });
        }

        // Handle Status Filter
        if ($request->filled('status') && $request->status !== 'All Statuses') {
            $query->where('status', $request->status);
        }

        // CSV Export
        if ($request->has('export')) {
            $incidents = $query->get();
            
            return response()->streamDownload(function () use ($incidents) {
                $file = fopen('php://output', 'w');
                
                // Add CSV Headers for Incidents
                fputcsv($file, ['Report ID', 'Reporter Name', 'Incident Type', 'Location', 'Status', 'Date Reported']);
                
                // Add Row Data
                foreach ($incidents as $incident) {
                    fputcsv($file, [
                        '#INC-' . $incident->id,
                        $incident->user ? $incident->user->name : 'Unknown User', 
                        $incident->incident_type,
                        $incident->location,
                        $incident->status,
                        $incident->created_at->format('Y-m-d h:i A')
                    ]);
                }
                fclose($file);
            }, "incidents_export_" . date('Y-m-d') . ".csv");
        }

        $incidents = $query->get();
        return view('admin.incidents.index', compact('incidents'));
    }

    // 2. SHOW DETAILS PAGE
    public function show($id)
    {
        $incident = IncidentReport::with('user')->findOrFail($id);
        return view('admin.incidents.show', compact('incident'));
    }

    // 3. MARK AS UNDER INVESTIGATION
    public function investigate($id)
    {
        $incident = IncidentReport::findOrFail($id);
        
        $incident->update(['status' => 'Under Investigation']);
        
        return redirect('/admin/incidents')->with('success', 'Incident is now marked as Under Investigation.');
    }

    // 4. MARK AS RESOLVED
    public function resolve($id)
    {
        $incident = IncidentReport::findOrFail($id);
        
        $incident->update(['status' => 'Resolved']); 
        
        return redirect('/admin/incidents')->with('success', 'Incident marked as Resolved!');
    }
}