<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class IdeeEnvoyee extends Mailable
{
    use Queueable, SerializesModels;
public $idee;
    
        public function __construct($idee)
        {
            $this->idee = $idee;
        }
    
        public function envelope(): Envelope
        {
            return new Envelope(
                subject: 'Votre idée a été envoyée',
            );
        }
    
        public function content(): Content
        {
            return new Content(
                view: 'emails.idee_envoyee',
            );
        }
    
        public function attachments(): array
        {
            return [];
        }
    }