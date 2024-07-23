<?php

namespace App\Http\Controllers\Front;

use App\Charts\MonthlyUsersChart;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\FrontRegisterRequest;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Resources\Users\FrontUserResource;
use App\Http\Resources\Users\PermissionResource;
use App\Http\Resources\Users\RoleResource;
use App\Models\Frontuser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class FrontuserController extends Controller
{

    public function index(Request $request)
    {
        // Get the authenticated user
        $user =  Auth::user()->load('roles', 'permissions');

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
            'data' => new FrontUserResource($user),
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
        $user = Frontuser::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json([
                'message' => 'Invalid credentials'
            ], 401);
        }

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'message'       => 'Login success',
            'access_token'  => $token,
            'token_type'    => 'Bearer'
        ]);
    }
  
    public function getRegistrationsPerDay()
    {
        $registrations = DB::table('frontusers')
            ->select(DB::raw('MONTH(created_at) as month_of_year'), DB::raw('count(*) as count'))
            ->groupBy('month_of_year')
            ->get();

        // Initialize an array with zero counts for each month of the year (1 = January, 12 = December)
        $monthsOfYear = array_fill(1, 12, 0);

        // Populate the array with actual data
        foreach ($registrations as $registration) {
            $monthsOfYear[$registration->month_of_year] = $registration->count;
        }

        // Prepare data for the chart
        $monthNames = [
            1 => 'Jan',
            2 => 'Feb',
            3 => 'Mar',
            4 => 'Apr',
            5 => 'May',
            6 => 'Jun',
            7 => 'Jul',
            8 => 'Aug',
            9 => 'Sep',
            10 => 'Oct',
            11 => 'Nov',
            12 => 'Dec',
        ];

        $registrationlabels = [];
        $registrationData = [];

        foreach ($monthsOfYear as $monthNumber => $count) {
            $registrationlabels[] = $monthNames[$monthNumber];
            $registrationData[] = $count;
        }

        // -------------------------------/ 

        $logins = DB::table('frontusers')
            ->select(DB::raw('MONTH(last_seen) as month_of_year'), DB::raw('count(*) as count'))
            ->groupBy('month_of_year')
            ->get();

        $loginMonthOfYear = array_fill(1, 12, 0);

        // Populate the array with actual data
        foreach ($logins as $login) {
            $loginMonthOfYear[$login->month_of_year] = $login->count;
        }

        $loginLabel = [];
        $loginData = [];

        foreach ($monthsOfYear as $monthNumber => $count) {
            $loginLabel[] = $monthNames[$monthNumber];
            $loginData[] = $count;
        }

        //----------------------------------------------------------------

        return response()->json([
            'registrationLabels' => $registrationlabels,
            'registrationData' => $registrationData,

            'loginLabel' => $loginLabel,
            'loginData' => $loginData
        ]);
    }
}
