<!DOCTYPE html>
<html>
<head>
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; background-color: #f4f4f5; padding: 20px; }
        .container { max-width: 600px; margin: 0 auto; background: #ffffff; padding: 30px; border-radius: 8px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); }
        .header { text-align: center; border-bottom: 2px solid #3b82f6; padding-bottom: 20px; margin-bottom: 20px; }
        .header h1 { color: #1e3a8a; margin: 0; }
        .password-box { background-color: #f8fafc; border: 1px solid #cbd5e1; padding: 15px; text-align: center; font-size: 20px; font-weight: bold; letter-spacing: 2px; color: #0f172a; border-radius: 6px; margin: 20px 0; }
        .footer { text-align: center; font-size: 12px; color: #64748b; margin-top: 30px; border-top: 1px solid #e2e8f0; padding-top: 20px; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>One Barangay</h1>
        </div>
        
        <p>Hello <strong>{{ $user->name }}</strong>,</p>
        <p>Your barangay portal account has been officially created by the administration. You can now log in to request certificates, report incidents, and view community events online.</p>
        
        <p>Please use the following temporary password to access your account. We highly recommend changing this password immediately after your first login.</p>
        
        <div class="password-box">
            {{ $temporaryPassword }}
        </div>

        <p>You can log in here: <a href="{{ url('/login') }}">{{ url('/login') }}</a></p>
        
        <p>Best regards,<br>The Barangay Administration</p>

        <div class="footer">
            This is an automated message. Please do not reply to this email.
        </div>
    </div>
</body>
</html>