<?php

namespace App\Http\Controllers\ApiAuth;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Auth\LoginRequest;
use Laravel\Sanctum\PersonalAccessToken;
use Illuminate\Http\Resources\Json\JsonResource;

class AuthenticatedSessionController extends Controller
{
    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): Response
    {
        $credentials = $request->validated();
        $remember = $credentials['remember'] ?? false;
        unset($credentials['remember']);

        if (!Auth::attempt($credentials, $remember)) {
            return response([
                'error' => 'The Provided credentials are not correct'
            ], 422);
        }

        $user = Auth::user();
        $token = $user->createToken('main')->plainTextToken;
        $permissions = $user->getAllPermissions()->map(function ($permission) {
            return [
                'id' => $permission->id,
                'name' => $permission->name
            ];
        });

        return response([
            'user' =>  $user->only(['id', 'name', 'email', 'email_verified_at', 'created_at', 'updated_at']),
            'token' => $token,
            'permissions' => $permissions
        ]);
    }


    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): JsonResponse
    {
        $user = Auth::user();
        Auth::guard('web')->logout();

        $user->currentAccessToken()->delete();

        return response()->json([
            'message' => 'Logout successful',
            'token_invalidated' => true
        ], JsonResponse::HTTP_OK);
    }
    public function validateUser(Request $request)
    {

        $user = Auth::user();
        $token = PersonalAccessToken::findToken($request->bearerToken());
        // dd($token);

        // $user->currentAccessToken()->delete();

        // return response()->json([
        //     'message' => 'Logout successful',
        //     'token_invalidated' => true
        // ], JsonResponse::HTTP_OK);
    }
}
