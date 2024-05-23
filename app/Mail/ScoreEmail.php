<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ScoreEmail extends Mailable
{
    use Queueable, SerializesModels;

    public function index()
    {
        return view('admin.email.index');
    }

   

    public $userName;
    public $score;
    public $status;

    /**
     * Create a new message instance.
     *
     * @param string $userName
     * @param int $score
     * @param string $status
     */
    // public function __construct($userName, $score, $status)
    // {
    //     $this->userName = $userName;
    //     $this->score = $score;
    //     $this->status = $status;
    // }

    // /**
    //  * Build the message.
    //  *
    //  * @return $this
    //  */
    // public function build()
    // {
    //     return $this->view('email.scor')
    //         ->subject('Score Email')
    //         ->with([
    //             'userName' => $this->userName,
    //             'score' => $this->score,
    //             'status' => $this->status,
    //         ]);
    // }
   
    


    
    /**
     * Get the message envelope.
     */
    // public function envelope(): Envelope
    // {
    //     return new Envelope(
    //         subject: 'Score Email',
    //     );
    // }

    /**
     * Get the message content definition.
     */
    // public function content(): Content
    // {
    //     return new Content(
    //         view: 'view.name',
    //     );
    // }

    // /**
    //  * Get the attachments for the message.
    //  *
    //  * @return array<int, \Illuminate\Mail\Mailables\Attachment>
    //  */
    // public function attachments(): array
    // {
    //     return [];
    // }
}
