<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactMessageRequest;
use App\Mail\ContactMessageMail;
use App\Models\ContactMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class ContactMessageController extends Controller
{
    public function sendEmail(ContactMessageRequest $request){
        
        $values = $request->all();
        // dd($request->input('message'));
        Mail::to("zellerbustamante@gmail.com")->send(new ContactMessageMail($values));

        return redirect()->route('index')->with('message', 'Your message has been sent :)');
    }
}
