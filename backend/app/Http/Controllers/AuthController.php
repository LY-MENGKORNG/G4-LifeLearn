<?php

namespace App\Http\Controllers;

use App\Http\Resources\Users\UserResource;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'email'     => 'required|string|max:255',
            'password'  => 'required|string'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors());
        }

        $credentials = $request->only('email', 'password');

        // dd($credentials);
        if (!Auth::attempt($credentials)) {
            return response()->json([
                'message' => 'User not found'
            ], 401);
        }

        $user   = User::where('email', $request->email)->firstOrFail();
        $token  = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'message'       => 'Login success',
            'access_token'  => $token,
            'token_type'    => 'Bearer'
        ]);
    }

    public function index(Request $request)
    {
        // Get the authenticated user
        $user = Auth::user()->load('permissions', 'roles');

        if (!$user) {
            return response()->json([
                'message' => 'User not authenticated'
            ], 401);
        }

        // Assuming the User model has relationships for roles and permissions
        $permissions = $user->permissions; // Adjust if using a method
        $roles = $user->roles; // Adjust if using a method

        return response()->json([
            'message' => 'Your information',
            'data' => new UserResource($user),
            'permissions' => $permissions,
            'roles' => $roles
        ]);
    }

    public function logout(Request $request): JsonResponse
    {
        $request->validate([
            'email' => 'required|email',
            'password'  => 'required|string'
        ]);
        
    
        $user = $request->user();

        if (!$user) {
            return response()->json([
                'status' => 'false',
                'message' => 'User not authenticated',
            ], 401);
        } 
        $user->tokens()->delete();
        return response()->json([
            'status' => 'true',
            'message' => 'Successfully logged out',
        ], 200);
    }

    public function principlelogout(Request $request)
    {
    $request->validate([
        'email' => 'required|email',
        'password' => 'required|string'
    ]);
    
    // Attempt to authenticate the principal based on the provided credentials
    if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
        $principal = Auth::user();

        // Check if the authenticated user is a principal (assuming role check)
        if ($principal->role !== 'principal') {
            return response()->json([
                'status' => false,
                'message' => 'Unauthorized access',
            ], 401);
        }

        // If authenticated and authorized, proceed with logout
        $principal->tokens()->delete();

        return response()->json([
            'status' => true,
            'message' => 'Successfully logged out',
        ], 200);
    }

    // If authentication fails, return error response
    return response()->json([
        'status' => false,
        'message' => 'Invalid credentials',
    ], 401);
    }

}

   

