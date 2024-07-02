<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\FrontRegisterRequest;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\Frontuser;
use GuzzleHttp\Psr7\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;

class FrontuserController extends Controller
{
    public function register(FrontRegisterRequest $request)
    {
        $user = Frontuser::createOrUpdate($request);
        $token = $user ? $user->createToken('auth_token')->plainTextToken : null;

        return $token ? response()->json([
            'data'          => $user,
            'access_token'  => $token,
            'token_type'    => 'Bearer'
        ], 200) : response()->json([
            'success' => false,
            'message' => 'Something went wrong',
        ], 416);
    }

    public function login(LoginRequest $request): JsonResponse
    {
        $user = Frontuser::where('email', $request->email)->firstOrFail();
        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'message'       => 'Login success',
            'access_token'  => $token,
            'token_type'    => 'Bearer'
        ]);
    }
}

