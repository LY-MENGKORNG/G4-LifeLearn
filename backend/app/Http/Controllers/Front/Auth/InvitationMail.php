<?php

namespace App\Http\Controllers\Front\Auth;

use App\Http\Controllers\Controller;
use App\Models\Frontuser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class InvitationMail extends Controller
{
    public function sendTeacherInvitation(Request $request)
    {
        try {
            $request->validate([
                'student_email' => 'required|email|exists:frontusers,email',
            ]);

            $student = Frontuser::where('email', $request->student_email)->first();
            if (!$student) {
                return response()->json([
                    'success' => false,
                    'message' => 'Student not found.',
                ], 404);
            }

            $teachers = Frontuser::role('teacher')->get();

            foreach ($teachers as $teacher) {
                try {
                    Mail::send('emails.invitation', ['teacher' => $teacher, 'student' => $student], function ($message) use ($teacher) {
                        $message->to($teacher->email);
                        $message->subject('Student Added to Classroom');
                    });
                } catch (\Exception $e) {
                    \Log::error('Mail sending failed for teacher ' . $teacher->email . ': ' . $e->getMessage());
                    return response()->json([
                        'success' => false,
                        'message' => 'Failed to send invitation emails.',
                        'error' => $e->getMessage()
                    ], 500);
                }
            }

            return response()->json([
                'success' => true,
                'message' => 'Invitation emails sent to teachers.'
            ], 200);
    
        } catch (\Exception $e) {
            \Log::error('Error sending invitation: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'An error occurred while sending invitations.',
                'error' => $e->getMessage()
            ], 500);
        }
    }
    public function isOnline($site = 'https://www.google.com')
    {
        return @fopen($site, 'r');
    }
}
