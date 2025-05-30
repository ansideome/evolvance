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
                'data' => Bootcamp::get(),
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
            'description' => 'nullable|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'price' => 'required|numeric',
            'kuota' => 'required|integer',
            'tipe_pembelajaran' => 'required|string',
            'bidang_pekerjaan' => 'required|string',
        ]);

        $bootcamp = Bootcamp::create($request->all());

        for ($i = 1; $i <= 8; $i++) {
            $bootcamp->weeks()->create([
                'week_number' => $i,
                'status' => 'belum tersedia',
                'start_date' => null,
                'end_date' => null,
            ]);
        }

        return response()->json([
            'message' => 'Bootcamp created with 8 weeks',
            'data' => $bootcamp->load('weeks'),
        ], 201);
    }
}
