<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;
use App\Models\Branch; // Make sure to import the Branch model
use App\Models\Doctor;
use App\Models\Service;


class BranchController extends Controller
{
    /**
     * Display a listing of the branches.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $branches = Branch::all();
        $doctors = Doctor::all();
        $services = Service::all();
        $appointments = Appointment::all();
        return view('data', compact('branches','doctors','services','appointments'));
    }

    /**
     * Store a newly created branch in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:branches|max:255',
        ]);

        Branch::create([
            'name' => $request->name,
        ]);

        return redirect()->route('branches.index')->with('success', 'Branch created successfully.');
    }

    /**
     * Update the specified branch in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $branch = Branch::findOrFail($id); // Find the branch by ID

        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $branch->update([
            'name' => $request->name,
        ]);

        return redirect()->route('branches.index')->with('success', 'Branch updated successfully.');
    }


    /**
     * Remove the specified branch from storage.
     *
     * @param  \App\Models\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function destroy(Branch $branch)
    {
        $branch->delete();
        return redirect()->route('branches.index')->with('success', 'Branch deleted successfully.');
    }
}
