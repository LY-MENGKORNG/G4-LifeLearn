<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\FrontRegisterRequest;
use App\Models\Frontuser;

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

    public function login() 
    {
        
    }
}
