<?php

namespace App\Http\Controllers;

use App\Models\Material;
use Illuminate\Http\Request;

class MaterialController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'week_id' => 'required|exists:weeks,id',
            'video_url' => 'required|string',
        ]);

        $material = Material::create($request->only(['week_id', 'video_url']));

        return response()->json(['message' => 'Materi ditambahkan', 'data' => $material]);
    }

    public function update(Request $request, $id)
    {
        $material = Material::findOrFail($id);

        $request->validate([
            'video_url' => 'required|string',
        ]);

        $material->update($request->only(['video_url']));

        return response()->json(['message' => 'Materi diupdate', 'data' => $material]);
    }
}
