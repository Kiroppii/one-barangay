<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\CertificateRequest;

class WebDashboardController extends Controller
{
   public function index()
    {
        if (Auth::user()->role === 'admin') {
            return redirect()->route('admin.dashboard');
        }

        $userId = Auth::id();

        $totalRequests = CertificateRequest::where('user_id', $userId)->count();
        $pendingRequests = CertificateRequest::where('user_id', $userId)->where('status', 'Pending')->count();
        $approvedRequests = CertificateRequest::where('user_id', $userId)->where('status', 'Approved')->count();

        $recentCertificates = CertificateRequest::where('user_id', $userId)
                                              ->orderBy('created_at', 'desc')
                                              ->take(5)
                                              ->get();

        // NEW: Fetch upcoming community events!
        $upcomingEvents = \App\Models\CommunityEvent::orderBy('event_date', 'asc')->get();

        return view('dashboard', compact(
            'totalRequests', 'pendingRequests', 'approvedRequests', 'recentCertificates', 'upcomingEvents'
        ));
    }
}