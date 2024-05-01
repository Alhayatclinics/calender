<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Branch;
use App\Models\Doctor;
use Illuminate\Http\Request;
use App\Models\Service;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::all();
        $doctors = Doctor::all();
        $branches = Branch::all();
        $appointments = Appointment::all();
        return view('data', compact('services','doctors','branches','appointments'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'doctor_id' => 'required|exists:doctors,id',
            'branch_id' => 'required|exists:branches,id',
            'duration' => 'required',
        ]);

        Service::create([
            'name' => $request->name,
            'doctor_id' => $request->doctor_id,
            'branch_id' => $request->branch_id,
            'duration' => $request->duration,
        ]);

        return redirect()->route('services.index')->with('success', 'Service created successfully.');
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'doctor_id' => 'required|exists:doctors,id',
            'branch_id' => 'required|exists:branches,id',
            'duration' => 'required',

        ]);

        $service = Service::findOrFail($id);
        $service->update([
            'name' => $request->name,
            'doctor_id' => $request->doctor_id,
            'branch_id' => $request->branch_id,
            'duration' => $request->duration,
        ]);

        return redirect()->route('services.index')->with('success', 'Service updated successfully.');
    }
    public function destroy($id)
    {
        $service = Service::findOrFail($id);
        $service->delete();

        return redirect()->route('services.index')->with('success', 'Service deleted successfully.');
    }
}
