<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUser;
use App\Http\Requests\LoginUser;
use App\Mail\EmailVerificationMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{

    public function register(CreateUser $request)
    {
        $request->validated();
        $otp = rand(100000, 999999);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'otp' => $otp
        ]);

        Mail::to($request->email)->send(new EmailVerificationMail($request, $otp));

        return response()->json([
            'success' => true,
            'message' => 'User created successfully'
        ], 201);
    }

    public function login(LoginUser $request)
    {
        $request->validated();
        $user = User::where('email', $request->email)->first();
        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json(['message' => 'Invalid credentials'], 401);
        } else if (!$user->email_verified_at) {
            return response()->json(['message' => 'Email not verified'], 401);
        }

        return response()->json([
            'message' => 'Login successful',
            'access_token' => $user->createToken('auth_token')->plainTextToken
        ]);
    }

    public function verify(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'code' => 'required|string'
        ]);

        $user = User::where('email', $request->email)->first();
        if (!$user || $user->otp != $request->code) {
            return response()->json(
                [
                    'message' => 'Invalid code'
                ],
                401
            );
        }

        $user->update([
            'email_verified_at' => now(),
            'otp' => null
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Email verified successfully'
        ], 200);
    }
}
