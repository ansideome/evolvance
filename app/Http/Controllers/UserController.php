<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserUpdateRequest;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return response()->json(
            [
                'success' => true,
                'data' => $request->user()
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserUpdateRequest $request)
    {
        $user = $request->user();
        $user->update($request->validated());

        return response()->json(
            [
                'success' => true,
                'message' => 'User updated successfully',
                'data' => $user
            ]
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $request->user()->delete();
    }
}
