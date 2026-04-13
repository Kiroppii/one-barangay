<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\CertificateRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\CertificateApprovedMail;

class CertificateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // For now, we fetch all. In Phase 7, we will filter this by logged-in user.
        $requests = CertificateRequest::with('user.profile')->get();
        return response()->json($requests);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // 1. Validation: Ensure the data sent is correct
        $validatedData = $request->validate([
            'user_id' => 'required|exists:users,id',
            'certificate_type' => 'required|string|max:255',
            'purpose' => 'required|string',
        ]);

        // 2. Database Insertion
        $certificateRequest = CertificateRequest::create([
            'user_id' => $validatedData['user_id'],
            'certificate_type' => $validatedData['certificate_type'],
            'purpose' => $validatedData['purpose'],
            'status' => 'Pending', // Default status
        ]);

        // 3. Return JSON Response
        return response()->json([
            'message' => 'Certificate request submitted successfully!',
            'data' => $certificateRequest
        ], 201); // 201 means "Created"
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

    public function approve($id)
    {
        // 1. Find the request
        $certificateRequest = CertificateRequest::with('user')->findOrFail($id);

        // Optional Security: Check if user is admin (Assuming Auth::user()->role === 'admin')
        
        // 2. Update the Database
        $certificateRequest->status = 'Approved';
        $certificateRequest->save();

        // 3. INTEGRATION POINT: Trigger the automated email
        // We send it to the email address of the user who requested it
        Mail::to($certificateRequest->user->email)->send(new CertificateApprovedMail($certificateRequest));

        return response()->json([
            'message' => 'Workflow Complete: Certificate approved and resident notified successfully.',
            'data' => $certificateRequest
        ]);
    }
}
