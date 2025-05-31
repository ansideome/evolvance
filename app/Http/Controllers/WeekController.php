<?php

namespace App\Http\Controllers;

use App\Models\Week;
use Illuminate\Http\Request;

class WeekController extends Controller
{
    public function updateSchedule(Request $request, $id)
    {
        $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'status' => 'required|in:Belum Tersedia,Dalam Pengerjaan,Selesai,Terlambat',
        ]);

        $week = Week::findOrFail($id);
        $week->update($request->only(['start_date', 'end_date', 'status']));

        return response()->json([
            'success' => true,
            'message' => 'Jadwal minggu berhasil diupdate',
            'data' => $week,
        ]);
    }
}
