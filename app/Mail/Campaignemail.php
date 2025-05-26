<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\CampaignContact;
use App\Models\Campaign;
class Campaignemail  extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;
//    public $contact;
//    public $campaign;

    /**
     * Create a new message instance.
     */
    public function __construct(public $contact ,public $campaign)
    {
        $contact=$contact;
        $campaign=$campaign;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Campaign Email',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.check',
        );
    }


    



     public function build()
    {
        //       \Log::info('Campaignemail build() called');
        // return $this->subject($campaign->subject)
        //     ->markdown('emails.campaign')
        //     ->with([
        //         'name' => $contact->name,
        //         'messageBody' => $campaign->message,
        //     ]);
    }




}
