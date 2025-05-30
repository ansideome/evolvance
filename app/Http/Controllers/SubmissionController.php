<?php

namespace App\Http\Controllers;

use App\Models\Submission;
use Illuminate\Http\Request;

class SubmissionController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'assignment_id' => 'required|exists:assignments,id',
            'user_id' => 'required|exists:users,id',
            'file' => 'required|file|mimes:pdf|max:2048',
        ]);

        $path = $request->file('file')->store('submissions', 'public');

        $submission = Submission::create([
            'assignment_id' => $request->assignment_id,
            'user_id' => $request->user_id,
            'file_path' => $path,
            'submitted_at' => now(),
        ]);

        return response()->json(['message' => 'Tugas berhasil dikumpulkan', 'data' => $submission]);
    }

    public function index($assignment_id)
    {
        $submissions = Submission::where('assignment_id', $assignment_id)->with('user')->get();
        return response()->json($submissions);
    }
}
