<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Registration;

class RegistrationStored extends Mailable
{
    use Queueable, SerializesModels;

    public $registration;

    /**
     * Create a new message instance.
     *
     * @param  Registration  $registration
     * @return void
     */
    public function __construct(Registration $registration)
    {
        $this->registration = $registration;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Registration Confirmation')
                    ->view('emails.registration_stored')
                    ->with([
                        'name' => $this->registration->name,
                        'doctor_name' => $this->registration->doctor_name,
                        'service_name' => $this->registration->service_name,
                        'branch_name' => $this->registration->branch_name,
                        'email' => $this->registration->email,
                        'day' => $this->registration->day,
                        'time_from' => $this->registration->time_from,
                        // Add more data as needed for the email view
                    ]);
    }
}
