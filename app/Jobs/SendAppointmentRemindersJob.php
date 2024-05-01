<?php

namespace App\Jobs;

use App\Models\Appointment;
use App\Events\SendAppointmentRemindersEvent;
use App\Models\Registration;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SendAppointmentRemindersJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function handle()
    {
        // Calculate the time threshold for sending reminders (2 minutes before appointment time)
        $reminderTime = now()->addMinutes(2);

        // Retrieve appointments that require reminders
        $appointments = Registration::where('day', '>=', now())
            ->where('time_from', '<=', $reminderTime->addHours(3)) // Only consider appointments within the next 3 hours
            ->get();

        // Process each appointment to send reminders
        foreach ($appointments as $appointment) {
            // Calculate the appointment datetime
            $appointmentDateTime = Carbon::parse($appointment->date . ' ' . $appointment->from_hour);

            // Check if it's time to send the reminder (2 minutes before the appointment)
            if ($appointmentDateTime->subMinutes(2)->equalTo($reminderTime)) {
                // Dispatch the SendAppointmentRemindersEvent for this appointment
                SendAppointmentRemindersEvent::dispatch($appointment);
            }
        }
    }
}
