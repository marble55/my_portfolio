<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ContactMessageMail extends Mailable
{
    use Queueable, SerializesModels;

    private $name;
    private $email;
    private $messageText;

    /**
     * Create a new message instance.
     */
    public function __construct(array $values)
    {
        $this->name = $values['name'];
        $this->email = $values['email'];
        $this->messageText = $values['message'];
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'New Message From Portfolio',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        // dd($this->messageText);

        return new Content(
            view: 'mail.contact-message',
            with: [
                'name' => $this->name,
                'email' => $this->email,
                'messageText'=> $this->messageText,
            ],
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
