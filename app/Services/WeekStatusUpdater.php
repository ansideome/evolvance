<?php

namespace App\Services;

use App\Models\Submission;
use App\Models\Week;
use Carbon\Carbon;

class WeekStatusUpdater
{
    public static function update(Week $week, $userId = null)
    {
        $today = Carbon::today();

        if ($today->lt($week->start_date)) {
            $week->status = 'belum tersedia';
        } elseif ($today->between($week->start_date, $week->end_date)) {
            $week->status = 'dalam pengerjaan';
        } else {
            $week->status = 'terlambat';
        }

        if ($userId) {
            $submitted = Submission::whereHas('assignment', function ($q) use ($week) {
                $q->where('week_id', $week->id);
            })->where('user_id', $userId)->exists();

            if ($submitted) {
                $week->status = 'selesai';
            }
        }

        $week->save();
    }
}
