<?php

namespace App\Http\Controllers;

use App\Models\InternshipApplication;
use Illuminate\Http\Request;

class AdminApplicationController extends Controller
{
    // Show PENDING applications
    public function index()
    {
        $applications = InternshipApplication::with('user')->where('status', 'pending')->latest()->get();
        return view('admin.index', compact('applications'));
    }

    // Show APPROVED and REJECTED applications (History)
    public function history()
    {
        $applications = InternshipApplication::with('user')
            ->where('status', '!=', 'pending')
            ->latest('updated_at')
            ->get();
        return view('admin.history', compact('applications'));
    }

    public function approve(InternshipApplication $application)
    {
        $application->update(['status' => 'approved']);
        return back()->with('success', 'Application approved!');
    }

    public function reject(InternshipApplication $application)
    {
        $application->update(['status' => 'rejected']);
        return back()->with('success', 'Application rejected!');
    }
}