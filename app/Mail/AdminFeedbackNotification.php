<?php

namespace App\Mail;

use App\Models\Feedback;
use App\Models\Review;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class AdminFeedbackNotification extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public function __construct(
        public Feedback $feedback,
        public ?Review $review = null
    ) {}

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Laporan Keluhan & Ulasan Pasien Baru - ' . $this->feedback->unit,
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.admin_notification', 
        );
    }
}