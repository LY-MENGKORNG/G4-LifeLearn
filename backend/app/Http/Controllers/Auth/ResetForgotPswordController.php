<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class ResetForgotPswordController extends Controller
{
    public function showForgotPassword(){
        return view('auth.forgot-password');
    }
    
    public function ForgotPasswordPost(Request $request) {
        $request->validate([
            'email' => 'required|email|exists:users',
        ]);
        
        
        if(!$request->user()->email == $request->email){
            return response()->json(['status' => false, 'message' =>'Not found email'],404);
        }

        $user = User::where('email', $request->email)->first();
        // Return success user to prevent email enumeration attacks
        if (!$user) {
            return response()->json(['status' => false, 'message' => 'User  not found email'], 404);
        }

        // Check if the user is logged in
        if (!auth()->check()) {
            return response()->json(['status' => false, 'message' => 'Cannot reset password while logged in try agian'], 400);
        }

        // Generate token for password reset request
        $token = Str::random(60);

        // Save token and email to password_resets table
        DB::table('password_resets')->insert(['email' => $request->email,'token' => $token, 'created_at' => Carbon::now()]);

        // Send notification to request password reset
        Mail::send('auth.reset-password', ['token' => $token, 'email' => $request->email], function ($message) use ($request) {
            $message->to($request->email);
            $message->subject('Reset Password');
        });

         // response reset link has been sent
         return response()->json(['success' => true,'message' => 'A reset link has been sent to your email address.']);
    }

    //Reset Password
    public function showResetPassword($token,$email) {
        return view('auth.reset-password', ['token' => $token, 'email' => $email]);
    }
    public function ResetPassword(Request $request) {
        $request->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required',
            'token' => 'required|string'
        ]);

        $reset = DB::table('password_resets')->where([
            'email' => $request->email,
            'token' => $request->token
        ])->first();

        if (!$reset || Carbon::parse($reset->created_at)->addMinutes(9)->isPast()) {
            return response()->json(['success' => false,'message' => 'Invalid or expired token'], 400);
        }

        
        User::where('email', $request->email)->update([
            'password' => Hash::make($request->password)
        ]);

        DB::table('password_resets')->where('email', $request->email)->delete();

        return response()->json([
            'success' => true,
            'message' => 'Password has been reset successfully.'
        ]);
    }
}
