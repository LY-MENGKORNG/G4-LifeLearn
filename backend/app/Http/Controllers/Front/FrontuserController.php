<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\FrontRegisterRequest;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Resources\Users\PermissionResource;
use App\Http\Resources\Users\RoleResource;
use App\Http\Resources\Users\UserResource;
use App\Models\Frontuser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class FrontuserController extends Controller
{

    public function index(Request $request)
    {
        // Get the authenticated user
        $user = Auth::user()->load('permissions', 'roles');

        if (!$user) {
            return response()->json([
                'message' => 'User not authenticated'
            ], 401);
        }

        $permissions = $user->permissions; 
        $roles = $user->roles; 

        $user->last_seen = now(); 
        $user->update(); // update the time that user accessed

        return response()->json([
            'message' => 'Your information',
            'data' => new UserResource($user),
            'permissions' => PermissionResource::collection($permissions),
            'roles' => RoleResource::collection($roles),
        ]);
    }   

    public function register(FrontRegisterRequest $request)
    {
        $user = Frontuser::createOrUpdate($request);
        $user->assignRole('user');
        $user->givePermissionTo('front access');
        $token = $user ? $user->createToken('auth_token')->plainTextToken : null;

        return $token ? response()->json([
            'data'          => $user,
            'access_token'  => $token,
            'token_type'    => 'Bearer',
            'role' => $user->roles,
            'permissions' => $user->permissions
        ], 200) : response()->json([
            'success' => false,
            'message' => 'Something went wrong',
        ], 416);
    }

    public function login(LoginRequest $request): JsonResponse
    {

        // $credentials = $request->only('email', 'password');

        // if (!Auth::attempt($credentials)) {
        //     return response()->json([
        //         'message' => 'Invalid credentials'
        //     ], 401);
        // }

        $user   = Frontuser::where('email', $request->email)->firstOrFail();
        $token  = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'message'       => 'Login success',
            'access_token'  => $token,
            'token_type'    => 'Bearer'
        ]);
    }

    public function getRegistrationsPerDay()
    {
        $registrations = DB::table('frontusers')
            ->select(DB::raw('DAYOFWEEK(created_at) as day_of_week'), DB::raw('count(*) as count'))
            ->groupBy('day_of_week')
            ->get();

        // Initialize an array with zero counts for each day of the week (1 = Sunday, 7 = Saturday)
        $daysOfWeek = array_fill(1, 7, 0);

        // Populate the array with actual data
        foreach ($registrations as $registration) {
            $daysOfWeek[$registration->day_of_week] = $registration->count;
        }

        // Prepare data for the chart
        $dayNames = [
            1 => 'Sun',
            2 => 'Mon',
            3 => 'Tues',
            4 => 'Wed',
            5 => 'Thurs',
            6 => 'Fri',
            7 => 'Sat',
        ];

        $labels = [];
        $data = [];

        foreach ($daysOfWeek as $dayNumber => $count) {
            $labels[] = $dayNames[$dayNumber];
            $data[] = $count;
        }

        return response()->json([
            'labels' => $labels,
            'data' => $data,
        ]);
    }

}

