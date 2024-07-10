<?php

namespace App\Http\Controllers;

use App\Models\Frontuser;
use App\Models\Notificaton;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;


class MailTeacherController extends Controller
{
    //add new teacher
    public function addTeacher(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email|unique:frontusers,email', // ensure email is unique
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'password' => 'required|string',

        ]);
        // Create a new new teacher instance and populate with request data
        $teacher = new Frontuser();
        $teacher->email = $request->input('email');
        $teacher->first_name = $request->input('first_name');
        $teacher->last_name = $request->input('last_name');
        $teacher->password = bcrypt($request->input('password'));
        $teacher->save();
        $subject = 'Welcome to Our System';
        $message = 'You have been added as a new teacher to our system.';
        // Send notification email to the new teacher
        $mail_data = [
            'from' => config('mail.from.address'),
            'recipient' => $teacher->email,
            'subject' => $subject,
            'message' => $message,
        ];
        Mail::send('front.auth.mal-send', $mail_data, function ($message) use ($mail_data) {
            $message->from($mail_data['from'])
                ->to($mail_data['recipient'])
                ->subject($mail_data['subject']);
        });

        $request->validate([
            'email' => 'required|string|email|exists:frontusers,email',
            'subject' => 'required|string',
            'message' => 'required|string',
        ]);
        // Grant permissions to the new teacher
        $this->addPermission($teacher);
        Notificaton::create([
            'user_id' => $teacher->id,
            'status' => 1,
        ]);
        $this->sendNewTeacherNotification($teacher);
        return redirect()->back()->with('success', 'Teacher added successfully and email sent!');
       
    }

    public function sendNewTeacherNotification(Frontuser $teacher)
    {
        $mail_data = [
            'from' => config('mail.from.address'),
            'recipient' => $teacher->email,
            'subject' => 'Welcome to Our System',
            'message' => 'You have been added as a new teacher to our system.',
        ];
        Mail::send('front.auth.mal-send', $mail_data, function ($message) use ($mail_data) {
            $message->from($mail_data['from'])
                ->to($mail_data['recipient'])
                ->subject($mail_data['subject']);
        });
    }
    public function addPermission(Frontuser $recipient)
    {
        $recipient->givePermissionTo('Become a teacher');
    }
}
