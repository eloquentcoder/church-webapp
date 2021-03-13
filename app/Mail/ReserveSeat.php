<?php

namespace App\Mail;

use App\Event;
use App\Reservation;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ReserveSeat extends Mailable
{
    use Queueable, SerializesModels;

    protected $reservation;
    protected $event;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Reservation $reservation, Event $event)
    {
        $this->reservation = $reservation;
        $this->event = $event;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.event.reserve');
    }
}
