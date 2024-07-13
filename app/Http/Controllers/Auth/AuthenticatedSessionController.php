<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;

class AuthenticatedSessionController extends Controller
{
    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): JsonResponse
    {
        $data = $request->authenticate();

        return response()->json($data);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(): JsonResponse
    {
        auth()->user()->tokens()->delete();

        return response()->json([
            'status' => 'user-logged-out',
        ]);
    }
}
