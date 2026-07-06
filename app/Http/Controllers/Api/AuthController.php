<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    /**
     * Register.
     *
     * Creates a creator account and returns a Sanctum Bearer token.
     *
     * @group Authentication
     *
     * @unauthenticated
     *
     * @bodyParam name string required Creator display name. Example: Thread Forge
     * @bodyParam email string required Unique email address. Example: creator@example.com
     * @bodyParam password string required Minimum 8 characters and confirmed. Example: password123
     * @bodyParam password_confirmation string required Must match password. Example: password123
     */
    public function register(RegisterRequest $request): JsonResponse
    {
        $user = User::create($request->validated());

        $token = $user->createToken('threadforge-api-token')->plainTextToken;

        return response()->json([
            'message' => 'User registered successfully.',
            'token_type' => 'Bearer',
            'token' => $token,
            'user' => new UserResource($user),
        ], 201);
    }

    /**
     * Login.
     *
     * Authenticates a creator and returns a Sanctum Bearer token.
     *
     * @group Authentication
     *
     * @unauthenticated
     *
     * @bodyParam email string required Account email. Example: creator@example.com
     * @bodyParam password string required Account password. Example: password123
     */
    public function login(LoginRequest $request): JsonResponse
    {
        $credentials = $request->validated();

        $user = User::where('email', $credentials['email'])->first();

        if (! $user || ! Hash::check($credentials['password'], $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }

        $token = $user->createToken('threadforge-api-token')->plainTextToken;

        return response()->json([
            'message' => 'User logged in successfully.',
            'token_type' => 'Bearer',
            'token' => $token,
            'user' => new UserResource($user),
        ]);
    }

    /**
     * Logout.
     *
     * Revokes the current access token.
     *
     * @group Authentication
     *
     * @authenticated
     */
    public function logout(Request $request): JsonResponse
    {
        $request->user()->currentAccessToken()?->delete();

        return response()->json([
            'message' => 'User logged out successfully.',
        ]);
    }

    /**
     * Current user.
     *
     * Returns the authenticated creator profile.
     *
     * @group Authentication
     *
     * @authenticated
     */
    public function me(Request $request): JsonResponse
    {
        return response()->json([
            'user' => new UserResource($request->user()),
        ]);
    }
}
