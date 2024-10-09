<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Support\Facades\Storage;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendEmailTamu extends Mailable
{
    use Queueable, SerializesModels;
    public $kedatangan_tamu;
    // public $tamu;
    public $qrCodePath;

    public function __construct($kedatangan_tamu, $qrCodePath)
    {
        $this->kedatangan_tamu = $kedatangan_tamu;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Guest Book SMKN 11 Bandung',
            to: [new Address($this->kedatangan_tamu->tamu->Email, $this->kedatangan_tamu->tamu->Nama)]
        );
    }

    // public function content(): Content
    // {
    //     return new Content(
    //         view: 'pegawai.email.send_email_tamu',
    //     );
    // }


    public function build() {
        return $this->view('pegawai.email.send_email_tamu')
        ->subject('Pemberitahuan Konfirmasi Kunjungan Tamu');
    }

    public function attachments(): array
    {
        if ($this->kedatangan_tamu->Status == 'Diterima' && $this->kedatangan_tamu->QR_code) {
            $fullPath = Storage::disk('public')->path($this->kedatangan_tamu->QR_code);
            if (file_exists($fullPath)) {
                return [
                    Attachment::fromPath($fullPath)
                        ->as('QRCode.png')
                        ->withMime('image/png'),
                ];
            }
        }
            return [];
    }
}
