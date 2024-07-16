<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\MailController;
use App\Models\Frontuser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SendMailController extends MailController
{
    public function approvePrinciple(Request $request)
    {
        $this->validateMail($request);

        if ($this->isOnline()) {
            $content = "front.auth.mail-approve";
            $request["from"] = $request->user()->email;
            $request["recipient"] = $request->email;
            $request["subject"] = 'Approve Proposal';
            $request["message"] = 'Your application has been approved🎉';
            $this->send($request, $content);

            $recipient = Frontuser::where('email', $request->email)->firstOrFail();

            $recipient->givePermissionTo('System buy');

            $this->removeNotifications($recipient->id);

            return redirect()->route('admin.notifications.index')->with('success', 'Your email have been sent successfully');
            
        }
        return redirect()->back()->withInput()->with('error', 'Please check your internet connection!');
    }

    public function rejectPrinciple(Request $request)
    {
        $this->validateMail($request);

        if ($this->isOnline()) {
            $content = "front.auth.mail-reject";
            $request["from"] = $request->user()->email;
            $request["recipient"] = $request->email;
            $request["subject"] = 'Reject Proposal';
            $request["message"] = 'Your application has been rejected!';
            $this->send($request, $content);

            $recipient = Frontuser::where('email', $request->email)->firstOrFail();

            $this->removeNotifications($recipient->id);

            return redirect()->back()->with('Success', 'Email sent successfully!');
        }
        return redirect()->back()->withInput()->with('error', 'Please check your internet connection!');
    }
}
