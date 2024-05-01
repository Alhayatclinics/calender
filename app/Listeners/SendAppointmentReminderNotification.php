<?php

namespace App\Listeners;

use App\Events\SendAppointmentRemindersEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;
use App\Mail\AppointmentReminderMail;

class SendAppointmentReminderNotification implements ShouldQueue
{
    public function handle(SendAppointmentRemindersEvent $event)
    {
        // Retrieve appointment data from the event
        $appointment = $event->appointment;

        // Customize email content
        $mailData = [
            'name' => $appointment->name,
            'email' => $appointment->email,
            'subject' => 'نود ان نذكرك ان معادك متبقي عليه 3 ساعات',
        ];

        // Send email using Mail facade
        Mail::to($mailData['email'])->send(new AppointmentReminderMail($mailData['name'], $mailData['subject']));
    }
}
