<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Branch;
use App\Models\Doctor;
use Illuminate\Http\Request;
use Twilio\Rest\Client;
use App\Models\Registration;
use App\Models\Service;
use Illuminate\Support\Facades\Mail;
use App\Mail\RegistrationStored;
use Illuminate\Support\Facades\Http;



class RegistrationController extends Controller
{
    public function index()
{
    $registrations = Registration::all();
    $branches = Branch::all();
    $appointments = Appointment::all();
    $services = Service::all();
    $doctors = Doctor::all();
    return redirect()->route('appointments.show', [
        'registrations' => $registrations,
        'branches' => $branches,
        'appointments' => $appointments,
        'services' => $services,
        'doctors' => $doctors,
    ]);
}
public function getRegistrationData($id)
{
    $registration = Registration::findOrFail($id); // Fetch registration by ID
}




public function store(Request $request)
{
    // Validate the incoming request data
    $validatedData = $request->validate([
        'phone' => 'required|string',
        'name' => 'required|string',
        'birth_date' => 'required|date',
        'gender' => 'required|string',
        'confirmation' => 'required|string',
        'medical_insurance' => 'required|string',
        'doctor_name' => 'nullable|string',
        'service_name' => 'nullable|string',
        'branch_name' => 'nullable|string',
        'n_insurance' => 'nullable|string',
        'n_id' => 'required|string',
        'price' => 'nullable|numeric',
        'time_from' => 'required|string',
        'time_to' => 'nullable|string',
        'day' => 'required|date',
        'email' => 'required|email',
    ]);

    // Create a new Registration instance
    $registration = Registration::create($validatedData);

    // Send email notification
    try {
        Mail::to($validatedData['email'])->send(new RegistrationStored($registration));
    } catch (\Exception $e) {
        // Handle email sending failure
        return redirect()->back()->with('error', 'Failed to send registration email');
    }

    // Send WhatsApp message using Twilio API
    $sid = env('TWILIO_SID');
    $token = env('TWILIO_TOKEN');
    $twilioNumber = env('TWILIO_NUMBER');
    $recipientNumber = $validatedData['phone'];

    try {
        $twilio = new Client($sid, $token);
        $message = $twilio->messages
            ->create("whatsapp:$recipientNumber", // to
                [
                    "from" => "whatsapp:$twilioNumber", // from
                    "body" => "تتتشستيتشس." // Message body
                ]
            );

        // Message sent successfully
        return redirect()->route('registrations.index')->with('success', 'Registration stored successfully and WhatsApp message sent');
    } catch (\Exception $e) {
        dd($e);
        // Handle Twilio message sending failure
        return redirect()->route('registrations.index')->with('error', 'Failed to send WhatsApp message: ' . $e->getMessage());
    }
}

    public function update(Request $request, $id)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'phone' => 'sometimes|string',
            'name' => 'sometimes|string',
            'birth_date' => 'sometimes|date',
            'gender' => 'sometimes|string',
            'medical_insurance' => 'sometimes|string',
            'n_insurance' => 'sometimes|string',
            'n_id' => 'sometimes|string',
            'price' => 'sometimes|numeric',
            'time' => 'sometimes|string',
            'day' => 'sometimes|date',
        ]);

        // Find the registration by ID
        $registration = Registration::findOrFail($id);

        // Update the registration with the validated data
        $registration->update($validatedData);

        // Redirect to the 'registrations.index' view with a success message
        return redirect()->route('registrations.index')->with('success', 'Registration updated successfully');
    }
    public function destroy($id)
    {
        // Find the registration by ID
        $registration = Registration::findOrFail($id);

        // Delete the registration
        $registration->delete();

        // Redirect to the 'registrations.index' view with a success message
        return redirect()->route('registrations.index')->with('success', 'Registration deleted successfully');
    }
}
