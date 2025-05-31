<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class StorageController extends Controller
{
    public function show($path)
    {
        if (!Storage::disk('public')->exists($path)) {
            return response()->json(['message' => 'File nggak ketemu cuy'], 404);
        }

        $file = Storage::disk('public')->get($path);
        $mime = Storage::disk('public')->mimeType($path);

        return response($file, 200)->header('Content-Type', $mime);
    }
}
