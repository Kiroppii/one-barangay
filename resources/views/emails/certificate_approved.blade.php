<!DOCTYPE html>
<html>
<head><title>Certificate Approved</title></head>
<body>
    <h2>Hello!</h2>
    <p>Good news! Your request for a <strong>{{ $certificateRequest->certificate_type }}</strong> has been approved.</p>
    <p>Purpose: {{ $certificateRequest->purpose }}</p>
    <br>
    <p>You may now visit the Barangay Hall to claim your document. Please bring a valid ID.</p>
    <p>Thank you,<br>OneBarangay Administration</p>
</body>
</html>