<?php

namespace App\Http\Controllers;

use App\Models\Frontuser;
use App\Models\Notificaton;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
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

            if ($mail_data['subject'] == "Application inviting to the system") {
                Mail::send('front.auth.principle-mail', $mail_data, function ($message) use ($mail_data) {
                    $message->from($mail_data['from'])
                        ->to($mail_data['recipient'])
                        ->subject($mail_data['subject']);
                });
                return response()->json([
                    'message' => 'Mail sent successfully!'
                ],200);
            }
            Mail::send('front.auth.mail-send', $mail_data, function ($message) use ($mail_data) {
                $message->from($mail_data['from'])
                    ->to($mail_data['recipient'])
                    ->subject($mail_data['subject']);
            });

            $recipient = Frontuser::where('email', $request->email)->firstOrFail();
            Notificaton::where('user_id', $recipient->id)->update(['status' => 1]);
            return redirect()->back()->with('Success', 'Email sent successfully!');
        }
        return redirect()->back()->withInput()->with('error', 'Please check your internet connection!');
    }

    public function isOnline($site = 'https://www.google.com')
    {
        return @fopen($site, 'r');
    }
}