<?php

namespace App\Http\Controllers\API;

use App\Models\Offer;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthenticateSessionController
{
    public function store(Request $request): JsonResponse
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();

        if (! $user || ! Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials do not match our records.'],
            ]);
        }

        return response()->json([
            'token' => $user->createToken($request->userAgent() ?: random_int(100, 50000))->plainTextToken,
        ]);
    }

    public function destroy(Request $request): JsonResponse
    {
        Auth::guard('web')->logout();

        $authStatus = $request->session()->invalidate();

        $request->session()->regenerateToken();

        return response()->json([
            'status' => Response::HTTP_OK,
            'unauthenticated' => $authStatus,
        ]);
    }
}
