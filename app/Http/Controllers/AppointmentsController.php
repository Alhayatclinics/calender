<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Models\Doctor;
<<<<<<< HEAD
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\AppointmentsExport;
=======
>>>>>>> origin/main
use App\Models\Service;
use App\Models\Branch;
use App\Models\Registration;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Validator;


class AppointmentsController extends Controller
{
    public function index()
    {
        $appointments = Appointment::all();
        $doctors = Doctor::all();
        $services = Service::all();
        $branches = Branch::all();
        return view('data', compact('appointments','doctors','services','branches'));
    }
<<<<<<< HEAD
    public function show(Request $request)
{
    $query = Appointment::query();

    // Filter by date range
    if ($request->filled('from_date') && $request->filled('to_date')) {
        $query->whereBetween('date', [$request->input('from_date'), $request->input('to_date')]);
    }

    // Search by branch_id, doctor_id, or service_id
    if ($request->filled('branch_id')) {
        $query->where('branch_id', $request->input('branch_id'));
    }
    if ($request->filled('doctor_id')) {
        $query->where('doctor_id', $request->input('doctor_id'));
    }
    if ($request->filled('service_id')) {
        $query->where('service_id', $request->input('service_id'));
    }

    $appointments = $query->get();

    // Transform appointments into structured format with time_data and appointment_id
    $daysWithData = $appointments->groupBy(function ($appointment) {
        return $appointment->date->format('Y-m-d');
    })->map(function ($appointments, $date) {
        return [
            'date' => $date,
            'dayOfWeek' => Carbon::parse($date)->translatedFormat('l'),
            'appointments' => $appointments->map(function ($appointment) {
                $timeData = json_decode($appointment->time_data, true);
                // Add appointment_id to each time_data entry
                $timeDataWithId = collect($timeData)->map(function ($interval) use ($appointment) {
                    return [
                        'from' => $interval['from'],
                        'to' => $interval['to'],
                        'appointment_id' => $appointment->id, // Add appointment_id
                    ];
                })->all();

                return [
                    'id' => $appointment->id,
                    'time_data' => $timeDataWithId, // Updated time_data with appointment_id
                ];
            }),
        ];
    })->sortBy('date')->values(); // Sort days by date in ascending order


    $registraionwait = Registration::where('active', 0)->get();
    $doctors = Doctor::all();
    $services = Service::all();
    $branches = Branch::all();
    return view('calender', compact('daysWithData', 'doctors', 'services', 'branches', 'registraionwait'));
}

    public function exportAppointments(Request $request)
    {
        // Fetch data based on request parameters
        $query = Appointment::query();

        // Apply filters based on request input
        if ($request->filled('from_date') && $request->filled('to_date')) {
            $query->whereBetween('date', [$request->input('from_date'), $request->input('to_date')]);
        }
=======

    public function show(Request $request)
    {
        $query = Appointment::query();

        // Filter by date range
        if ($request->filled('from_date') && $request->filled('to_date')) {
            $query->whereBetween('date', [$request->input('from_date'), $request->input('to_date')]);
        }

        // Search by branch_id, doctor_id, or service_id
>>>>>>> origin/main
        if ($request->filled('branch_id')) {
            $query->where('branch_id', $request->input('branch_id'));
        }
        if ($request->filled('doctor_id')) {
            $query->where('doctor_id', $request->input('doctor_id'));
        }
        if ($request->filled('service_id')) {
            $query->where('service_id', $request->input('service_id'));
        }

<<<<<<< HEAD
        // Retrieve appointments data based on filtered query
        $appointments = $query->get();

        // Prepare daysWithData with structured format
=======
        $appointments = $query->get();

        // Transform appointments into structured format with time_data and appointment_id
>>>>>>> origin/main
        $daysWithData = $appointments->groupBy(function ($appointment) {
            return $appointment->date->format('Y-m-d');
        })->map(function ($appointments, $date) {
            return [
                'date' => $date,
<<<<<<< HEAD
                'dayOfWeek' => $appointments->first()->date->translatedFormat('l'),
                'appointments' => $appointments->map(function ($appointment) {
                    $timeData = json_decode($appointment->time_data, true);
=======
                'dayOfWeek' => Carbon::parse($date)->translatedFormat('l'),
                'appointments' => $appointments->map(function ($appointment) {
                    $timeData = json_decode($appointment->time_data, true);
                    // Add appointment_id to each time_data entry
>>>>>>> origin/main
                    $timeDataWithId = collect($timeData)->map(function ($interval) use ($appointment) {
                        return [
                            'from' => $interval['from'],
                            'to' => $interval['to'],
<<<<<<< HEAD
                            'appointment_id' => $appointment->id,
=======
                            'appointment_id' => $appointment->id, // Add appointment_id
>>>>>>> origin/main
                        ];
                    })->all();

                    return [
                        'id' => $appointment->id,
<<<<<<< HEAD
                        'time_data' => $timeDataWithId,
                    ];
                }),
            ];
        })->sortBy('date')->values();

        // Gather unique 'from' and 'to' times across all appointments
        $uniqueTimes = [];
        foreach ($daysWithData as $dayData) {
            foreach ($dayData['appointments'] as $appointment) {
                if (isset($appointment['time_data'])) {
                    foreach ($appointment['time_data'] as $interval) {
                        $uniqueTimes[$interval['from']] = $interval['from'];
                        $uniqueTimes[$interval['to']] = $interval['to'];
                    }
                }
            }
        }
        asort($uniqueTimes); // Sort unique times in ascending order

        // Pass data to the export class
        $data = [
            'daysWithData' => $daysWithData,
            'uniqueTimes' => $uniqueTimes,
        ];

        // Determine action based on the form submission
        if ($request->input('action') === 'export') {
            // Trigger the export and download the Excel file
            return Excel::download(new AppointmentsExport($data), 'appointments.xlsx');
        } else {
            // Otherwise, return the view with the data for calendar display
            $registraionwait = Registration::where('active', 0)->get();
            $doctors = Doctor::all();
            $services = Service::all();
            $branches = Branch::all();
            $registration = Registration::first(); // Adjust this based on your logic to retrieve registration data

            return view('calender', compact('daysWithData', 'doctors', 'services', 'branches', 'registration','registraionwait'));
        }
    }
        public function store(Request $request)
=======
                        'time_data' => $timeDataWithId, // Updated time_data with appointment_id
                    ];
                }),
            ];
        })->sortBy('date')->values(); // Sort days by date in ascending order

        // Search by confirmation in registration table
        $registration = Registration::query();
        if ($request->filled('confirmation')) {
            $registration->where('confirmation', $request->input('confirmation'));
        }
        $registration = $registration->first();

        $doctors = Doctor::all();
        $services = Service::all();
        $branches = Branch::all();
        return view('calender', compact('daysWithData', 'doctors', 'services', 'branches', 'registration'));
    }




    /**
     * Store a newly created appointment in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
>>>>>>> origin/main
    {
        // Validate incoming request data
        $validator = Validator::make($request->all(), [
            'doctor_id' => 'required|exists:doctors,id',
            'service_id' => 'required|exists:services,id',
            'branch_id' => 'required|exists:branches,id',
            'date' => 'required|date',
            'from_hour' => 'required|date_format:H:i',
            'to_hour' => 'required|date_format:H:i|after:from_hour',
        ]);

        // Check if validation fails
        if ($validator->fails()) {
            return redirect()
                ->route('appointments.index')
                ->withErrors($validator)
                ->withInput();
        }

        // Retrieve service information including duration
        $service = Service::findOrFail($request->service_id);
        $duration = $service->duration; // Assuming 'duration' is a field in the 'services' table

        $timeData = [];

        // Parse hours and duration
        $fromHour = \Carbon\Carbon::parse($request->from_hour);
        $toHour = \Carbon\Carbon::parse($request->to_hour);

        // Generate time intervals based on duration
        while ($fromHour->lt($toHour)) {
            $startTime = $fromHour->format('H:i');
            $endTime = $fromHour->addMinutes($duration)->format('H:i');
            $timeData[] = ['from' => $startTime, 'to' => $endTime];
        }

        // Convert $timeData array to JSON format
        $timeDataJson = json_encode($timeData);
        // Create Appointment instance and store in database
        $appointment = Appointment::create([
            'doctor_id' => $request->doctor_id,
            'service_id' => $request->service_id,
            'branch_id' => $request->branch_id,
            'date' => $request->date,
            'from_hour' => $request->from_hour,
            'to_hour' => $request->to_hour,
            'time_data' => $timeDataJson, // Assign time_data as JSON
        ]);

        // Redirect with success message
        return redirect()->route('appointments.index')->with('success', 'Appointment created successfully.');
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'doctor_id' => 'required|exists:doctors,id',
            'service_id' => 'required|exists:services,id',
            'branch_id' => 'required|exists:branches,id',
            'date' => 'required|date',
            'from_hour' => 'required',
            'to_hour' => 'required',
        ]);

        $appointment = Appointment::findOrFail($id);

        // Get the service associated with the selected service_id
        $service = Service::findOrFail($request->service_id);

        // Calculate the duration from the service
        $duration = $service->duration;

        // Parse hours and duration
        $fromHour = \Carbon\Carbon::parse($request->from_hour);
        $toHour = \Carbon\Carbon::parse($request->to_hour);

        $timeData = [];

        // Generate time intervals based on duration
        while ($fromHour->lt($toHour)) {
            $startTime = $fromHour->format('H:i');
            $endTime = $fromHour->addMinutes($duration)->format('H:i');
            $timeData[] = ['from' => $startTime, 'to' => $endTime];
        }

        // Convert $timeData array to JSON format
        $timeDataJson = json_encode($timeData);

        // Update the appointment attributes
        $appointment->update([
            'doctor_id' => $request->doctor_id,
            'service_id' => $request->service_id,
            'branch_id' => $request->branch_id,
            'date' => $request->date,
            'from_hour' => $request->from_hour,
            'to_hour' => $request->to_hour,
            'duration' => $duration, // Update with the calculated duration
            'time_data' => $timeDataJson, // Update time_data with new JSON structure
        ]);

        // Redirect with success message
        return redirect()->route('appointments.index')->with('success', 'Appointment updated successfully.');
    }

    public function destroy($id)
    {
        $appointment = Appointment::findOrFail($id);
        $appointment->delete();

        return redirect()->route('appointments.index')->with('success', 'Appointment deleted successfully.');
    }
}
