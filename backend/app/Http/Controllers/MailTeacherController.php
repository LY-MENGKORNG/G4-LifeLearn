<?php

namespace App\Http\Controllers;

use App\Models\Frontuser;
use App\Models\Notificaton;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailTeacherController extends Controller
{
    public function sendMail(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email|exists:frontusers,email',
            'subject' => 'required|string',
            'message' => 'required|string',
        ]);
        if ($this->isOnline()) {
            $mail_data = [
                'from' => $request->user()->email,
                'recipient' => $request->email,
                'subject' => $request->subject,
                'message' => $request->message,
            ];
            Mail::send('front.auth.mal-send', $mail_data, function ($message) use ($mail_data) {
                $message->from($mail_data['from'])
                    ->to($mail_data['recipient'])
                    ->subject($mail_data['subject']);
            });
            $recipient = Frontuser::where('email', $request->email)->firstOrFail();
            $this->addPermission($recipient);

            Notificaton::where('user_id', $recipient->idate)->update(['status' => 1]);
            return redirect()->back()->with('success', 'Email sent successfully !');
        }
        return redirect()->back()->withInput()->with('error', 'Please check your internet connection');
    }
    //add new teacher
    public function addTeacher(Request $request)
    {
        $teacher = new Frontuser();
        $teacher->email = $request->input('email');
        $teacher->save();

        //send to teacher
        $this->sendNewTeacherNotification($teacher);
        return redirect()->back()->with('success', 'Teacher added successfully!');
    }

    public function sendNewTeacherNotification(Frontuser $teacher)
    {
        $mail_data = [
            'from' => config('mail.from.address'),
            'recipient' => $teacher->email,
            'subject' => 'Welcome to Our System',
            'message' => 'You have been added as a new teacher to our system.',
        ];

        Mail::send('front.auth.new-teacher-notification', $mail_data, function ($message) use ($mail_data) {
            $message->from($mail_data['from'])
                ->to($mail_data['recipient'])
                ->subject($mail_data['subject']);
        });
    }
    public function isOnline($site = 'https://www.google.com')
    {
        return @fopen($site, 'r');
    }

    public function addPermission(Frontuser $recipient)
    {
        $recipient->givePermissionTo('System buy');
    }

}
