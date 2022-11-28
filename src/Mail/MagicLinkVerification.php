<?php

namespace BradyRenting\FilamentPasswordless\Mail;

use BradyRenting\FilamentPasswordless\MagicLink;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;

class MagicLinkVerification extends Mailable implements ShouldQueue
{
    use Queueable;

    public function __construct(public string $email, public MagicLink $magicLink)
    {
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Login verification',
        );
    }

    public function content(): Content
    {
        return new Content(
            markdown: 'filament-passwordless::emails.magic-link.verification',
            with: [
                'email' => $this->email,
                'url' => $this->magicLink->getUrl(),
                'expiry' => $this->magicLink->getExpiry(),
            ],
        );
    }
}
