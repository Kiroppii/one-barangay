<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CertificateRequest;
use App\Models\User;

class AdminDashboardController extends Controller
{
    public function index()
    {
        // 1. Calculate Barangay-Wide Stats
        $totalResidents = User::where('role', 'resident')->count();
        $pendingRequests = CertificateRequest::where('status', 'Pending')->count();
        $approvedRequests = CertificateRequest::where('status', 'Approved')->count();

        // 2. Fetch the 5 most recent requests from ANY resident
        $recentRequests = CertificateRequest::with('user')
                                          ->orderBy('created_at', 'desc')
                                          ->take(5)
                                          ->get();

        // 3. Send to the Admin Dashboard view
        return view('admin.dashboard', compact(
            'totalResidents',
            'pendingRequests',
            'approvedRequests',
            'recentRequests'
        ));
    }
}