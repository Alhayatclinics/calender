<?php

namespace App\Events;

use App\Models\Registration;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class SendAppointmentRemindersEvent
{
    use Dispatchable, SerializesModels;

    public $appointment;

    public function __construct(Registration $appointment)
    {
        $this->appointment = $appointment;
    }
}
