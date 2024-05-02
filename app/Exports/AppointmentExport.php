<?php

namespace App\Exports;

use App\Models\Appointment;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Collection;

class AppointmentExport implements FromCollection
{
    public function collection()
    {
        // Fetch data to export (adjust according to your model structure)
        $appointments = Appointment::all();

        // Transform data into a suitable format (e.g., array)
        $data = [];
        foreach ($appointments as $appointment) {
            $data[] = [
                'Day' => $appointment->day,
                'Date' => $appointment->date,
                'Time' => $appointment->time,
                'Name' => $appointment->name,
                // Add more fields as needed
            ];
        }

        // Create a new Collection instance from the transformed data
        return new Collection($data);
    }
}
