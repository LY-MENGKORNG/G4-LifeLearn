<?php

namespace App\Http\Controllers;

use App\Models\Frontuser;
use App\Models\Notificaton;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\TeacherMail;

class MailTeacherController extends Controller
{
    // Add new teacher
    public function addTeacher(Request $request)
    {
        // Validate the request data
        $request->validate([
            'email' => 'required|string|email|unique:frontusers,email', // Unique email validation
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'password' => 'required|string',
        ]);

        // Create a new teacher instance
        $teacher = new Frontuser();
        $teacher->email = $request->input('email');
        $teacher->first_name = $request->input('first_name');
        $teacher->last_name = $request->input('last_name');
        $teacher->password = bcrypt($request->input('password'));
        $teacher->save();

        // Send notification email to the new teacher
        $this->sendWelcomeEmail($teacher);

        // Grant permissions to the new teacher
        $this->addPermission($teacher);

        // Create a notification record for the new teacher
        Notificaton::create([
            'user_id' => $teacher->id,
            'status' => 1,
        ]);

        return redirect()->back()->with('success', 'Teacher added successfully and email sent!');
    }

    // Method to send welcome email to a new teacher
    public function sendWelcomeEmail(Frontuser $teacher)
    {
        $subject = 'Welcome to Our System';
        $message = 'You have been added as a new teacher to our system.';

        $mail_data = [
            'recipient' => $teacher->email,
            'subject' => $subject,
            'message' => $message,
        ];

        // Send email using the TeacherMail Mailable
        Mail::to($mail_data['recipient'])->send(new TeacherMail($mail_data));
    }

    // Grant permissions to the new teacher
    public function addPermission(Frontuser $recipient)
    {
        $recipient->givePermissionTo('Become a teacher');
    }
}
