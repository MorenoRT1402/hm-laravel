<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class BookingEmail extends Mailable
{
    use Queueable, SerializesModels;

    public string $guest;
    public object $room;
    public string $check_in;
    public string $check_out;
    public float $price;
    public ?string $notes;
    public ?string $picture;
    public string $order_date;

    /**
     * Initialize a new BookingEmail instance.
     */
    public function __construct(
        string $guest,
        object $room,
        string $check_in,
        string $check_out,
        float $price,
        ?string $notes,
        ?string $picture,
        string $order_date
    ) {
        $this->guest = $guest;
        $this->room = $room;
        $this->check_in = $check_in;
        $this->check_out = $check_out;
        $this->price = $price;
        $this->notes = $notes;
        $this->picture = $picture;
        $this->order_date = $order_date;
    }

    /**
     * Define the email envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Booking Confirmation Details',
        );
    }

    /**
     * Define the email content.
     */
    public function content(): Content
    {
        return new Content(
            view: 'mail.booking-email',
            with: [
                'guest' => $this->guest,
                'room' => $this->room,
                'check_in' => $this->check_in,
                'check_out' => $this->check_out,
                'price' => $this->price,
                'notes' => $this->notes,
                'picture' => $this->picture,
                'order_date' => $this->order_date,
            ]
        );
    }

    /**
     * Define attachments for the email (if any).
     */
    public function attachments(): array
    {
        return [];
    }
}
