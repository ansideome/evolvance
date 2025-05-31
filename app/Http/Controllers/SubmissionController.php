<?php

namespace App\Http\Controllers;

use App\Models\Submission;
use App\Services\WeekStatusUpdater;
use Illuminate\Http\Request;

class SubmissionController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'assignment_id' => 'required|exists:assignments,id',
            'file' => 'required|file|mimes:pdf|max:2048',
        ]);

        $path = $request->file('file')->store('submissions', 'public');

        $submission = Submission::create([
            'assignment_id' => $request->assignment_id,
            'user_id' => auth()->id(),
            'file_path' => $path,
            'submitted_at' => now(),
        ]);

        $assignment = $submission->assignment;
        $week = $assignment->week;
        WeekStatusUpdater::update($week, auth()->id());

        return response()->json(['message' => 'Tugas berhasil dikumpulkan', 'data' => $submission]);
    }

    public function index($assignment_id)
    {
        $submissions = Submission::where('assignment_id', $assignment_id)->with('user')->get();
        return response()->json($submissions);
    }
}
