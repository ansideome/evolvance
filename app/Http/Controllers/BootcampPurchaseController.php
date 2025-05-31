<?php

namespace App\Http\Controllers;

use App\Models\Bootcamp;
use Illuminate\Http\Request;

class BootcampPurchaseController extends Controller
{
    public function purchase($id)
    {
        $user = auth()->user();
        $bootcamp = Bootcamp::findOrFail($id);

        if ($user->bootcamps()->where('bootcamp_id', $id)->exists()) {
            return response()->json(['message' => 'Kamu udah beli bootcamp ini bos'], 409);
        }

        $user->bootcamps()->attach($id, ['payment_status' => true]);

        return response()->json(['message' => 'Bootcamp berhasil dibeli!']);
    }

    public function myBootcamps()
    {
        $bootcamps = auth()->user()->bootcamps()->wherePivot('payment_status', true)->get();
        return response()->json($bootcamps);
    }
}
