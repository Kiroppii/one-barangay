<!DOCTYPE html>
<html>
<head>
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; background-color: #f4f4f5; padding: 20px; }
        .container { max-width: 600px; margin: 0 auto; background: #ffffff; padding: 30px; border-radius: 8px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); }
        .header { text-align: center; border-bottom: 2px solid #ef4444; padding-bottom: 20px; margin-bottom: 20px; }
        .header h1 { color: #b91c1c; margin: 0; }
        .details-box { background-color: #f8fafc; border: 1px solid #cbd5e1; padding: 15px; border-radius: 6px; margin: 20px 0; }
        .footer { text-align: center; font-size: 12px; color: #64748b; margin-top: 30px; border-top: 1px solid #e2e8f0; padding-top: 20px; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Incident Report Received</h1>
        </div>
        
        <p>Hello <strong>{{ $user->name }}</strong>,</p>
        <p>This is an automated confirmation that your incident report has been successfully filed in the One Barangay system.</p>
        
        <div class="details-box">
            <p><strong>Report ID:</strong> #{{ str_pad($incident->id, 5, '0', STR_PAD_LEFT) }}</p>
            <p><strong>Incident Type:</strong> {{ $incident->incident_type }}</p>
            <p><strong>Location:</strong> {{ $incident->location }}</p>
            <p><strong>Date Filed:</strong> {{ $incident->created_at->format('F j, Y, g:i a') }}</p>
            <p><strong>Status:</strong> <span style="color: #d97706; font-weight: bold;">Pending Review</span></p>
        </div>

        <p>Our barangay officials will review the details shortly. You can track the status of this report from your Resident Dashboard.</p>
        
        <p>Stay safe,<br>The Barangay Administration</p>

        <div class="footer">
            This is an automated message. Please do not reply to this email.
        </div>
    </div>
</body>
</html>