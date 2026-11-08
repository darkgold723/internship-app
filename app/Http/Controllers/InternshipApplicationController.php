<?php

namespace App\Http\Controllers;

use App\Models\InternshipApplication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InternshipApplicationController extends Controller
{
    public function index()
    {
        // BLOCK ADMIN FROM ACCESSING THE USER PAGE
        if (Auth::user()->role === 'admin') {
            return redirect()->route('admin.applications');
        }

        $applications = Auth::user()->internshipApplications()->latest()->get();
        return view('applications.index', compact('applications'));
    }

    public function create()
    {
        // BLOCK ADMIN FROM CREATING RECORDS
        if (Auth::user()->role === 'admin') {
            return redirect()->route('admin.applications');
        }

        return view('applications.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'company_name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'apply_date' => 'required|date',
            'remarks' => 'nullable|string',
        ]);

        Auth::user()->internshipApplications()->create($data);

        return redirect()->route('applications.index');
    }

    public function edit(InternshipApplication $application)
    {
        abort_if($application->user_id !== Auth::id() || $application->status !== 'pending', 403);
        return view('applications.edit', compact('application'));
    }

    public function update(Request $request, InternshipApplication $application)
    {
        abort_if($application->user_id !== Auth::id() || $application->status !== 'pending', 403);

        $data = $request->validate([
            'company_name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'apply_date' => 'required|date',
            'remarks' => 'nullable|string',
        ]);

        $application->update($data);
        return redirect()->route('applications.index');
    }

    public function destroy(InternshipApplication $application)
    {
        abort_if($application->user_id !== Auth::id() || $application->status !== 'pending', 403);
        $application->delete();
        return redirect()->route('applications.index');
    }
}