<?php

namespace App\Mail;

use App\Models\Utilisateur;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use League\Config\ReadOnlyConfiguration;

class usermail extends Mailable
{

    private $name;
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public function __construct(private readonly Utilisateur $user)
    {
        //

    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Usermail',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        $date=$this->user->created_at;
        $id=$this->user->id;
        $href=url('').'/verify_email/'.base64_encode($date. '*'.$id);
        return new Content(
            view: 'emails.register',
            with:[
                'name'=>$this->user->nom_complet,
                'lien'=>$href,
            ]
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
