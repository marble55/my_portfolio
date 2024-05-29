<?php

namespace App\Http\Controllers;

use App\Mail\ContactMessageMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ConactMessageController extends Controller
{
    public function sendEmail(){
        Mail::to("user@test.com")->send(new ContactMessageMail());

        dd("message sent :)");
    }
}
