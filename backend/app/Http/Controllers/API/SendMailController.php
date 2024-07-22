<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\MailController;
use App\Models\Frontuser;
use Illuminate\Http\Request;

class SendMailController extends MailController
{
    public function inviteTeacher(Request $request)
    {
        if (!$this->isOnline())  return response()->json([
            'status' => false, 
            'message' => 'Please check your internet connection!'
        ], 500);

        $this->validateMail($request);

        $content = "front.auth.mail-invite-teacher";
        $request["from"] = $request->user()->email;
        $request["recipient"] = $request->email;
        $request["subject"] = $request->subject;
        $request["message"] = $request->message;

        $this->send($request, $content);

        return response()->josn([
            'status' => true,
            'message' => 'Your email has been sent successfully',
        ], 200);
    }
    
    public function acceptInvite(Request $request){

        if (!$this->isOnline())  return response()->json(['status' => false, 'message' => 'Please check your internet connection!']);
    
        $this->validateMail($request);
    
        $content = "front.auth.mail-accept-principle-invite";
        $request["from"] = $request->user()->email;
        $request["recipient"] = $request->email;
        $request["subject"] = 'Accept invitation';
        $request["message"] = 'I hope this email finds you well...';
    
        $this->send($request, $content);
    
        $recipient = Frontuser::where('email', $request->email)->firstOrFail();
    
        $this->removeNotifications($recipient->id);
    
        return response()->josn([
            'status' => true,
            'message' => 'Your email has been sent successfully',
        ], 200);
    }
}
