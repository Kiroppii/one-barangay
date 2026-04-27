<?php

namespace App\Mail;

use App\Models\IncidentReport;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class IncidentReportMail extends Mailable
{
    use Queueable, SerializesModels;

    public $incident;
    public $user;

    public function __construct(IncidentReport $incident, User $user)
    {
        $this->incident = $incident;
        $this->user = $user;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Incident Report Confirmation - ' . $this->incident->incident_type,
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.incident_reported',
        );
    }
}