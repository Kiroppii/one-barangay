<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\CertificateRequest;

class CertificateApprovedMail extends Mailable
{
    use Queueable, SerializesModels;

    public $certificateRequest;

    // Pass the certificate data into the email
    public function __construct(CertificateRequest $certificateRequest)
    {
        $this->certificateRequest = $certificateRequest;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Your Barangay Certificate is Ready for Pickup',
        );
    }

    public function content(): Content
    {
        // This points to the HTML view we will create next
        return new Content(
            view: 'emails.certificate_approved',
        );
    }
}
