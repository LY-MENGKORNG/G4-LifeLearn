<?php

namespace App\Http\Controllers\Front\Auth;

use App\Http\Controllers\Controller;
use App\Models\Frontuser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class ForgotPasswordManager extends Controller
{
    // Method to display the forgot password form
    public function showForgotPasswordForm()
    {
        return view('front.auth.forgot-password');
    }

    public function ForgotPasswordPost(Request $request)
    {
        // Validate incoming request data
        $request->validate([
            'email' => 'required|email|exists:frontusers'
        ]);

        if (!$request->user()->email == $request->email) {
            return response()->json([
                'status' => false,
                'message' => 'User not found'
            ], 404);
        }

        $user = Frontuser::where('email', $request->email)->first();
        // Return success for non-existing user to prevent email enumeration attacks
        if (!$user) {
            return response()->json([
                'status' => false,
                'message' => 'User not found'
            ], 404);
        }
        
        // Check if the user is logged in
        if (!auth()->check()) {
            return response()->json([
                'status' => false,
                'message' => 'Cannot reset password while logged in'
            ], 400);
        }
        
        // Generate a token for the password reset request
        $token = Str::random(60);
        
        // Save the token and email to the password_resets table
        DB::table('password_resets')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => Carbon::now()
        ]);

        // dd(auth()->check());
        // Send notification to request password reset
        Mail::send('front.auth.reset-password', ['token' => $token, 'email' => $request->email], function ($message) use ($request) {
            $message->to($request->email);
            $message->subject('Reset Password');
        });

        // Return a JSON response indicating that the reset link has been sent
        return response()->json([
            'success' => true,
            'message' => 'A reset link has been sent to your email address.'
        ]);
    }

    // Show reset password form
    public function ResetPassword($token, $email)
    {
        return view('front.auth.reset-password', ['token' => $token, 'email' => $email]);
        dd($token);
    }

    public function ResetPasswordPost(Request $request)
    {
        // dd()
        // dd($request->all());  // Add this line for debugging
        $request->validate([
            'email' => 'required|email|exists:frontusers',
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required',
            'token' => 'required|string'
        ]);

        $reset = DB::table('password_resets')->where([
            'email' => $request->email,
            'token' => $request->token
        ])->first();

        if (!$reset || Carbon::parse($reset->created_at)->addMinutes(9)->isPast()) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid or expired token.'
            ], 400);
        }

        Frontuser::where('email', $request->email)->update([
            'password' => Hash::make($request->password)
        ]);

        DB::table('password_resets')->where('email', $request->email)->delete();

        return response()->json([
            'success' => true,
            'message' => 'Password has been reset successfully.'
        ]);
    }
}
