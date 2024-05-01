<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\Branch;
use App\Models\Service;

class DoctorController extends Controller
{
    public function index()
    {
        $doctors = Doctor::all();
        $branches = Branch::all();
        $services = Service::all();
        $appointments = Appointment::all();
        return view('data', compact('doctors','branches','services','appointments'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'branch_id' => 'required|exists:branches,id', // Assuming 'branches' table has 'id' column
        ]);

        Doctor::create([
            'name' => $request->name,
            'branch_id' => $request->branch_id,
        ]);

        return redirect()->route('doctors.index')->with('success', 'Doctor created successfully.');
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'branch_id' => 'required|exists:branches,id',
        ]);

        $doctor = Doctor::findOrFail($id);
        $doctor->update([
            'name' => $request->name,
            'branch_id' => $request->branch_id,
        ]);

        return redirect()->route('doctors.index')->with('success', 'Doctor updated successfully.');
    }
    public function destroy($id)
    {
        $doctor = Doctor::findOrFail($id);
        $doctor->delete();

        return redirect()->route('doctors.index')->with('success', 'Doctor deleted successfully.');
    }
}
