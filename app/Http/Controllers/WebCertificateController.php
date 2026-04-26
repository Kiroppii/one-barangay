<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CertificateRequest; // CHANGED THIS LINE
use Illuminate\Support\Facades\Auth;

class WebCertificateController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'document_type' => 'required|string',
            'purpose' => 'required|string',
        ]);

        CertificateRequest::create([
            'user_id' => Auth::id(),
            'certificate_type' => $request->document_type, // <--- Connect the form data to the correct DB column
            'purpose' => $request->purpose,
            'status' => 'Pending' 
        ]);

        return redirect('/certificates')->with('success', 'Your document request has been submitted successfully!');
    }

    public function index()
    {
        // 1. Fetch requests for the logged-in user, newest first
        $certificates = CertificateRequest::where('user_id', Auth::id())
                                          ->orderBy('created_at', 'desc')
                                          ->get();

        // 2. Send that data into the Blade view
        return view('certificates.index', compact('certificates'));
    }
}