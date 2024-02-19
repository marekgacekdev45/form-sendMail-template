<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Mail\TestEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function sendEmail(Request $request)
    {
        $details = [
            'title' => 'Mail from ItSolutionStuff.com',
            'email' => $request->email,
            'message' => $request->message,
        ];
       
        Mail::to('test@host973893.xce.pl')->send(new TestEmail($details));
       
        // return back()->with('message_sent','Your message has been sent successfully!');
        return Inertia::render('Form', ['message_sent' => 'Your message has been sent successfully!']);

    }
    
}
