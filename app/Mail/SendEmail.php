<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SendEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $kedatangan_tamu;
    // public $tamu;

    public function __construct($kedatangan_tamu, $tamu)
    {
        $this->kedatangan_tamu = $kedatangan_tamu;
        // $this->tamu = $tamu;
    }

    public function build()
    {
        return $this->view('pegawai.email.send_email')
                    ->subject('Pemberitahuan Kedatangan Tamu');
                    
    }
}
