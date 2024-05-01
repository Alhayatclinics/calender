<?php
// File: app\Mail\AppointmentReminderMail.php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AppointmentReminderMail extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public $body;

    public function __construct($name, $body)
    {
        $this->name = $name;
        $this->body = $body;
    }

    public function build()
    {
        return $this->view('emails.appointment_reminder');
    }
}
