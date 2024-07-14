<?php

namespace App\Http\Controllers;

use App\Models\Frontuser;
use App\Models\Notificaton;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function validateMail(Request $request)
    {
        return $request->validate([
            'email' => 'required|string|email|exists:frontusers,email',
            'subject' => 'required|string',
            'message' => 'required|string',
        ]);
    }
    
    public function isOnline($site = 'https://www.google.com')
    {
        return @fopen($site, 'r');
    }

    public function send(Request $request, $content) 
    {
        $mail_data = [
            'from' => $request->user()->email,
            'recipient' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
        ];

        Mail::send($content, $mail_data, function ($message) use ($mail_data) {
            $message->from($mail_data['from'])
                ->to($mail_data['recipient'])
                ->subject($mail_data['subject']);
        });
    }

    public function removeNotifications(string $user_id)
    {
        Notificaton::where('user_id', $user_id)->first()->delete();
    }
}
