<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CertificateRequest;
use Illuminate\Support\Facades\Mail;
use App\Mail\CertificateApprovedMail;

class AdminCertificateController extends Controller
{
    // 1. DYNAMIC INDEX (Handles Search, Filter, and Export)
    // 1. DYNAMIC INDEX (Handles Search, Filter, and Export)
    public function index(Request $request)
    {
        $query = CertificateRequest::with('user')->orderBy('created_at', 'desc');

        // Handle Search
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('certificate_type', 'LIKE', "%{$search}%")
                  ->orWhereHas('user', function($userQuery) use ($search) {
                      $userQuery->where('name', 'LIKE', "%{$search}%");
                  });
            });
        }

        // Handle Status Filter
        if ($request->filled('status') && $request->status !== 'All Statuses') {
            $query->where('status', $request->status);
        }

        // THE FIX: Use streamDownload for reliable CSV extraction
        if ($request->has('export')) {
            $certificates = $query->get();
            
            return response()->streamDownload(function () use ($certificates) {
                $file = fopen('php://output', 'w');
                
                // Add CSV Headers
                fputcsv($file, ['Request ID', 'Resident Name', 'Document Type', 'Purpose', 'Status', 'Date Filed']);
                
                // Add Row Data
                foreach ($certificates as $cert) {
                    fputcsv($file, [
                        '#REQ-' . $cert->id,
                        $cert->user ? $cert->user->name : 'Unknown User', // Added fallback just in case!
                        $cert->certificate_type,
                        $cert->purpose,
                        $cert->status,
                        $cert->created_at->format('Y-m-d h:i A')
                    ]);
                }
                fclose($file);
            }, "certificates_export_" . date('Y-m-d') . ".csv");
        }

        $certificates = $query->get();
        return view('admin.certificates.index', compact('certificates'));
    }

    // 2. CSV EXPORT HELPER
    private function exportCSV($certificates)
    {
        $filename = "certificates_export_" . date('Y-m-d') . ".csv";
        $headers = [
            "Content-type"        => "text/csv",
            "Content-Disposition" => "attachment; filename=$filename",
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
            "Expires"             => "0"
        ];

        $callback = function() use($certificates) {
            $file = fopen('php://output', 'w');
            fputcsv($file, ['Request ID', 'Resident Name', 'Document Type', 'Purpose', 'Status', 'Date Filed']); // Header Row

            foreach ($certificates as $cert) {
                fputcsv($file, [
                    '#REQ-' . $cert->id,
                    $cert->user->name,
                    $cert->certificate_type,
                    $cert->purpose,
                    $cert->status,
                    $cert->created_at->format('Y-m-d h:i A')
                ]);
            }
            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }

    // 3. SHOW DETAILS PAGE
    public function show($id)
    {
        $certificate = CertificateRequest::with('user')->findOrFail($id);
        return view('admin.certificates.show', compact('certificate'));
    }

    // 4. APPROVE ACTION
    public function approve($id)
    {
        $certificate = CertificateRequest::with('user')->findOrFail($id);
        $certificate->update(['status' => 'Approved']);
        Mail::to($certificate->user->email)->send(new CertificateApprovedMail($certificate));
        
        return redirect('/admin/certificates')->with('success', 'Certificate approved and resident notified!');
    }

    // 5. REJECT ACTION
    // 5. REJECT ACTION
    public function reject($id)
    {
        $certificate = CertificateRequest::with('user')->findOrFail($id);
        
        // Change 'Declined' to 'Rejected' to match your database Enum exactly
        $certificate->update(['status' => 'Rejected']); 
        
        return redirect('/admin/certificates')->with('error', 'The certificate request was rejected.');
    }
}