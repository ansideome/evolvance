<?php

namespace App\Http\Controllers;

use App\Models\Bootcamp;
use Illuminate\Http\Request;

class BootcampController extends Controller
{
    public function index(Request $request)
    {
        return response()->json(
            [
                'success' => true,
                'data' => Bootcamp::with('softskills')->get(),
            ]
        );
    }

    public function show($id)
    {
        return response()->json(
            [
                'success' => true,
                'data' => Bootcamp::with('weeks')->find($id),
            ]
        );
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'image' => 'required|string',
            'description' => 'nullable|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'price' => 'required|numeric',
            'kuota' => 'required|integer',
            'tipe_pembelajaran' => 'required|string',
            'bidang_pekerjaan' => 'required|string',
            'softskills' => 'nullable|array',
            'softskills.*' => 'exists:softskills,id',
        ]);

        $bootcamp = Bootcamp::create($request->only([
            'name',
            'image',
            'description',
            'start_date',
            'end_date',
            'price',
            'kuota',
            'tipe_pembelajaran',
            'bidang_pekerjaan'
        ]));

        for ($i = 1; $i <= 8; $i++) {
            $bootcamp->weeks()->create([
                'week_number' => $i,
                'status' => 'belum tersedia',
                'start_date' => null,
                'end_date' => null,
            ]);
        }

        if ($request->has('softskills')) {
            $bootcamp->softskills()->sync($request->softskills);
        }

        return response()->json([
            'message' => 'Bootcamp created with 8 weeks and skills (if provided)',
            'data' => $bootcamp->load(['weeks', 'softskills']),
        ], 201);
    }
}
