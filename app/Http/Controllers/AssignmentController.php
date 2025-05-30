<?php

namespace App\Http\Controllers;

use App\Models\Assignment;
use Illuminate\Http\Request;

class AssignmentController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'week_id' => 'required|exists:weeks,id',
            'description' => 'required|string',
            'due_date' => 'required|date',
        ]);

        $assignment = Assignment::create($request->only(['week_id', 'description', 'due_date']));

        return response()->json(['message' => 'Tugas ditambahkan', 'data' => $assignment]);
    }

    public function update(Request $request, $id)
    {
        $assignment = Assignment::findOrFail($id);

        $request->validate([
            'description' => 'required|string',
            'due_date' => 'required|date',
        ]);

        $assignment->update($request->only(['description', 'due_date']));

        return response()->json(['message' => 'Tugas diupdate', 'data' => $assignment]);
    }
}
